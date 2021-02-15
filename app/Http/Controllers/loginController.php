<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        $credenciales=$this->validate(request(),[
            'usu_ci' => 'required|string',
            'password' => 'required|string'
        ]);
        if (Auth::attempt($credenciales)) {
            return 'true';
        }
        return 'false';
    }
    public function logout()
    {
        Auth::logout();
        return 1;
    }
}
