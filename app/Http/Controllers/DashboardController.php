<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use Helper;

class DashboardController extends Controller
{
    public function index()
    {
        if (!Session::get('nid')) {
            return redirect('/login');
        }

        // return checkSession();

        $mataKuliah = DB::table('mataKuliah')
                    ->join('dosen', 'matakuliah.nid', '=', 'dosen.nid')
                    ->where('mataKuliah.nid', session()->get('nid'))
                    ->get();
        $dosen = DB::table('dosen')
                ->where('nid', session()->get('nid'))
                ->first();
        return view('home.index', ['mataKuliah' => $mataKuliah, 'dosen' => $dosen]);
    }
}
