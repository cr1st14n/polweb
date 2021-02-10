<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function __construct()
    {
        // $this->middleware('guest')->except('logout');
    }
    public function login(Request $request  )
    {
        // return 321;
        $credenciales=$this->validate(request(),[
            'usu_ci' => 'required|string',
            'password' => 'required|string'
        ]);
        if (Auth::attempt($credenciales)) {
            return 'true';
        }
        return 'false';
    }
}
