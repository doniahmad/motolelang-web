<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allAdmin()
    {
        $allAdmin = User::whereHas('roles', function ($role) {
            $role->where('name', 'admin');
            $role->orWhere('name', 'owner');
        })->get();
        return response()->json($allAdmin);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8',
            'role' => 'in:admin',
            'handphone' => 'required|string',
            'birth_place' => 'required|string',
            'birth_date' => 'required|string',
            'gender' => 'required|in:perempuan,laki-laki',
            'address' => 'required|string',
            'photo' => 'required|image|mimes:jpg,png,jpeg'
        ]);


        try {
            $fields['role'] = 'admin';
            $fields['password'] = Hash::make($fields['password']);

            if ($request->hasFile('photo')) {
                $image = $request->file('photo');
                $image_name = 'admin' . date('dmys');
                $request->photo->storeAs('image/admin', $image_name . '.' . $image->extension());
                $fields['photo'] = $image_name;
            }

            $admin = User::create($fields);

            $admin->assignRole($fields['role']);

            return response()->json($admin);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = $request->user();
        $data->role = $data->getRoleNames();
        $data->premission = $data->getPermissionsViaRoles()->pluck("name");
        $data->makeHidden('roles');

        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $fields = $request->validate([
            'name' => 'string',
            'handphone' => 'string',
            'birth_place' => 'string',
            'birth_date' => 'string',
            'gender' => 'in:perempuan,laki-laki',
            'address' => 'string',
            'photo' => 'image|mimes:jpg,png'
        ]);


        try {
            $fields['role'] = 'admin';

            if ($request->hasFile('photo')) {
                $image = $request->file('photo');
                $image_name = 'admin' . date('dmys');
                Storage::delete('image/admin/' . $user->photo);
                $request->photo->storeAs('image/admin', $image_name . '.' . $image->extension());
                $fields['photo'] = $image_name;
            }

            $updateData = $user->update($fields);

            return response()->json([
                'success' => true,
                'data' => $updateData,
            ]);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();
            Storage::delete('image/user/' . $user->photo);

            return response()->json('success');
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }
}
