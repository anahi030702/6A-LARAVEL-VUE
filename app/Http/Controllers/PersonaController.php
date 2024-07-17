<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;
use Illuminate\Support\Facades\Validator;


class PersonaController extends Controller
{
    public function index(){
        return view('persona.index', ["personas" => Persona::all()]);
    }


    public function create(Request $request){

        $validate = Validator::make($request->all(),[
            "nombre" => 'required|max:30|min:3|alpha',
            "ap_paterno" => 'required|max:50|min:4|alpha',
            "ap_materno" => 'required|max:50|min:4|alpha'
        ]);

        if($validate->fails()){
            return back()->withErrors($validate)->withInput();
        }else{
            $persona = new Persona();
            $persona->nombre = $request->nombre;
            $persona->ap_paterno = $request->ap_paterno;
            $persona->ap_materno = $request->ap_materno;
            $persona->save();
            return redirect('/inicio')->with('status', '¡REGISTRO EXITOSO!');
        }

    }

    public function formcreate(){
        return view('persona.formcreate');
    }

    // public function viewdata($id){
    //     $persona = Persona::findOrFail($id);

    //     return view('persona.viewdata', 
    //         ["nombre"=>$persona->nombre, "ap_paterno"=>$persona->ap_paterno, "ap_materno"=>$persona->ap_materno, "id"=>$id]);
    // }

    public function viewupdate($id){
        $persona = Persona::findOrFail($id);
       
        return view('persona.updatedata',
            ["nombre"=>$persona->nombre, "ap_paterno"=>$persona->ap_paterno, "ap_materno"=>$persona->ap_materno, "id"=>$id]);
    }

    public function update(Request $request){

        $validate = Validator::make($request->all(),[
            "nombre" => 'required|max:30|min:3|alpha',
            "ap_paterno" => 'required|max:50|min:4|alpha',
            "ap_materno" => 'required|max:50|min:4|alpha'
        ]);

        if($validate->fails()){
            return back()->withErrors($validate)->withInput();
        }else{
            $persona = Persona::findOrFail($request->id);

            $persona->nombre = $request->nombre;
            $persona->ap_paterno = $request->ap_paterno;
            $persona->ap_materno = $request->ap_materno;

            $persona->save();

            return redirect('/inicio');
        }
    }

    public function delete($id){
        $persona = Persona::findOrFail($id);
        $persona->delete();

        return redirect('/inicio');
    }
}
