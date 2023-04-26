<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Auction;
use App\Models\Image;
use App\Models\Product;
use App\Models\User;
use App\Notifications\AcceptInvoiceNotification;
use Cviebrock\EloquentSluggable\Services\SlugService;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Notification;
use Illuminate\Validation\ValidationException;
use RajaOngkir;

class ViewController extends Controller
{

    function mainPages($value)
    {
        return 'main.pages.' . $value;
    }

    public static function postAction($path, $input)
    {
        $request = Request::create($path, 'POST', $input);
        $response = Route::dispatch($request);
        return json_decode($response->getContent());
    }

    public function loginAction(HttpRequest $input)
    {
        $inputData = [
            'email' => $input->email,
            'password' => $input->password,
        ];

        $data = $this->postAction('/api/login', $inputData);

        if ($data->status === "success") {
            Session::put('token', $data->token);
            return Redirect::to(route('home.index'));
        } else {
            return redirect()->back()->withErrors($data);
        }
    }

    public function loginAdmin(HttpRequest $input)
    {
        $inputData = [
            'email' => $input->email,
            'password' => $input->password,
        ];

        $data = $this->postAction('/api/login-admin', $inputData);
        if ($data->status === 'success') {
            Session::put('token', $data->token);
            if ($data->user->role[0] === 'kurir') {
                return redirect(route('dashboard.pengiriman'));
            } else {
                return redirect(route('dashboard.index'));
            }
        } else {
            return redirect()->back()->withErrors($data);
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

        $data = $this->postAction('/api/register', $inputData);

        if ($data->status === "success") {
            return Redirect::to(route('login.index'));
        } else {
            return redirect()->back()->withInput()->withErrors($data->message);
        }
    }

    public static function updateUserProfile(HttpRequest $input)
    {

        $input['_method'] = 'PUT';

        $data = self::postAction('api/user/' . $input->id, $input->all());


        if ($data->status === 'success') {
            Alert::toast('Profile Telah Diperbarui', 'success');
            return redirect(route('profil.index'));
        } else {
            return redirect()->back()->withInput()->withErrors($data->message);
        }
    }

    public static function updateAdminProfile(HttpRequest $input)
    {

        $input['_method'] = 'PUT';


        $data = self::postAction('/api/admin/' . $input->id, $input->all());
        // if ($data->status === 'success') {
        Alert::toast('Profile Telah Diperbarui', 'success');
        return redirect(route('admin.profile'));
        // } else {
        // return redirect()->back()->withErrors($data);
        // }
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
        auth()->guard('web')->logout();
        Session::forget('token');
        return Redirect::to(route('login.dashboard'));
    }

    public function showGalleryLelang()
    {
        $response = Auction::with(['product.images', 'auctioneer.user', 'auctioneer.offer', 'offer.auctioneer', 'auctioneer.invoice',])->orderBy('created_at', 'desc')->paginate(12);
        // dd($response);
        return view($this->mainPages('lelang'))->with('data', $response);
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

    public function postProduct(HttpRequest $request)
    {
        // input data for product
        // $reqProduct = [
        //     'nama_product' => $input->nama_product,
        //     'merk' => $input->merk,
        //     'harga_awal' => $input->harga_awal,
        //     'kapasitas_cc' => $input->kapasitas_cc,
        //     'odometer' => $input->odometer,
        //     'nomor_mesin' => $input->nomor_mesin,
        //     'jenis' => $input->jenis,
        //     'bahan_bakar' => $input->bahan_bakar,
        //     'warna' => $input->warna,
        //     'nomor_rangka' => $input->nomor_rangka,
        //     'merk' => $input->merk,
        //     'deskripsi' => $input->deskripsi,
        //     'nomor_polisi' => $input->nomor_polisi,
        //     'stnk' => $input->stnk,
        //     'bpkb' => $input->bpkb,
        //     'form_a' => $input->form_a,
        //     'faktur' => $input->faktur,
        //     'kwitansi_blanko' => $input->kwitansi_blanko,
        //     'masa_stnk' => $input->masa_stnk,
        //     'image[]' => $input->image,
        // ];
        // $data = self::postAction('/api/product', $reqProduct);
        // // dd($data);
        // if ($data->status === 'success') {
        //     Alert::toast('Product berhasil ditambahkan', 'success');
        //     return Redirect::to(route('dashboard.product'));
        // } else {
        //     Alert::toast('Product gagal ditambahkan', 'error');
        //     FacadesView::share('errors', $$data->message);
        // }

        try {
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
                'image' => 'required'
            ]);

            $slug = SlugService::createSlug(Product::class, 'product_slug', $request->nama_product);


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
                Image::insert($imgList);
            };
            Alert::toast('Product berhasil ditambahkan', 'success');
            return Redirect::to(route('dashboard.product'));
        } catch (ValidationException $e) {
            Alert::toast('Product gagal ditambahkan', 'error');
            return redirect()->back()->withInput($request->all())->withErrors($e->errors());
        }
    }

    public function updateProduct(HttpRequest $input)
    {

        $input['_method'] = 'PUT';

        $data = $this->postAction('/api/product/' . $input->param, $input->all());

        if ($data->status === 'success') {
            Alert::toast('Product berhasil diperbarui', 'success');
            return Redirect::to(route('dashboard.product'));
        } else {
            Alert::toast('Product gagal diperbarui', 'error');
            return redirect()->back()->withErrors($data);
        }
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
        $data = self::postAction('/api/auction', $input->all());

        if ($data->status === 'success') {
            Alert::toast('Pelelangan berhasil dijalankan', 'success');
            return Redirect::to(route('dashboard.product'));
        } else {
            return redirect()->back()->withErrors($data);
        }
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
        $data = self::postAction('/api/auctioneer', $input->all());

        if ($data->status === 'success') {
            Alert::toast('Anda berhasil mengikuti lelang', 'success');
            return Redirect::to(route('lelang.room', ['token' => $input->token_pelelangan]));
        } else {
            return redirect()->back()->withErrors($data);
        }
    }

    public static function createOffer(HttpRequest $input)
    {
        if (isset($input->new_offer)) {
            $dataReq = [
                'offer' => $input->new_offer,
                '_method' => 'PUT',
            ];
            $data = self::postAction('/api/offer/' . $input->current_offer_id, $dataReq);
        } else {
            $dataReq = [
                'id_auction' => $input->id_auction,
                'id_auctioneer' => $input->id_auctioneer,
                'offer' => $input->offer,
            ];
            $data = self::postAction('/api/offer', $dataReq);
        }
        if ($data->status === 'success') {
            Alert::toast('Berhasil memasang penawaran', 'success');
            return Redirect::to(route('lelang.room', ['token' => $input->token_lelang]));
        } else {
            Alert::toast('Gagal memasang penawaran', 'error');
            return redirect()->back()->withErrors($data);
        }
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
        $param['_method'] = 'PUT';

        $data = self::postAction('/api/invoice/' . $param->kode_pembayaran, $param->all());

        if ($data->status === 'success') {
            Alert::success('Pembayaran berhasil dikirimkan');
            return Redirect::to(route('lelang.lelangSaya'));
        } else {
            Alert::error('Gagal melakukan pembayaran');
            return redirect()->back()->withErrors($data);
        }
    }

    public function rejectInvoice(HttpRequest $param)
    {
        $param['_method'] = 'PUT';

        $data = $this->postAction('/api/invoice/' . $param->kode_pembayaran, $param->all());

        if ($data->status === 'success') {
            Alert::toast('Pembayaran ditolak', 'success');
            return Redirect::to(route('dashboard.pembayaran'));
        } else {
            return redirect()->back()->withErrors($data);
        }
    }

    public function acceptInvoice(HttpRequest $data)
    {
        $reqInvoice = [
            '_method' => 'PUT',
            'status' => $data->status,
            'alasan_penolakan' => null
        ];

        $reqPengiriman = [
            'id_invoice' => $data->id_invoice,
            'id_kurir' => $data->id_kurir,
        ];

        $auctioneer = json_decode($data->auctioneer);
        $user = User::find($auctioneer->user->user_id);

        Notification::send($user, new AcceptInvoiceNotification($auctioneer));

        $pengiriman = $this->postAction('api/pengiriman', $reqPengiriman);
        $invoice = $this->postAction('api/invoice/' . $data->kode_pembayaran, $reqInvoice);

        if ($invoice->status === 'success' && $pengiriman->status === 'success') {
            Alert::toast('Pembayaran disetujui', 'success');
            return redirect()->back();
        } else {
            Alert::toast('Gagal menyetujui', 'error');
            return redirect()->back();
        }
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
        $data = self::postAction('/api/kurir', $input->all());

        if ($data->status === 'success') {
            Alert::toast('Berhasil menambahkan kurir', 'success');
            return redirect(route('dashboard.kurir'));
        } else {
            return redirect()->back()->withInput()->withErrors($data->message);
        }
    }

    public static function deleteKurir(HttpRequest $param)
    {

        $request = Request::create('api/kurir/' . $param->id, 'DELETE');
        $response = Route::dispatch($request);

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
        return view(adminPages('detailAdmin'), compact('data'));
    }

    public static function postAdmin(HttpRequest $input)
    {
        $data = self::postAction('/api/admin', $input->all());
        if ($data->status === 'success') {
            Alert::toast('Admin berhasil ditambahkan', 'success');
            return redirect(route('dashboard.admin'));
        } else {
            Alert::error('Admin gagal ditambahkan', 'Anda gagal menambahkan admin baru!');
            return redirect()->back()->withInput()->withErrors($data->message);
        }
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

    public static function setDelivered(HttpRequest $input)
    {
        $req = [
            'bukti_penerimaan' => $input->bukti_penerimaan,
            '_method' => 'PUT'
        ];
        $data = self::postAction('/api/pengiriman/' . $input->id, $req);

        if ($data->status === 'success') {
            Alert::toast('Pengiriman telah selesai', 'success');
            return redirect(route('dashboard.pengiriman'));
        } else {
            Alert::error('Gagal memasang bukti');
            return redirect()->back()->withErrors($data);
        }
    }

    public function sendPasswordResetEmail(HttpRequest $email)
    {
        $data = $this->postAction('/api/password/forgot', $email->all());

        if ($data->status === 'success') {
            Session::put('email_reset_password', $email);
            Alert::success('Email berhasil dikirimkan', 'Silahkan cek email anda untuk verifikasi');
        } else {
            return redirect()->back()->withErrors($data);
        }
    }

    public function resetPassword(HttpRequest $req)
    {
        $data = [
            'email' => $req->query('email'),
            'token' => $req->query('token'),
            'password' => $req->password,
            'password_confirmation' => $req->password_confirmation
        ];

        $data = $this->postAction('/api/password/reset', $data);

        if ($data->status === 'success') {
            Alert::success('Berhasil memperbarui password');
            return redirect(route('login.index'));
        } else {
            return redirect()->back()->withErrors($data);
        }
    }

    public static function getOngkirs()
    {
        $request = Request::create('api/ongkir', 'GET');
        $response = Route::dispatch($request);
        $data = json_decode($response->getContent());

        return $data;
    }
    // public static function pembayaranView(HttpRequest $request)
    //     {
    //         $data = self::getInvoice($request);
    //         $dataProvince = RajaOngkir::province()->get();
    //         return view(mainPages('pembayaran'), compact(['data', 'dataProvince']));
    //     }
}
