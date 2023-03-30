<?php

namespace App\Http\Controllers\api;

use App\Models\Invoice;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Invoice::with(['auctioneer.auction.product.images', 'auctioneer.user'])->get();
        return response()->json($data);
    }

    public function userInvoice()
    {
        $data = Invoice::with(['auctioneer.auction.product.images'])->whereHas('auctioneer', function ($query) {
            return $query->where('id_user', Auth::user()->user_id);
        })->get();

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
        $validateData = $request->validate([
            'id_auctioneer' => 'required|integer',
            'invoice' => 'required|integer',
        ]);

        // kode pembayaran
        $kodePembayaran = date('dmys') . rand(1, 1000);
        $validateData['kode_pembayaran'] = $kodePembayaran;

        try {
            $data = Invoice::create($validateData);
            return response()->json(['status' => 'success', 'data' => $data]);
        } catch (\Exception $e) {
            return response()->json(['status' => 'success', 'message' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        $data = $invoice->load(['auctioneer.auction.product.images', 'auctioneer.user']);
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        $validateData = $request->validate([
            'status' => 'string',
            'alasan_penolakan' => 'string|nullable',
            'bukti_pembayaran' => 'image|mimes:png,jpg',
            'alamat_pengiriman' => 'string',
            'ongkir' => 'integer'
        ]);

        try {
            // image
            if ($request->status === 'ditolak') {
                Storage::delete('image/invoice/' . $invoice->bukti_pembayaran);
                $validateData['bukti_pembayaran'] = null;
            } else {

                if ($request->hasFile('bukti_pembayaran')) {
                    $image = $request->file('bukti_pembayaran');
                    $image_name = 'img' . '-' . $invoice->kode_pembayaran . '.' . $image->extension();
                    Storage::delete('image/invoice/' . $invoice->bukti_pembayaran);
                    $request->bukti_pembayaran->storeAs('image/invoice', $image_name);
                    $validateData['bukti_pembayaran'] = $image_name;
                }
            }
            $updatedData = $invoice->update($validateData);
            return response()->json(['status' => 'success', 'data' => $updatedData]);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        try {
            Storage::delete('image/invoice/' . $invoice->bukti_pembayaran);
            $invoice->delete();
            return response()->json(['message' => 'Success']);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }
}
