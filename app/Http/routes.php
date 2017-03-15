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

Route::get('pengguna', 'PenggunaController@awal');

Route::get('pengguna/tambah', 'PenggunaController@tambah');

Route::get('dosen', 'DosenController@awal');

Route::get('dosen/tambah', 'DosenController@tambah');

Route::get('mahasiswa', 'MahasiswaController@awal');

Route::get('mahasiswa/tambah', 'MahasiswaController@tambah');

Route::get('ruangan', 'RuanganController@awal');

Route::get('ruangan/tambah', 'RuanganController@tambah');

Route::get('matakuliah', 'MatakuliahController@awal');

Route::get('matakuliah/tambah', 'MatakuliahController@tambah');

Route::get('dosen_matakuliah', 'Dosen_MatakuliahController@awal');

Route::get('dosen_matakuliah/tambah', 'Dosen_MatakuliahController@tambah');

Route::get('jadwal_matakuliah', 'Jadwal_MatakuliahController@awal');

Route::get('jadwal_matakuliah/tambah', 'Jadwal_MatakuliahController@tambah');

Route::get('pengguna/ferry',function(){
	    $pengguna = new App\pengguna();
    	$pengguna->username = 'ferry';
    	$pengguna->password = '123';
    	$pengguna->save();
	return "Data dengan username {$pengguna->username} telah disimpan";
});

Route::get('pengguna/lubis',function(){
	    $pengguna = new App\pengguna();
    	$pengguna->username = 'lubis';
    	$pengguna->password = '123';
    	$pengguna->save();
	return "Data dengan username {$pengguna->username} telah disimpan";
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
