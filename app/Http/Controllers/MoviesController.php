<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Inertia\Response;
use Inertia\Inertia;
use Illuminate\Support\Facades\Validator;


class MoviesController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Movies/ViewMovies',[
            'movies' => Movie::all()
        ]);
    }

    public function form(): Response
    {
        return Inertia::render('Movies/FormMovie');
    } 

    public function create(Request $request)
    {
        $validate = Validator::make($request->all(),[
            "title" => 'required|max:50|min:2',
            "director" => 'required|max:50|min:3',
            "gender" => 'required|max:50|min:3',
            "duration" => 'required|integer|max:250|min:90',
            "classification" => 'required|max:10'
        ]);

            if($validate->fails()){
                return back()->withErrors($validate)->withInput();
                // return $validate->errors();

            }else{
            $movie = new Movie();
            $movie->title = $request->input('title');
            $movie->director = $request->input('director');
            $movie->gender = $request->input('gender');
            $movie->duration = $request->input('duration');
            $movie->classification = $request->input('classification');
            $movie->save();   
            
            return to_route('movies.index');
        }    
    
    }

    public function delete($id)
    {
        $movie = Movie::findOrFail($id);
        $movie->delete();
    
        return to_route('movies.index');
    }

    public function formedit($id): Response
    {
        $movie = Movie::findOrFail($id);

        return Inertia::render('Movies/EditMovie',['movie'=> $movie]);
    } 

    public function update(Request $request){

        $validate = Validator::make($request->all(),[
            "title" => 'required|max:50|min:2',
            "director" => 'required|max:50|min:3',
            "gender" => 'required|max:50|min:3',
            "duration" => 'required|integer|max:250|min:90',
            "classification" => 'required|max:10'
        ]);

        $id= $request->input('id');
        $movie = Movie::findOrFail($id);


        if($validate->fails()){
        return back()->withErrors($validate)->withInput()->with('movie', $movie);
        // return $validate->errors();
        }else{
            $movie->title = $request->input('title');
            $movie->director = $request->input('director');
            $movie->gender = $request->input('gender');
            $movie->duration = $request->input('duration');
            $movie->classification = $request->input('classification');
            $movie->save();   
            
            return to_route('movies.index');
        }

       

    }
    
}
