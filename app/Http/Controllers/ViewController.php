<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;
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

        // try {
        $request = Request::create('/api/login', 'POST', $inputData);
        $response = Route::dispatch($request);
        $data = json_decode($response->getContent());
        Session::put('token', $data->token);

        return Redirect::to(route('home.index'));
        // } catch (\Exception $e) {
        //     return dd($e->getMessage());
        // }
    }

    public function loginAdmin(HttpRequest $input)
    {
        $inputData = [
            'email' => $input->email,
            'password' => $input->password,
        ];

        $request = Request::create('/api/login-admin', 'POST', $inputData);
        $response = Route::dispatch($request);
        $data = json_decode($response->getContent());
        Session::put('token', $data->token);

        return Redirect::to(route('dashboard.index'));
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

        // dd($inputData);

        try {
            $request = Request::create('/api/register', 'POST', $inputData);
            $response = Route::dispatch($request);
            return Redirect::to(route('login.index'));
        } catch (\Exception $e) {
            return dd($e->getMessage());
        }
    }

    public static function updateUserProfile(HttpRequest $data)
    {

        $data['_method'] = 'PUT';

        $request = Request::create('/api/user/' . $data->id, 'POST', $data->all());
        $response = Route::dispatch($request);

        Alert::toast('Profile Telah Diperbarui', 'success');
        return redirect(route('profil.index'));
    }

    public static function updateAdminProfile(HttpRequest $data)
    {

        $data['_method'] = 'PUT';

        $request = Request::create('/api/admin/' . $data->id, 'POST', $data->all());
        $response = Route::dispatch($request);

        Alert::toast('Profile Telah Diperbarui', 'success');
        return redirect(route('admin.profile'));
    }

    public function logoutAction()
    {
        // try {
        auth()->logout();
        Session::forget('token');
        return Redirect::to(route('home.index'));
        // } catch (\Exception $e) {
        //     return dd($e->getMessage());
        // }
    }

    public function adminLogoutAction()
    {
        auth()->logout();
        Session::forget('token');
        return Redirect::to(route('login'));
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

            Alert::toast('Product berhasil ditambahkan', 'success');

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

        Alert::toast('Product berhasil diperbarui', 'success');

        return Redirect::to(route('dashboard.product'));
    }

    public function deleteProduct(HttpRequest $input)
    {

        $method = ["_method" => 'DELETE'];
        $request = Request::create('/api/product/' . $input->param, 'POST', $method);
        $response = Route::dispatch($request);

        Alert::toast('Product berhasil dihapus', 'success');

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
        // return response()->json($data, 200);
        return view(adminPages('detailCustomer'), compact('data'));
    }

    public static function banCustomer(HttpRequest $param)
    {
        $request = Request::create('/api/user/' . $param->id, 'DELETE');
        $response = Route::dispatch($request);
        // return response()->json($data, 200);
        Alert::toast('Customer berhasil dibanned', 'success');
        return route('dashboard.customer');
    }

    public static function setAuction(HttpRequest $input)
    {
        $request = Request::create('/api/auction', 'POST', $input->all());
        $response = Route::dispatch($request);

        Alert::toast('Pelelangan berhasil dijalankan', 'success');

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

    public static function getInvoice(HttpRequest $param)
    {
        $request = Request::create('api/invoice/' . $param->token, 'GET');
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
            '_method' => 'PUT'
        ];

        $request = Request::create('api/invoice/' . $param->kode_pembayaran, 'POST', $dataReq);
        $response = Route::dispatch($request);

        Alert::toast('Pembayaran berhasil dikirimkan', 'success');

        return Redirect::to('http://127.0.0.1:8000/lelang/lelang-saya');
    }

    public function rejectInvoice(HttpRequest $data)
    {
        $dataReq = [
            '_method' => 'PUT'
        ];

        $request = Request::create('api/invoice/' . $data->kode_pembayaran, 'POST', $dataReq);
        $response = Route::dispatch($request);

        Alert::toast('Pembayaran ditolak', 'success');

        return Redirect::to(route('dashboard.pembayaran'));
    }

    public function acceptInvoice(HttpRequest $data)
    {
        $reqAuction = [
            '_method' => 'PUT',
            'status' => $data->status,
            'alasan_penolakan' => ''
        ];

        $reqPengiriman = [
            'id_invoice' => $data->id_invoice,
            'id_kurir' => $data->id_kurir,

        ];

        $updateInvoice = Request::create('api/invoice/' . $data->kode_pembayaran, 'POST', $reqAuction);
        $sendPengiriman = Request::create('api/pengiriman', 'POST', $reqPengiriman);
        Route::dispatch($updateInvoice);
        Route::dispatch($sendPengiriman);

        Alert::toast('Pembayaran disetujui', 'success');
        return Redirect::to(route('dashboard.pembayaran'));
    }

    public static function getKurirs()
    {
        $request = Request::create('api/kurir', 'GET');
        $response = Route::dispatch($request);
        $data = json_decode($response->getContent());

        return $data;
    }

    public static function getKurir(HttpRequest $param)
    {
        $request = Request::create('/api/kurir/' . $param->id, 'GET');
        $response = Route::dispatch($request);
        $data = json_decode($response->getContent());
        // return response()->json($data, 200);
        return view(adminPages('detailKurir'), compact('data'));
    }

    public static function postKurir(HttpRequest $input)
    {

        $request = Request::create('api/kurir', 'POST', $input->all());
        $response = Route::dispatch($request);


        // dd($response);
        Alert::toast('Berhasil menambahkan kurir', 'success');
        return redirect(route('dashboard.kurir'));
    }

    public static function deleteKurir(HttpRequest $param)
    {

        $request = Request::create('api/kurir/' . $param->id, 'DELETE');
        $response = Route::dispatch($request);

        // dd($param->id);
        // alert()->success('SuccessAlert', 'Lorem ipsum dolor sit amet.');
        Alert::toast('Berhasil menghapus kurir', 'success');
        return redirect(route('dashboard.kurir'));
    }

    public static function getAdmins()
    {
        $request = Request::create('api/admin', 'GET');
        $response = Route::dispatch($request);
        $data = json_decode($response->getContent());

        return $data;
    }

    public static function getAdmin(HttpRequest $id)
    {
        $request = Request::create('/api/kurir/' . $id->id, 'GET');
        $response = Route::dispatch($request);
        $data = json_decode($response->getContent());
        // return response()->json($data, 200);
        return view(adminPages('detailAdmin'), compact('data'));
    }

    public static function postAdmin(HttpRequest $input)
    {

        $request = Request::create('api/admin', 'POST', $input->all());
        $response = Route::dispatch($request);

        Alert::toast('Admin berhasil ditambahkan', 'success');
        // dd($response);
        return redirect(route('dashboard.admin'))->withSuccess('Admin berhasil ditambahkan');
    }

    public static function deleteAdmin(HttpRequest $param)
    {

        $request = Request::create('api/admin/' . $param->id, 'DELETE');
        $response = Route::dispatch($request);

        // dd($param->id);
        // alert()->success('SuccessAlert', 'Lorem ipsum dolor sit amet.');
        Alert::toast('Berhasil menghapus admin', 'success');
        return redirect(route('dashboard.admin'));
    }

    public static function getPengirimans()
    {
        $request = Request::create('api/pengiriman', 'GET');
        $response = Route::dispatch($request);
        $data = json_decode($response->getContent());

        return $data;
    }

    public static function setDelivered(HttpRequest $data)
    {
        $req = [
            'bukti_penerimaan' => $data->bukti_penerimaan,
            '_method' => 'PUT'
        ];

        $request = Request::create('api/pengiriman/' . $data->id, 'POST', $req);
        Route::dispatch($request);

        Alert::toast('Pengiriman telah selesai', 'success');
        return redirect(route('dashboard.pengiriman'));
    }
}
