<?php

use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ViewController;
use App\Models\Auction;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request as HttpRequest;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


function mainPages($value)
{
    return 'main.pages.' . $value;
};

Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'profil'], function () {
        Route::get('/', function () {
            return view(mainPages('profile'));
        })->name('profil.index');
        Route::post('/update-profil', [ViewController::class, 'updateUserProfile'])->name('profil.update');
        Route::get('/edit-profil', function () {
            return view(mainPages('editProfile'));
        })->name('profil.edit');
    });
});


Route::get('/', function () {
    $data = Auction::withCount('auctioneer')->with(['product.images', 'auctioneer.user', 'auctioneer.offer', 'offer.auctioneer', 'auctioneer.invoice',])->orderBy('auctioneer_count')->take(3)->get();
    return view(mainPages('home'), compact('data'));
})->name('home.index');


Route::get('/about', function () {
    return view(mainPages('about'));
})->name('about.index');

// Route::get('/profil', function () {
//     return view(mainPages('profile'));
// })->name('profil.index');

//
//
Route::group(['prefix' => 'login'], function () {
    Route::get('/', function () {
        return view(mainPages('signIn'));
    })->name('login.index');
    Route::post('/', [ViewController::class, 'loginAction'])->name('login.action');
    Route::get('/forgot', function () {
        return view(mainPages('forgotpassword'));
    })->name('login.forgot');
    Route::get('/forgot/email-sended', function () {
        return view(mainPages('afterSendEmailReset'));
    })->name('login.sendEmailForgot');
    Route::get('/password/reset', function () {
        return view(mainPages('resetPassword'));
    })->name('password.reset');
    Route::get('users/{id}', function ($id) {
    });
    Route::get('/daftar', function () {
        return view(mainPages('register'));
    })->name('login.daftar');
    Route::post('/daftar', [ViewController::class, 'registerAction'])->name('login.daftarAction');
    Route::post('/send/forgotPassword', [ViewController::class, 'sendPasswordResetEmail'])->name('forgot.sendEmail');
    Route::post('/send/resetPassword', [ViewController::class, 'resetPassword'])->name('forgot.resetPassword');
});

Route::get('/send-email', [NotificationController::class, 'sendEmailEndAuctionNotification'])->name('notif.endAuction');

Route::get('/logout', [ViewController::class, 'logoutAction'])->name('logout.action');

Route::group(['prefix' => 'lelang'], function () {
    Route::get('/', [ViewController::class, 'showGalleryLelang'])->name('lelang.index');
    Route::get('/detail/{param}', function (HttpRequest $request) {
        $data = ViewController::getProduct($request);
        return view(mainPages('detail'), compact('data'));
    })->name('lelang.detail');
    Route::get('/room/{token}', function (HttpRequest $request) {
        $data = ViewController::getAuction($request);
        return view(mainPages('roomLelang'), compact('data'));
    })->name('lelang.room');
    Route::get('/lelang-saya', function () {
        return view(mainPages('lelangSaya'));
    })->name('lelang.lelangSaya');
    Route::get('/pembayaran/{token}', function (HttpRequest $request) {
        $data = ViewController::getInvoice($request);
        $ongkir = ViewController::getOngkirs();
        return view(mainPages('pembayaran'), compact(['data', 'ongkir']));
    })->name('lelang.pembayaran');
    Route::post('/invoice/bayar', [ViewController::class, 'payInvoice'])->name('invoice.bayar');
    Route::post('/auction/join', [ViewController::class, 'createAuctioneer'])->name('lelang.auctioneer');
    Route::post('/auction/offer', [ViewController::class, 'createOffer'])->name('lelang.offer');
});

// Admin

function adminPages($value)
{
    return 'admin.pages.' . $value;
};


Route::group(['prefix' => 'dashboard', 'middleware' => ['web']], function () {
    Route::get('/login', function () {
        return view(adminPages('login'));
    })->name('login.dashboard');
    Route::post('/login-action', [ViewController::class, 'loginAdmin'])->name('login.admin');
    Route::group(['middleware' => ['auth', 'role:admin|owner|kurir']], function () {
        Route::get('/', function () {
            return view(adminPages('dashboard'));
        })->name('dashboard.index')->middleware('role:admin|owner');
        Route::get('/logout', [ViewController::class, 'adminLogoutAction'])->name('admin.logout');
        Route::get('/profile', function () {
            return view(adminPages('profileAdmin'));
        })->name('admin.profile');
        Route::get('/profile/edit', function () {
            return view(adminPages('editProfileAdmin'));
        })->name('dashboard.editProfil');
        Route::post('/profile/update', [ViewController::class, 'updateAdminProfile'])->name('update.profileAdmin');
        Route::group(['prefix' => 'product', 'middleware' => 'role:admin|owner'], function () {
            Route::get('/', function () {
                $data = ViewController::getProducts();
                return view(adminPages('product'), compact('data'));
            })->name('dashboard.product');
            Route::get('/delete/{param}', [ViewController::class, 'deleteProduct'])->name('dashboard.deleteProduct');
            Route::get('/add', function () {
                $data = (object) [
                    'nama_product' => '',
                    'harga_awal' => '',
                    'merk' => '',
                    'kapasitas_cc' => '',
                    'odometer' => '',
                    'nomor_mesin' => '',
                    'jenis' => '',
                    'bahan_bakar' => '',
                    'warna' => '',
                    'nomor_rangka' => '',
                    'merk' => '',
                    'img_url' => '',
                    'deskripsi' => '',
                    'nomor_polisi' => '',
                    'stnk' => '',
                    'bpkb' => '',
                    'form_a' => '',
                    'faktur' => '',
                    'kwitansi_blanko' => '',
                    'masa_stnk' => '',
                ];
                return view(adminPages('inputProduct'), compact('data'));
            })->name('dashboard.inputProduct');
            Route::get('/edit/{param}', function (HttpRequest $param) {
                $data = ViewController::getProduct($param);
                return view(adminPages('editProduct'), compact('data'));
            })->name('dashboard.editProduct');
            Route::post('/set-auction', [ViewController::class, 'setAuction'])->name('dashboard.setAuction');
            Route::post('/add', [ViewController::class, 'postProduct'])->name('dashboard.postProduct');
            Route::post('/edit/{param}', [ViewController::class, 'updateProduct'])->name('dashboard.updateProduct');
        });
        Route::group(['prefix' => 'admin', 'middleware' => 'role:owner'], function () {
            Route::get('/delete/{id}', [ViewController::class, 'deleteAdmin'])->name('dashboard.deleteAdmin');
            Route::get('/', function () {
                $data = ViewController::getAdmins();
                return view(adminPages('admin'), compact('data'));
            })->name('dashboard.admin');
            Route::get('/add', function () {
                return view(adminPages('inputAdmin'));
            })->name('dashboard.inputAdmin');
            Route::post('/send-req', [ViewController::class, 'postAdmin'])->name('dashboard.postAdmin');
            Route::get('/{id}', [ViewController::class, 'getAdmin'])->name('dashboard.getAdmin');
        });
        Route::group(['prefix' => 'customer', 'middleware' => 'role:admin|owner'], function () {
            Route::get('/', function () {
                $data = ViewController::getCustomers();
                return view(adminPages('customer'), compact('data'));
            })->name('dashboard.customer');
            Route::get('/{id}', [ViewController::class, 'getCustomer'])->name('dashboard.getCustomer');
            Route::get('/ban/{id}', [ViewController::class, 'banCustomer'])->name('dashboard.banCustomer');
        });
        Route::group(['prefix' => 'kurir', 'middleware' => 'role:admin|owner'], function () {
            Route::get('/', function () {
                $data = ViewController::getKurirs();
                return view(adminPages('kurir'), compact('data'));
            })->name('dashboard.kurir');
            Route::get('/add', function () {
                return view(adminPages('inputKurir'));
            })->name('dashboard.inputKurir');
            Route::get('/{id}', [ViewController::class, 'getKurir'])->name('dashboard.detailKurir');
            Route::get('/delete/{id}', [ViewController::class, 'deleteKurir'])->name('dashboard.deleteKurir');
            Route::post('/send-req', [ViewController::class, 'postKurir'])->name('dashboard.postKurir');
        });
        Route::group(['prefix' => 'pengiriman', 'middleware' => 'role:admin|kurir|owner'], function () {
            Route::get('/', function () {
                $data = ViewController::getPengirimans();

                return view(adminPages('pengiriman'), compact('data'));
            })->name('dashboard.pengiriman');
            Route::post('/delivered/{id}', [ViewController::class, 'setDelivered'])->name('dashboard.delivered');
            // Route::get('/{id}', [ViewController::class, 'getCustomer'])->name('dashboard.getCustomer');
        });
        Route::group(['prefix' => 'pembayaran', 'middleware' => 'role:admin|owner'], function () {
            Route::get('/', function () {
                $data = ViewController::getInvoices();
                $pengirim = ViewController::getKurirs();
                return view(adminPages('pembayaran'), compact(['data', 'pengirim']));
            })->name('dashboard.pembayaran');
            Route::post('/reject', [ViewController::class, 'rejectInvoice'])->name('dashboard.rejectInvoice');
            Route::post('/acc', [ViewController::class, 'acceptInvoice'])->name('dashboard.acceptInvoice');
        });
    });
});