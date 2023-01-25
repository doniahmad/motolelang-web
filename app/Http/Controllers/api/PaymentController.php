<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'id_user' => 'required|integer',
            'id_product' => 'required|integer',
            'tagihan' => 'requaired|integer',
        ]);


        // kode pembayaran
        $kodePembayaran = date('dmys') . $request->id_product . $request->id_user;
        $validateData['kode_pembayaran'] = $kodePembayaran;


        try {
            $data = Payment::create($validateData);
            return response()->json($data);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        $data = $payment->load(['user', 'product']);
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        $validateData = $request->validate([
            'status_pembayaran' => 'string',
            'alasan_penolakan' => 'string',
            'bukti_pembayaran' => 'image|mimes:png,jpg',
        ]);



        try {
            // image
            if ($request->status_pembayaran == 'ditolak') {
                Storage::delete($payment->bukti_pembayaran);
            } else {

                $kodePembayaran = date('dmys') . $request->id_product . $request->id_user;

                if ($request->hasFile('bukti_pembayaran')) {
                    $image = $request->file('bukti_pembayaran');
                    $image_name = 'img' . '-' . $kodePembayaran . '.' . $image->extension();
                    Storage::delete('image/payment/' . $payment->bukti_pembayaran);
                    $request->bukti_pembayaran->storeAs('image/payment', $image_name);
                    $validateData['bukti_pembayaran'] = $image_name;
                }
            }
            $updatedData = $payment->update($validateData);
            return response()->json($updatedData);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        try {
            Storage::delete('image/payment/' . $payment->bukti_pembayaran);
            $payment->delete();
            return response()->json('success delete');
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }
}