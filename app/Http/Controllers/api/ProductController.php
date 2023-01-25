<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = Product::all();
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
        $validateData = $request->validate([
            'nama_product' => 'string',
            'harga_awal' => 'integer',
            'jenis' => 'string',
            'merk' => 'string',
            'kapasitas_cc' => 'integer',
            'nomor_mesin' => 'string',
            'bahan_bakar' => 'string',
            'warna_tnkb' => 'string',
            'odometer' => 'integer',
            'nomor_rangka' => 'string',
            'category_id' => 'integer',
            'warna' => 'string'
        ]);

        $slug = SlugService::createSlug(Product::class, 'product_slug', $request->nama_product);

        try {
            $validateData['product_slug'] = $slug;
            $response = Product::create($validateData);
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
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $data = $product->load(['categories', 'document']);
        return response()->json($data, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $validateData = $request->validate([
            'nama_product' => 'string',
            'harga_awal' => 'integer',
            'jenis' => 'string',
            'merk' => 'string',
            'kapasitas_cc' => 'integer',
            'nomor_mesin' => 'string',
            'bahan_bakar' => 'string',
            'warna_tnkb' => 'string',
            'odometer' => 'integer',
            'nomor_rangka' => 'string',
            'category_id' => 'integer',
            'warna' => 'string'
        ]);

        try {
            $product->update($validateData);
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
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        try {
            $product->delete();
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