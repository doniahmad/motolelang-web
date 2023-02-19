<?php

namespace App\Http\Controllers\api;

use app\Models\Pengiriman;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengirimanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pengiriman::with(['invoice.auctioneer.user'])->get();
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
            'id_kurir' => 'required',
            'id_invoice' => 'required',
        ]);

        $validateData['status'] = 'perjalanan';

        try {
            $data = Pengiriman::create($validatedData);
            return response()->json($data);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengiriman  $pengiriman
     * @return \Illuminate\Http\Response
     */
    public function show(Pengiriman $pengiriman)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengiriman  $pengiriman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengiriman $pengiriman)
    {
        $validateData = $request->validate([
            'status' => 'string',
            'bukti_penerimaan' => 'image|mimes:png,jpg',
        ]);

        try {
            // image
            if ($request->hasFile('bukti_penerimaan')) {
                $image = $request->file('bukti_penerimaan');
                $image_name = 'img' . '-' . rand(1000, 9999) . '.' . $image->extension();
                Storage::delete('image/penerimaan/' . $pengiriman->bukti_penerimaan);
                $request->bukti_penerimaan->storeAs('image/penerimaan', $image_name);
                $validateData['bukti_penerimaan'] = $image_name;
            }

            $updatedData = $pengiriman->update($validateData);
            return response()->json($updatedData);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengiriman  $pengiriman
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengiriman $pengiriman)
    {
        try {
            $pengiriman->delete();
            Storage::delete($pengiriman->bukti_penerimaan);
            return response()->json(['message' => 'Success']);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }
}
