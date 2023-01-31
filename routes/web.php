<?php

use App\Http\Controllers\ViewController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use \GuzzleHttp\Client;
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
    return 'Main.pages.' . $value;
};

Route::group(['middleware' => 'auth'], function () {
});


Route::get('/', function () {
    return view(mainPages('home'));
})->name('home.index');


Route::get('/about', function () {
    return view(mainPages('about'));
})->name('about.index');



Route::group(['prefix' => 'login'], function () {
    Route::get('/', function () {
        return view(mainPages('signIn'));
    })->name('login.index');
    Route::post('/', [ViewController::class, 'loginAction'])->name('login.action');
    Route::get('/lupa', function () {
        return view(mainPages('forgotpassword'));
    })->name('login.lupa');
    Route::get('/daftar', function () {
        return view(mainPages('register'));
    })->name('login.daftar');
});

Route::get('/logout', [ViewController::class, 'logoutAction'])->name('logout.action');

Route::group(['prefix' => 'lelang'], function () {
    Route::get('/', function () {
        $data = ViewController::getProductsGallery();
        return view(mainPages('lelang'), compact('data'));
    })->name('lelang.index');
    Route::get('/detail/{slug}', function (HttpRequest $request) {
        $data = ViewController::getProduct($request);
        return view(mainPages('detail'), compact('data'));
    })->name('lelang.detail');
    Route::get('/room/{id}', function (HttpRequest $request) {
        $data = ViewController::getAuction($request);
        return view(mainPages('roomLelang'), compact('data'));
    })->name('lelang.room');
    Route::get('/lelang-saya', function () {
        return view(mainPages('lelangSaya'));
    })->name('lelang.lelangSaya');
    Route::get('/pembayaran', function () {
        return view(mainPages('pembayaran'));
    })->name('lelang.pembayaran');
});

// Admin

function adminPages($value)
{
    return 'Admin.pages.' . $value;
};

Route::group(['prefix' => 'dashboard'], function () {
    Route::get('/', function () {
        return view(adminPages('dashboard'));
    })->name('dashboard.index');
    Route::get('/login', function () {
        return view(adminPages('login'));
    })->name('dashboard.login');
    Route::group(['prefix' => 'product'], function () {
        Route::get('/', function () {
            $data = ViewController::getProducts();
            return view(adminPages('product'), compact('data'));
        })->name('dashboard.product');
        Route::post('/add', [ViewController::class, 'postProduct'])->name('dashboard.postProduct');
        Route::get('/add', function () {
            return view(adminPages('inputProduct'));
        })->name('dashboard.inputProduct');
        Route::get('/edit/{id}', function () {
            return view(adminPages('editProduct'));
        })->name('dashboard.editProduct');
    });
    Route::group(['prefix' => 'customer'], function () {
        Route::get('/', function () {
            $data = ViewController::getCustomers();
            return view(adminPages('customer'), compact('data'));
        })->name('dashboard.customer');
        Route::get('/{id}', [ViewController::class, 'getCustomer'])->name('dashboard.getCustomer');
    });
    Route::group(['prefix' => 'pembayaran'], function () {
        Route::get('/', function () {
            $data = ViewController::getPayments();
            return view(adminPages('pembayaran'), compact('data'));
        })->name('dashboard.pembayaran');
    });
});
