<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    public function index()
    {
        return view('login.index');
    }

    public function authenticate(Request $request)
    {
        $user = DB::table('dosen')->where('nid', $request->nid)->first();
        if (!$user) {
            dd('1');
            return back()->with('loginError', 'Login failed ');
        }

        if (!Hash::check($request->password, $user->password)) {
            dd('2');
            return back()->with('loginError', 'Login failed ');
        }
        $request->session()->put('nid', $request->nid);
        $request->session()->regenerate();
        return redirect()->intended('/home');
        
    }
}
