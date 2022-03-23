<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class NilaiController extends Controller
{
    public function showNilai($kd_matkul)
    {
        if (!Session::get('nid')) {
            return redirect('/login');
        }

        $mataKuliah = DB::table('mataKuliah')->where('kd_matkul', $kd_matkul)->first();

        $nilai = DB::table('nilai')
        ->join('mahasiswa', 'nilai.npm', '=', 'mahasiswa.npm')
        ->where('kd_matkul', $kd_matkul)
        ->orderBy('nilai.npm', 'asc')
        ->get();

        $mahasiswa = DB::table('mahasiswa')
        ->whereNotIn('npm', function ($query) use ($kd_matkul){
            $query->select('npm')->from('nilai')->where('kd_matkul', '=', $kd_matkul);
        })->get();

        return view('nilai.index', ['nilai' => $nilai, 'mataKuliah' => $mataKuliah, 'mahasiswa' => $mahasiswa]);
    }

    public function tambahNilai(Request $request, $kd_matkul)
    {
        DB::table('nilai')->insert([
            'npm' => $request->npm,
            'kd_matkul' => $kd_matkul,
            'ntugas' => $request->tugas,
            'nquiz' => $request->kuis,
            'nuts' => $request->uts,
            'nuas' => $request->uas,
        ]);

        return redirect()->back();
    }

    public function hapusNilai($id_nilai)
    {
        DB::table('nilai')->where('id_nilai', $id_nilai)->delete();

        return redirect()->back();
    }

    
}
