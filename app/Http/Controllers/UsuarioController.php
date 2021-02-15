<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios=User::get();
        return view('user.index')->with('users',$usuarios);
    }
    public function store(Request $request)
    {
        $usu= new User();
        $usu->usu_ci=$request->input('ci');
        $usu->usu_nombre=$request->input('nombre');
        $usu->usu_appaterno=$request->input('apellido');
        $usu->email=$request->input('mail');
        $usu->password=bcrypt('12345');
        return $res=$usu->save();
        
    }
    public function listA()
    {
        return User::orderBy('created_at','asc')->get();
    }
    public function delete(Request $request)
    {
        return User::where('id',$request->input('id_usu'))->delete();
    }
    public function edit(Request $request)
    {
        return User::where('id',$request->input('usu'))->first();
    }
    public function update($idusu ,Request $request )
    {
        $new=User::find($idusu);
        $new->usu_ci=$request->input('ci');
        $new->usu_nombre=$request->input('nombre');
        $new->usu_appaterno=$request->input('apellido');
        $new->email=$request->input('mail');
        return $res=$new->save();
        // return User::where('id',$request->input('id'))->update([

        // ]);
        $a=100;
    }
}
