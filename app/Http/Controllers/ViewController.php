<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

class ViewController extends Controller
{

    function mainPages($value)
    {
        return 'Main.pages.' . $value;
    }

    public function loginAction(HttpRequest $input)
    {
        $inputData = [
            'email' => $input->email,
            'password' => $input->password,
        ];

        try {
            $request = Request::create('/api/login', 'POST', $inputData);
            $response = Route::dispatch($request);
            $data = json_decode($response->getContent());
            Session::put('token', $data->token);

            return Redirect::to(route('home.index'));
        } catch (\Exception $e) {
            return dd($e->getMessage());
        }
    }

    public function registerAction(HttpRequest $input)
    {
        $inputData = [
            'name' => $input->name,
            'email' => $input->email,
            'handphone' => $input->handphone,
            'password' => $input->password,
            'password_confirmation' => $input->password_confirmation
        ];

        try {
            $request = Request::create('/api/register', 'POST', $inputData);
            $response = Route::dispatch($request);
        } catch (\Exception $e) {
            return dd($e->getMessage());
        }

        return Redirect::to(route('login.index'));
    }

    public function logoutAction(HttpRequest $input)
    {
        try {
            auth()->logout();
            Session::forget('token');
            return Redirect::to(route('home.index'));
        } catch (\Exception $e) {
            return dd($e->getMessage());
        }
    }

    public static function getProducts()
    {
        $request = Request::create('/api/product', 'GET');
        $response = Route::dispatch($request);
        $data = json_decode($response->getContent());
        return $data;
    }

    public static function getProduct(HttpRequest $input)
    {
        $request = Request::create('/api/product/' . $input->param, 'GET');
        $response = Route::dispatch($request);
        $data = json_decode($response->getContent());
        return $data;
    }

    public static function getProductsGallery()
    {
        $request = Request::create('/api/product-gallery', 'GET');
        $response = Route::dispatch($request);
        $data = json_decode($response->getContent());
        return $data;
    }

    public function postProduct(HttpRequest $input)
    {

        // input data for product
        $reqProduct = [
            'nama_product' => $input->nama_product,
            'merk' => $input->merk,
            'harga_awal' => $input->harga_awal,
            'kapasitas_cc' => $input->kapasitas_cc,
            'odometer' => $input->odometer,
            'nomor_mesin' => $input->nomor_mesin,
            'jenis' => $input->jenis,
            'bahan_bakar' => $input->bahan_bakar,
            'warna' => $input->warna,
            'nomor_rangka' => $input->nomor_rangka,
            'merk' => $input->merk,
            'img_url' => $input->img_url,
            'deskripsi' => $input->deskripsi,
            'nomor_polisi' => $input->nomor_polisi,
            'stnk' => $input->stnk,
            'bpkb' => $input->bpkb,
            'form_a' => $input->form_a,
            'faktur' => $input->faktur,
            'kwitansi_blanko' => $input->kwitansi_blanko,
            'masa_stnk' => $input->masa_stnk,
        ];



        try {
            $request = Request::create('/api/product', 'POST', $reqProduct);
            $response = Route::dispatch($request);
            return Redirect::to(route('dashboard.product'));
        } catch (\ErrorException $e) {
            return $e->getMessage();
        }

        // $reqAuction = [
        //     'id_product' => $dataProduct->data->product_id,
        //     'exp_date' => $input->exp_date
        // ];

        // Request::create('/api/auction', 'POST', $reqAuction);

    }

    public function updateProduct(HttpRequest $input)
    {

        $input['_method'] = 'PUT';
        $request = Request::create('/api/product/' . $input->param, 'POST', $input->all());
        $response = Route::dispatch($request);
        return Redirect::to(route('dashboard.product'));
    }

    public function deleteProduct(HttpRequest $input)
    {

        $method = ["_method" => 'DELETE'];
        $request = Request::create('/api/product/' . $input->param, 'POST', $method);
        $response = Route::dispatch($request);
        return Redirect::to(route('dashboard.product'));
    }

    public static function getCustomers()
    {
        $request = Request::create('/api/customers', 'GET');
        $response = Route::dispatch($request);
        $data = json_decode($response->getContent());
        return $data;
    }

    public static function getCustomer(HttpRequest $param)
    {
        $request = Request::create('/api/customer/' . $param->id, 'GET');
        $response = Route::dispatch($request);
        $data = json_decode($response->getContent());
        return response()->json($data, 200);
        // return view(adminPages('customer'), compact('data'));

    }

    public static function setAuction(HttpRequest $input)
    {
        $request = Request::create('/api/auction', 'POST', $input->all());
        $response = Route::dispatch($request);
        return Redirect::to(route('dashboard.product'));
    }

    public static function getAuction(HttpRequest $param)
    {
        $request = Request::create('/api/auction/' . $param->token, 'GET');
        $response = Route::dispatch($request);
        $data = json_decode($response->getContent());
        return $data;
    }

    public static function getAuctions()
    {
        $request = Request::create('/api/auction', 'GET');
        $response = Route::dispatch($request);
        $data = json_decode($response->getContent());
        return $data;
    }

    public static function createAuctioneer(HttpRequest $input)
    {
        $request = Request::create('api/auctioneer', 'POST', $input->all());
        $response = Route::dispatch($request);
        $data = json_decode($response->getContent());
        return Redirect::to(route('lelang.room', ['token' => $input->token_pelelangan]));
    }

    public static function createOffer(HttpRequest $input)
    {

        if (isset($input->new_offer)) {
            $dataReq = [
                'offer' => $input->new_offer,
                '_method' => 'PUT',
            ];
            $request = Request::create('api/offer/' . $input->current_offer_id, 'POST', $dataReq);
            $response = Route::dispatch($request);
        } else {
            $dataReq = [
                'id_auction' => $input->id_auction,
                'id_auctioneer' => $input->id_auctioneer,
                'offer' => $input->offer,
            ];
            $request = Request::create('api/offer', 'POST', $dataReq);
            $response = Route::dispatch($request);
        }

        return Redirect::to(route('lelang.room', ['token' => $input->token_lelang]));
    }

    public static function getInvoice()
    {
        $request = Request::create('api/my-invoice', 'GET');
        $response = Route::dispatch($request);
        $data = json_decode($response->getContent());

        return $data;
    }

    public static function getInvoices()
    {
        $request = Request::create('api/invoice', 'GET');
        $response = Route::dispatch($request);
        $data = json_decode($response->getContent());

        return $data;
    }

    public static function payInvoice(HttpRequest $param)
    {
        $dataReq = [
            'bukti_pembayaran' => $param->bukti_pembayaran,
            '_method' => 'PUT'
        ];

        $request = Request::create('api/invoice/' . $param->kode_pembayaran, 'POST', $dataReq);
        $response = Route::dispatch($request);
        dd($response);
    }
}
