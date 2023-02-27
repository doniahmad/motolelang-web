<?php

namespace App\Http\Controllers\api;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class KurirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kurir = User::whereHas('roles', function ($role) {
            $role->where('name', 'kurir');
        })->get();
        return response()->json($kurir);
    }

    public function dataKurir()
    {
        $kurir = User::whereHas('roles', function ($role) {
            $role->where('name', 'kurir');
        })->get();
        return response()->json($kurir);
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
            'password' => 'required|min:8',
            'role' => 'in:kurir',
            'handphone' => 'required|string',
            'birth_place' => 'required|string',
            'birth_date' => 'required|string',
            'gender' => 'required|in:wanita,pria',
            'address' => 'required|string',
            'photo' => 'required|image|mimes:jpg,png,jpeg'
        ]);

        try {
            $fields['role'] = 'kurir';
            $fields['password'] = Hash::make($fields['password']);

            if ($request->hasFile('photo')) {
                $image = $request->file('photo');
                $image_name = 'kurir' . date('dmys') . '.' . $image->extension();
                $request->photo->storeAs('image/kurir', $image_name);
                $fields['photo'] = $image_name;
            }

            $kurir = User::create($fields);

            $kurir->assignRole($fields['role']);

            return response()->json($kurir);
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
    public function show(User $kurir)
    {
        $data = $kurir->load(['pengiriman']);
        return response()->json($data, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
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

            if ($request->hasFile('photo')) {
                $image = $request->file('photo');
                $image_name = 'kurir' . date('dmys') . '.' . $image->extension();
                Storage::delete('image/kurir/' . $user->photo);
                $request->photo->storeAs('image/kurir', $image_name);
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
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $kurir)
    {
        try {
            $kurir->delete();
            Storage::delete('image/kurir/' . $kurir->photo);

            return response()->json('success');
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }
}
