<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    public function useNPM()
    {
        return view('nilai.inputNPM');
    }

    public function getNPM(Request $request)
    {
        return redirect('/mahasiswa/'.$request->npm);
    }

    public function getDataNilaiMahasiswa($npm)
    {
        $mahasiswa = DB::table('mahasiswa')
        ->where('npm', '=', $npm)
        ->first();

        $nilai = DB::table('nilai')
        ->join('mahasiswa', 'nilai.npm', '=', 'mahasiswa.npm')
        ->join('mataKuliah', 'nilai.kd_matkul', '=', 'mataKuliah.kd_matkul')
        ->where('nilai.npm', '=', $npm)
        ->get();

        $Nnilai = DB::select('SELECT AVG(x.subtotal) AS totalNilai FROM (SELECT (ntugas + nquiz) / 2 * 0.25 + nuts * 0.35 + nuas * 0.45 AS subtotal FROM nilai WHERE npm = '.$npm.') AS x');

        return view('nilai.nilaiMahasiswa', ['nilai' => $nilai, 'mahasiswa' => $mahasiswa, 'Nnilai' => $Nnilai]);
    }
}
