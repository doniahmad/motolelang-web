<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Auctioneer;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AuctioneerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Auctioneer::all();
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
        $data = $request->validate([
            'nama_samaran' => 'string',
            'token_pelelangan' => 'string',
            'id_auction' => 'integer',
            'id_user' => 'integer'
        ]);

        try {
            $response = Auctioneer::create($data);
            return response()->json([
                'status' => 'success',
                'message' => 'Auctioneer Success Created',
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
     * @param  \App\Models\Auctioneer  $auctioneer
     * @return \Illuminate\Http\Response
     */
    public function show(Auctioneer $auctioneer)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Auctioneer  $auctioneer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Auctioneer $auctioneer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Auctioneer  $auctioneer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Auctioneer $auctioneer)
    {
        try {
            $auctioneer->delete();
            return response()->json(['message' => 'Auction Deleted']);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }
}
