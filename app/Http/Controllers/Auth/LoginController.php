<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function _construct(){
        $this->middleware(['guest']);
    }

    public function index()
    {
        return view('auth.login');


    }

    public function store(Request $request){

        $this->validate($request, [
            'email'=>'required|email',
            'password'=>'required',
        ]);
       if ( !auth()->attempt($request->only('email','password'), $request->remember)){
           return back()->with('status', 'Pogresni podaci, ponovite unos.');
       }
        return redirect()->route('dashboard');
    }
}
