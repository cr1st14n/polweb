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
    public function store(Request $request)
    {
        $usu= new User();
        $usu->usu_ci=$request->input('ci');
        $usu->usu_nombre=$request->input('nombre');
        $usu->usu_appaterno=$request->input('apellido');
        $usu->email=$request->input('mail');
        $usu->password=encrypt('12345');
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
    public function edit($id)
    {
        return User::where('id',$id)->first();
    }
    public function update(Request $request)
    {
        $new=User::find($request->input('id'));
        $new->usu_ci=$request->input('');
        $new->usu_ci=$request->input('');
        $new->usu_ci=$request->input('');
        $new->usu_ci=$request->input('');
        return $res=$new->save();
        // return User::where('id',$request->input('id'))->update([

        // ]);
        $a=100;
        $ca=1000;
    }
}
