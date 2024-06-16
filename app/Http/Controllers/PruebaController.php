<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Support\Facades\Validator;

class PruebaController extends Controller
{
    public function prueba(): Response
    {
        return Inertia::render('prueba', [
            'user' => Persona::findOrFail(7),
            'edad' => 21
        ]);
    }

    public function personas(): Response
    {
        return Inertia::render('Personas/VerPersonas',[
            'personas' => Persona::all()
        ]);
    }

    public function form(): Response
    {
        return Inertia::render('Personas/formPersona');
    }    

    public function create(Request $request)
    {
        $validate = Validator::make($request->all(),[
            "nombre" => 'required|max:30|min:3|alpha',
            "ap_paterno" => 'required|max:50|min:4|alpha',
            "ap_materno" => 'required|max:50|min:4|alpha'
        ]);

            if($validate->fails()){
                return back()->withErrors($validate)->withInput();
            }else{
            $persona = new Persona();
            $persona->nombre = $request->input('nombre');
            $persona->ap_paterno = $request->input('ap_paterno');
            $persona->ap_materno = $request->input('ap_materno');
            $persona->save();   

            return to_route('personas.inicio');
            }
        
        
        
    
    }

    public function borrar($id)
    {
        $persona = Persona::findOrFail($id);
        $persona->delete();
    
        return to_route('personas.inicio');
    }

    public function formedit($id): Response
    {
        $persona = Persona::findOrFail($id);

        return Inertia::render('Personas/EditPersona',['persona'=> $persona]);
    } 

    public function update(Request $request){

        $validate = Validator::make($request->all(),[
            "nombre" => 'required|max:30|min:3|alpha',
            "ap_paterno" => 'required|max:50|min:4|alpha',
            "ap_materno" => 'required|max:50|min:4|alpha'
        ]);

        $id= $request->input('id');
        $persona = Persona::findOrFail($id);

        if($validate->fails()){
        return back()->withErrors($validate)->withInput()->with('persona', $persona);
            // return Inertia::render('Personas/FormEdit',['persona' => $persona]);
        }else{
            $persona->nombre = $request->input('nombre');
            $persona->ap_paterno = $request->input('ap_paterno');
            $persona->ap_materno = $request->input('ap_materno');
    
            $persona->save();
    
            return to_route('personas.inicio');
        }

       

    }
    
}
