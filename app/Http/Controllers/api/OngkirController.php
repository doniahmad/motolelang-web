<?php

namespace App\Http\Controllers\api;

use App\Models\Ongkir;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use RajaOngkir;

class OngkirController extends Controller
{

    public function retrieveCostByCourier(Request $request)
    {
        $params = [
            'origin' => 209, 'destination' => $request->destination, 'weight' => 11000, 'courier' => 'jne'
        ];
        $cost = RajaOngkir::find($params)->costDetails()->get();
        $collection = collect($cost);

        return response()->json($collection->last());
    }

    public function selectCityByProvince(Request $request)
    {
        $city = RajaOngkir::find(['province_id' => $request->province])->city()->get();
        return response()->json($city);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Ongkir::all();
        return response()->json($data);
        // return view('Main.pages.pembayaran' ,compact('ongkirs'));
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
            return response()->json([
                'status' => 'success',
                'data' => $data,
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->errors(),
            ]);
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
            return response()->json([
                'status' => 'status',
                'data' => $data,
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->errors(),
            ]);
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
