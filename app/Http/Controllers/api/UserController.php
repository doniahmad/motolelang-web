<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function user(Request $request)
    {
        $response = $request->user()->load(['auctioneer']);
        $response->role = $response->getRoleNames();
        $response->premission = $response->getPermissionsViaRoles()->pluck("name");
        $response->makeHidden('roles');

        return response($response, 200);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function users()
    {
        $users = User::whereHas('roles', function ($role) {
            $role->where('name', 'admin');
            $role->where('name', 'customer');
        })->get();;
        return response()->json($users, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function customers()
    {
        $customers = User::with(['auctioneer.auction', 'auctioneer.offer', 'auctioneer.invoice'])->whereHas('roles', function ($role) {
            $role->where('name', 'customer');
        })->get();

        return response()->json($customers, 200);
    }

    public function customer(User $user)
    {
        $customer = $user->load(['auctioneer.auction', 'auctioneer.offer', 'auctioneer.invoice']);

        return response()->json($customer, 200);
    }

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
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
        $user = $request->user();

        $validateData = $request->validate([
            'nama' => 'string',
            'handphone' => 'string',
            'birth_place' => 'string',
            'birth_date' => 'string',
            'gender' => 'in:pria,wanita',
            'address' => 'string',
            'photo' => 'image|mimes:jpg,png'
        ]);

        try {

            if ($request->hasFile('photo')) {
                $image = $request->file('photo');
                $image_name = date('dmys') . '-' . $user->id . '.' . $image->extension();
                Storage::delete('image/user/' . $user->photo);
                $request->photo->storeAs('image/user', $image_name);
                $validateData['photo'] = $image_name;
            }

            $user->update($validateData);
            return response()->json([
                'status' => 'success',
                'data' => $validateData,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }

    public function remove($id)
    {
        $user = User::find($id);

        Storage::delete('image/user/' . $user->photo);

        try {
            $user->delete();
            return response()->json([
                'message' => 'User Removed'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
    }
}
