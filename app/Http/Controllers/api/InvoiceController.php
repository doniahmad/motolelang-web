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
        $data = Invoice::with(['auctioneer.auction.product', 'auctioneer.user'])->get();
        return response()->json($data);
    }

    public function userInvoice()
    {
        $data = Invoice::with(['auctioneer.auction.product'])->whereHas('auctioneer', function ($query) {
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
        $kodePembayaran = date('dmys') . $request->id_product . $request->id_user;
        $validateData['kode_pembayaran'] = $kodePembayaran;

        try {
            $data = Invoice::create($validateData);
            return response()->json($data);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
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
        $data = $invoice->load(['auctioneer.auction.product']);
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
            'alasan_penolakan' => 'string',
            'bukti_pembayaran' => 'image|mimes:png,jpg',
        ]);

        try {
            // image
            if ($request->status == 'ditolak') {
                Storage::delete($invoice->bukti_pembayaran);
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
            return response()->json($updatedData);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
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
            $invoice->delete();
            return response()->json(['message' => 'Success']);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }
}
