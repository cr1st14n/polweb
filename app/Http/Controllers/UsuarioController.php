<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios=User::get();
        return view('user.index')->with('users',$usuarios);
    }
}
