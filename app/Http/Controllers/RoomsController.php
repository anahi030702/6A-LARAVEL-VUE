<?php

namespace App\Http\Controllers;

use App\Models\Cinema;
use App\Models\Room;
use Illuminate\Http\Request;
use Inertia\Response;
use Inertia\Inertia;
use Illuminate\Support\Facades\Validator;

class RoomsController extends Controller
{
    public function index(): Response
    {
        $rooms = Room::with(['cinema'])->get();

        return Inertia::render('Rooms/ViewRooms',[
            'rooms' => $rooms
        ]);
    }

    public function getrooms($id)
    {
        $rooms = Room::where('cinema_id', $id)->with('cinema')->get();
    
        return Inertia::render('Rooms/ViewRooms', [
            'rooms' => $rooms
        ]);
    }

    public function form(): Response
    {
        return Inertia::render('Rooms/FormRoom');
    } 

    public function create(Request $request)
    {
        $validate = Validator::make($request->all(),[
            "name" => 'required|max:50|min:4',
            "capacity" => 'required|integer|max:250|min:50',
            "cinema_id" => 'required|integer',
        ]);

            if($validate->fails()){
                return back()->withErrors($validate)->withInput();
                // return $validate->errors();

            }else{
            $room = new Room();
            $room->name = $request->input('name');
            $room->capacity = $request->input('capacity');
            $room->cinema_id = $request->input('cinema_id');
            $room->save();   
            
            return to_route('rooms.index');
        }    
    
    }

    
    public function delete($id)
    {
        $room = Room::findOrFail($id);
        $room->delete();
    
        return to_route('rooms.index');
    }

    
    public function formedit($id): Response
    {
        $room = Room::findOrFail($id);

        return Inertia::render('Rooms/EditRoom',['room'=> $room]);
    } 

    public function update(Request $request){

        $validate = Validator::make($request->all(),[
            "name" => 'required|max:50|min:4',
            "capacity" => 'required|integer|max:250|min:50',
            "cinema_id" => 'required|integer',
        ]);

        $id= $request->input('id');
        $room = Room::findOrFail($id);


        if($validate->fails()){
        return back()->withErrors($validate)->withInput()->with('room', $room);
        // return $validate->errors();
        }else{
            $room->name = $request->input('name');
            $room->capacity = $request->input('capacity');
            $room->cinema_id = $request->input('cinema_id');
            $room->save();   
            
            return to_route('rooms.index');
        }

       

    }
}
