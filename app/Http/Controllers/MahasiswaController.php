<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Mahasiswa;

class MahasiswaController extends Controller
{
   public function awal()
    {
    	return "Hello dari MahasiswaController";
    }
    public function tambah()
    {
    	return $this->simpan();
    }
    public function simpan()
    {
    	$mahasiswa = new Mahasiswa();
    	$mahasiswa->nama = 'Ferry Miechel Lubis';
    	$mahasiswa->nim = '1515015111';
    	$mahasiswa->alamat = 'Jalan Pramuka 19 Blok D';
    	$mahasiswa->pengguna_id = 1;
    	$mahasiswa->save();
    	return "Data dengan nama mahasiswa {$mahasiswa->nama} telah disimpan";
    }
}