<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Offer::with(['auction', 'auctioneer'])->get();

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
            'id_auctioneer' => 'integer|required',
            'id_auction' => 'integer|required',
            'offer' => 'integer|required',
        ]);

        $offer_code = mt_rand(100, 999) . '-' . date('dmys') . $request->user_id . $request->product_tawaran_id;

        $validateData['code_offer'] = $offer_code;

        try {
            $response = Offer::create($validateData);
            return response()->json([
                'succes' => true,
                'message' => 'Success',
                'data' => $response,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error',
                'error' => $e->getMessage()
            ], 422);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function show(Offer $offer)
    {
        $data = $offer->load(['product', 'user']);

        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Offer $offer)
    {
        $updateData = $request->validate([
            'offer' => 'integer|required'
        ]);

        try {
            $product = $offer->update($updateData);
            return response()->json([
                'succes' => true,
                'message' => 'Success',
                'data' => $product,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error',
                'error' => $e->getMessage()
            ], 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Offer $offer)
    {
        try {
            $offer->delete();
            return response()->json(['message' => 'Success']);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }
}