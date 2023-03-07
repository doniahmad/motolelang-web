<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allAdmin()
    {
        $allAdmin = User::with('roles')->whereHas('roles', function ($role) {
            $role->where('name', 'admin');
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
        try {
            $fields = $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:8',
                'role' => 'in:admin',
                'handphone' => 'required|string',
                'birth_place' => 'required|string',
                'birth_date' => 'required|string',
                'gender' => 'required|in:wanita,pria',
                'address' => 'required|string',
                'photo' => 'required|image|mimes:jpg,png,jpeg'
            ]);

            $fields['role'] = 'admin';
            $fields['password'] = Hash::make($fields['password']);

            if ($request->hasFile('photo')) {
                $image = $request->file('photo');
                $image_name = 'admin' . date('dmys') . '.' . $image->extension();
                $request->photo->storeAs('image/admin', $image_name);
                $fields['photo'] = $image_name;
            }

            $admin = User::create($fields);

            $admin->assignRole($fields['role']);

            return response()->json(['status' => 'success', 'data' => $admin]);
        } catch (ValidationException $e) {
            return response()->json(['status' => 'error', 'message' => $e->errors()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allAdmin = User::with('roles')->whereHas('roles', function ($role) {
            $role->where('name', 'admin');
        })->get();
        return response()->json($allAdmin);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $admin)
    {
        try {
            $fields = $request->validate([
                'name' => 'string',
                'handphone' => 'string',
                'birth_place' => 'string',
                'birth_date' => 'string',
                'gender' => 'in:pria,wanita',
                'address' => 'string',
                'photo' => 'image|mimes:jpg,png'
            ]);

            if ($request->hasFile('photo')) {
                $image = $request->file('photo');
                $image_name = 'admin' . date('dmys') . '.' . $image->extension();
                Storage::delete('image/admin/' . $admin->photo);
                $request->photo->storeAs('image/admin', $image_name);
                $fields['photo'] = $image_name;
            }

            $updateData = $admin->update($fields);

            return response()->json([
                'success' => true,
                'data' => $updateData,
            ]);
        } catch (ValidationException $e) {
            return response()->json(['status' => 'error', 'message' => $e->errors()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $admin)
    {
        try {
            $admin->delete();
            Storage::delete('image/admin/' . $admin->photo);

            return response()->json('Success Delete');
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }
}
