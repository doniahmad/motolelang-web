.<?php

    use Illuminate\Support\Facades\Route;

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
        Route::get('/lupa', function () {
            return view(mainPages('forgotpassword'));
        });
    });


    Route::group(['prefix' => 'lelang'], function () {
        Route::get('/', function () {
            return view(mainPages('lelang'));
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

    