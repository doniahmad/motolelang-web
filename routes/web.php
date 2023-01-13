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
    });


    Route::get('/about', function () {
        return view(mainPages('about'));
    });

    Route::get('/login', function () {
        return view(mainPages('signIn'));
    });

    Route::get('/forgotpassword', function () {
        return view(mainPages('forgotPassword'));
    });

    Route::group(['prefix' => 'lelang'], function () {
        Route::get('/', function () {
            return view(mainPages('lelang'));
        })->name('lelang.index');
        Route::get('/detail', function () {
            return view(mainPages('detail'));
        });
        Route::get('/room', function () {
            return view(mainPages('roomLelang'));
        });
    });
