<?php

namespace App\Http\Controllers\api;

use App\Models\Pengiriman;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class PengirimanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pengiriman::with(['invoice.auctioneer.user', 'invoice.auctioneer.auction.product', 'kurir'])->get();
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
            return response()->json(['status' => 'success', 'data' => $data]);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
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
        $data = $pengiriman->load(['invoice.auctioneer.user', 'kurir']);
        return response()->json($data, 200);
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
            'bukti_penerimaan' => 'image|mimes:png,jpg'
        ]);

        $validateData['status'] = 'diterima';

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
            return response()->json(['status' => 'success', 'data' => $updatedData]);
        } catch (ValidationException $e) {
            return response()->json(['status' => 'error', 'message' => $e->errors()]);
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
