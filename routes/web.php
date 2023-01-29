<?php

use App\Http\Controllers\ViewController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use \GuzzleHttp\Client;

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
    });
});


Route::group(['prefix' => 'lelang'], function () {
    Route::get('/', function () {
        $data = ViewController::getProductsGallery();
        return view(mainPages('lelang'), compact('data'));
    })->name('lelang.index');
    Route::get('/detail', function () {
        return view(mainPages('detail'));
    })->name('lelang.detail');
    Route::get('/room', function () {
        return view(mainPages('roomLelang'));
    });
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
