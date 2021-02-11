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
        $idUsu= $request->input('nombre');
        $idUsu= $request->input('app');
        $idUsu= $request->input('direccion');
        User::where('id_usu',$idUsu)->update(['usu_ci'=>$request->input('usu_ci')]);
        $r=User new();
        $r->usu_ci=$request->input('carnet');
        $r->nombre=$request->input('nombre');
        $r->app=$request->input('app');
        $r->apm=$request->input('apm');
        $resp=$r->save();
        return $resp;

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
    public function logout()
    {
        Auth::logout();
        return 1;
    }
}
