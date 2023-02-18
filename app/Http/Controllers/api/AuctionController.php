<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Auction;
use Illuminate\Http\Request;
use Illuminate\Notifications\Action;

class AuctionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = Auction::with(['product', 'auctioneer.user', 'auctioneer.offer', 'offer.auctioneer', 'auctioneer.invoice',])->get();
        return response()->json($response, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $token = date('dmys') . $request->id_product;

        $data = $request->validate(
            [
                'exp_date' => 'required', // Warning, ada dua pilihan date_format dan Date
                'id_product' => 'required|integer',
            ]
        );

        $data['status'] = true;

        $data['token'] = $token;

        try {
            $response = Auction::create($data);
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
     * @param  \App\Models\Auction  $auction
     * @return \Illuminate\Http\Response
     */
    public function show(Auction $auction)
    {
        $data = $auction->load(['product', 'auctioneer.user', 'auctioneer.offer', 'auctioneer.invoice',]);
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Auction  $auction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Auction $auction)
    {
        $data = $request->validate(
            [
                'exp_data' => 'date', // Warning, ada dua pilihan date_format dan Date
                'id_winner' => 'integer',
                'status' => 'boolean'
            ]
        );

        try {
            $response = $auction->update($data);
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
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Auction  $auction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Auction $auction)
    {
        try {
            $auction->delete();
            return response()->json(['message' => 'Auction Deleted']);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }
}
