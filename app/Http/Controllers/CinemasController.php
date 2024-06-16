<?php

namespace App\Http\Controllers;

use App\Models\Cinema;
use Illuminate\Http\Request;
use Inertia\Response;
use Inertia\Inertia;
use Illuminate\Support\Facades\Validator;

class CinemasController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Cinemas/ViewCinemas',[
            'cinemas' => Cinema::all()
        ]);
    }

    public function form(): Response
    {
        return Inertia::render('Cinemas/FormCinema');
    } 

    public function create(Request $request)
    {
        $validate = Validator::make($request->all(),[
            "name" => 'required|max:50|min:10',
            "address" => 'required|max:150|min:20',
            "city" => 'required|max:50|min:5',
            "phone" => 'required|max:10|min:10',
        ]);

            if($validate->fails()){
                return back()->withErrors($validate)->withInput();
                // return $validate->errors();

            }else{
            $cinema = new Cinema();
            $cinema->name = $request->input('name');
            $cinema->address = $request->input('address');
            $cinema->city = $request->input('city');
            $cinema->phone = $request->input('phone');
            $cinema->save();   
            
            return to_route('cinemas.index');
        }    
    
    }

    public function delete($id)
    {
        $cinema = Cinema::findOrFail($id);
        $cinema->delete();
    
        return to_route('cinemas.index');
    }

    public function formedit($id): Response
    {
        $cinema = Cinema::findOrFail($id);

        return Inertia::render('Cinemas/EditCinema',['cinema'=> $cinema]);
    } 

    public function update(Request $request){

        $validate = Validator::make($request->all(),[
            "name" => 'required|max:50|min:10',
            "address" => 'required|max:150|min:20',
            "city" => 'required|max:50|min:5',
            "phone" => 'required|max:10|min:10',
        ]);

        $id= $request->input('id');
        $cinema = Cinema::findOrFail($id);


        if($validate->fails()){
        return back()->withErrors($validate)->withInput()->with('cinema', $cinema);
        // return $validate->errors();
        }else{
            $cinema->name = $request->input('name');
            $cinema->address = $request->input('address');
            $cinema->city = $request->input('city');
            $cinema->phone = $request->input('phone');
            $cinema->save();     
            
            return to_route('cinemas.index');
        }

       

    }
}
