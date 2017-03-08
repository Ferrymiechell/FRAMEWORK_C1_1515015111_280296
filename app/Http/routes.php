<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/hello', function () {
    return "Hello Ferry welcome";
});

Route::get('pengguna/{pengguna}', function ($pengguna) {
    return "Hello dari pengguna $pengguna";
});

Route::get('pengguna/{pengguna?}', function ($pengguna="miechel") {
    return "Hello dari pengguna $pengguna";
});

Route::get('berita/{berita?}', function ($berita="Laravel 5") {
    return "Berita $berita belum dibaca";
});