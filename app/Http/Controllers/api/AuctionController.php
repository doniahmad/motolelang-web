<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Auction;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AuctionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = Auction::with(['product.images', 'auctioneer.user', 'auctioneer.offer', 'offer.auctioneer', 'auctioneer.invoice',])->get();
        return response()->json($response, 200);
    }

    public function paginateAction(Request $request)
    {
        $response = Auction::with(['product.images', 'auctioneer.user', 'auctioneer.offer', 'offer.auctioneer', 'auctioneer.invoice',])->paginate(12);
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
        try {
            $token = date('dmys') . $request->id_product;

            $data = $request->validate(
                [
                    'exp_date' => 'required',
                    'kelipatan_bid' => 'required',
                    'id_product' => 'required|integer',
                ]
            );

            $data['status'] = true;

            $data['token'] = $token;

            $response = Auction::create($data);
            return response()->json([

                'status' => 'success',
                'data' => $response,
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->errors()
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
        $data = $auction->load(['product.images', 'auctioneer.user', 'auctioneer.offer', 'auctioneer.invoice', 'offer.auctioneer']);
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
        try {
            $data = $request->validate(
                [
                    'exp_data' => 'date', // Warning, ada dua pilihan date_format dan Date
                    'kelipatan_bid' => 'integer',
                    'id_winner' => 'integer',
                    'status' => 'boolean'
                ]
            );

            $response = $auction->update($data);
            return response()->json([
                'status' => 'success',
                'data' => $response,
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->errors()
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
