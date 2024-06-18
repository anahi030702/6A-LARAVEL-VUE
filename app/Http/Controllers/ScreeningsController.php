<?php

namespace App\Http\Controllers;

use App\Models\Cinema;
use App\Models\Movie;
use App\Models\Room;
use App\Models\Schedule;
use App\Models\Screening;
use Illuminate\Http\Request;
use Inertia\Response;
use Inertia\Inertia;
use Illuminate\Support\Facades\Validator;

class ScreeningsController extends Controller
{
    public function index(): Response
    {
        $screenings = Screening::with(['room', 'movie', 'schedule'])->get();


        return Inertia::render('Screenings/ViewScreenings', [
            'screenings' => $screenings
        ]);
    }

    public function getscreenings($id)
    {
        $screenings = Screening::where('room_id', $id)->with('room', 'movie', 'schedule')->get();
    
        return Inertia::render('Screenings/ViewScreenings', [
            'screenings' => $screenings
        ]);
    }
    public function getScreeningsByRoom(Room $room)
    {
        $screenings = $room->screenings()->with(['movie', 'schedule'])->get();
        return response()->json(['screenings' => $screenings], 200);
    }
    

    

    public function form(): Response
    {
        return Inertia::render('Screenings/FormScreenings');
    } 

    public function create(Request $request)
    {
        $validate = Validator::make($request->all(),[
            "room_id" => 'required',
            "movie_id" => 'required',
            "schedule_id" => 'required',
            "date" => 'required|date_format:Y-m-d',
        ]);

            if($validate->fails()){
                return back()->withErrors($validate)->withInput();
                // return $validate->errors();
            }else{
            $screening = new Screening();
            $screening->room_id = $request->input('room_id');
            $screening->movie_id = $request->input('movie_id');
            $screening->schedule_id = $request->input('schedule_id');
            $screening->date = $request->input('date');
            $screening->save();   
            
            return to_route('screenings.index');
        }    
    
    }

        
    public function delete($id)
    {
        $screening = Screening::findOrFail($id);
        $screening->delete();
    
        return to_route('screenings.index');
    }

    public function formedit($id): Response
    {
        $screening = Screening::findOrFail($id);
        $room = Room::findOrFail($screening->room_id);
        $cinema_id = $room->cinema_id;

        return Inertia::render('Screenings/EditScreening', [
            'screening' => $screening,
            'cinema_id' => $cinema_id
        ]);
    }

    public function update(Request $request){

        $validate = Validator::make($request->all(),[
            "room_id" => 'required',
            "movie_id" => 'required',
            "schedule_id" => 'required',
            "date" => 'required|date_format:Y-m-d',
        ]);

        $id= $request->input('id');
        $screening = Screening::findOrFail($id);


        if($validate->fails()){
            return back()->withErrors($validate)->withInput()->with('screening', $screening);
            // return "no paso";
        }else{
            $screening->room_id = $request->input('room_id');
            $screening->movie_id = $request->input('movie_id');
            $screening->schedule_id = $request->input('schedule_id');
            $screening->date = $request->input('date');
            $screening->save();   
        
            // return "si paso";
            return to_route('screenings.index');
        }

       

    }
}
