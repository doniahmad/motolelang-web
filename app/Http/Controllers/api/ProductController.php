<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Product;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = Product::with(['categories', 'auction.offer', 'images'])->get();
        return response()->json($response, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function productPaginate8()
    {
        $response = Product::with(['categories', 'auction'])->paginate(8);
        return response()->json($response, 200);
    }

    public function store(Request $request)
    {
        $validateProduct = $request->validate([
            'nama_product' => 'string|required',
            'harga_awal' => 'integer|required',
            'jenis' => 'string|required',
            'merk' => 'string|required',
            'kapasitas_cc' => 'integer|required',
            'nomor_mesin' => 'string|required',
            'bahan_bakar' => 'string|required',
            'odometer' => 'integer|required',
            'nomor_rangka' => 'string|required',
            'category_id' => 'integer',
            'warna' => 'string|required',
            'deskripsi' => 'required|string',
            'nomor_polisi' => 'required|string',
            'stnk' => "required|boolean",
            'bpkb' => "required|boolean",
            'form_a' => "required|boolean",
            'kwitansi_blanko' => "required|string",
            'faktur' => "required|boolean",
            'masa_stnk' => "required",
        ]);

        $slug = SlugService::createSlug(Product::class, 'product_slug', $request->nama_product);

        try {

            $validateProduct['product_slug'] = $slug;
            $product = Product::create($validateProduct);
            if ($request->hasFile('image')) {
                $imgList = array();
                $image = $request->file('image');
                foreach ($image as $imageFile) {
                    $image_name = 'product-' . rand(1, 9999) .  '.' . $imageFile->extension();
                    $imageFile->move(public_path('storage/image/product'), $image_name);
                    $imgList[] = ['image_path' => $image_name, 'id_product' => $product->product_id];
                }
                $reqImage = Image::insert($imgList);
            };
            return response()->json([
                'succes' => true,
                'message' => 'Success',
                'data' => ['product' => $product, 'image' => $reqImage],
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
        $data = $product->load(['categories', 'auction.auctioneer.user', 'auction.offer', 'images']);
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
            'warna' => 'string',
            'img_url' => 'image',
            'img_url.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'deskripsi' => 'string',
            'nomor_polisi' => 'string',
            'stnk' => "boolean",
            'bpkb' => "boolean",
            'form_a' => "boolean",
            'faktur' => "boolean",
            'kwitansi_blanko' => "string",
            'masa_stnk' => "date",
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
            Storage::delete('images/product/' . $product->img_url);
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
