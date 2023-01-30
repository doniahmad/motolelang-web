<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Auth;
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

    public function login()
    {
        return view(mainPages('signIn'));
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

        // return view(mainPages('signIn'), compact($data));
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

    public static function getProduct(HttpRequest $request)
    {
        $request = Request::create('/api/product/' . $request->slug, 'GET');
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

        try {
            // input data for product
            // $reqProduct = [
            //     'nama_product' => $input->nama_product,
            //     'merk' => $input->merk,
            //     'kapasitas_cc' => $input->kapasitas_cc,
            //     'odometer' => $input->odometer,
            //     'nomor_mesin' => $input->nomor_mesin,
            //     'jenis' => $input->jenis,
            //     'bahan_bakar' => $input->bahan_bakar,
            //     'warna' => $input->warna,
            //     'nomor_rangka' => $input->nomor_rangka,
            //     'merk' => $input->merk,
            // ];


            // $requestProduct = Request::create('/api/product', 'POST', $reqProduct);
            try {
                // $responseProduct = Route::dispatch($requestProduct);
                // $dataProduct = json_decode($responseProduct->getContent());

                // if ($dataProduct->product_id != null) {
                //     $reqAuction = [
                //         'id_product' => $dataProduct->product_id,
                //         'exp_date' => $input['exp_date'],
                //     ];

                //     $requestAuction = Request::create('http://127.0.0.1:8000/api/auction', 'POST', $reqAuction);
                //     $requestAuction->header('Accept', 'application/json');
                //     $responseAuction = Route::dispatch($requestAuction);
                //     $dataAuction = json_decode($responseAuction->getContent());
                //     dd($requestAuction);
                // }
                // PostDocument::dispatch($input->all());
                // PostAuction::dispatch($input->all());
            } catch (\Exception $e) {
                return dd($e->getMessage());
            }

            // if ($responseProduct) {
            //     return dd('test');
            // } else {
            // }


            // return var_dump($dataProduct);
            // return Redirect::to(route('dashboard.product'));
        } catch (\Exception $e) {
            return dd($e->getMessage());
        }
    }

    public function updateProduct(HttpRequest $input)
    {
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

    public static function getPayments()
    {
        $request = Request::create('/api/payment', 'GET');
        $response = Route::dispatch($request);
        $data = json_decode($response->getContent());
        return $data;
    }
}
