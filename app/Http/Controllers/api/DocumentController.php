<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Document::all();

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
            'nomor_polisi' => 'string',
            'stnk' => 'boolean',
            'bpkb' => 'boolean',
            'form_a' => 'boolean',
            'faktur' => 'boolean',
            'kwitansi_blanko' => 'boolean',
            'masa_stnk' => 'string',
            'id_product' => 'required|integer'
        ]);

        try {
            $response = Document::create($validateData);
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
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
        $data = $document->load('product');

        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        $validateData = $request->validate([
            'nomor_polisi' => 'string',
            'stnk' => 'boolean',
            'bpkb' => 'boolean',
            'form_a' => 'boolean',
            'faktur' => 'boolean',
            'kwitansi_blanko' => 'boolean',
            'masa_stnk' => 'string',
            'product_id' => 'integer'
        ]);

        try {
            $response = $document->update($validateData);
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
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        try {
            $document->delete();
            return response()->json([
                'success' => true,
                'message' => 'Success',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error',
                'error' => $e->getMessage()
            ], 422);
        }
    }
}
