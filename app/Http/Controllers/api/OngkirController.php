<?php

namespace App\Http\Controllers\api;

use App\Models\Ongkir;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OngkirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Ongkir::all();
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_daerah' => 'required',
            'ongkir' => 'required|integer',
        ]);

        try {
            $data = Ongkir::create($validatedData);
            return response()->json($data);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ongkir  $ongkir
     * @return \Illuminate\Http\Response
     */
    public function show(Ongkir $ongkir)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ongkir  $ongkir
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ongkir $ongkir)
    {
        $validatedData = $request->validate([
            'nama_daerah' => 'string',
            'ongkir' => 'integer',
        ]);

        try {
            $data = $ongkir->update($validatedData);
            return response()->json($data);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ongkir  $ongkir
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ongkir $ongkir)
    {
        try {
            $ongkir->delete();
            return response()->json('success');
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }
}
