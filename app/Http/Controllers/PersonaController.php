<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;

class PersonaController extends Controller
{
    public function index(){
        return view('persona.index', ["personas" => Persona::all()]);
    }


    public function create(Request $request){

        $nombre = $request->input('nombre');
        $ap_paterno = $request->input('ap_paterno');
        $ap_materno = $request->input('ap_materno');

        $persona = new Persona();
        $persona->nombre = $nombre;
        $persona->ap_paterno = $ap_paterno;
        $persona->ap_materno = $ap_materno;
        $persona->save();

        return redirect('/personas')->with('status', '¡REGISTRO EXITOSO!');

    }

    public function formcreate(){
        return view('persona.formcreate');
    }

    public function viewdata(Request $request){
        $id = $request->input('id');
        $persona = Persona::findOrFail($id);

        return view('persona.viewdata', 
            ["nombre"=>$persona->nombre, "ap_paterno"=>$persona->ap_paterno, "ap_materno"=>$persona->ap_materno, "id"=>$id]);
    }

    public function viewupdate(Request $request){
        $id = $request->input('id');
        $persona = Persona::findOrFail($id);
       
        return view('persona.updatedata',
            ["nombre"=>$persona->nombre, "ap_paterno"=>$persona->ap_paterno, "ap_materno"=>$persona->ap_materno, "id"=>$id]);
    }

    public function update(Request $request){

        $id = $request->input('id');
        $nombre = $request->input('nombre');
        $ap_paterno = $request->input('ap_paterno');
        $ap_materno = $request->input('ap_materno');

        $persona = Persona::findOrFail($id);

        $persona->nombre = $nombre;
        $persona->ap_paterno = $ap_paterno;
        $persona->ap_materno = $ap_materno;

        $persona->save();

        return redirect('/personas/viewdata?id=' . $persona->id)
        ->with('status', '¡ACTUALIZACION EXITOSA!');

    }

    public function delete(Request $request){
        $id = $request->input('id');
        $persona = Persona::findOrFail($id);
        $persona->delete();

        return redirect('/personas')->with('status', '¡PERSONA BORRADA EXITOSAMENTE!');

    }
}
