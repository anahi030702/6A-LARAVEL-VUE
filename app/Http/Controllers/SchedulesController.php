<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;
use Inertia\Response;
use Inertia\Inertia;
use Illuminate\Support\Facades\Validator;

class SchedulesController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Schedules/ViewSchedules',[
            'schedules' => Schedule::all()
        ]);
    }

    public function getSchedules()
    {
        $schedules = Schedule::all();
        return response()->json(['schedules' => $schedules], 200);
    }

    public function form(): Response
    {
        return Inertia::render('Schedules/FormSchedule');
    } 

    public function create(Request $request)
    {
        $validate = Validator::make($request->all(),[
            "start_time" => 'required|date_format:H:i:s',
            "end_time" => 'required|date_format:H:i:s',
        ]);

            if($validate->fails()){
                return back()->withErrors($validate)->withInput();
                // return $request->input('start_time');

            }else{
            $schedule = new Schedule();
            $schedule->start_time = $request->input('start_time');
            $schedule->end_time = $request->input('end_time');
            $schedule->save();   
            
            return to_route('schedules.index');
        }    
    
    }

    
    public function delete($id)
    {
        $movie = Schedule::findOrFail($id);
        $movie->delete();
    
        return to_route('schedules.index');
    }

    public function formedit($id): Response
    {
        $schedule = Schedule::findOrFail($id);

        return Inertia::render('Schedules/EditSchedule',['schedule'=> $schedule]);
    } 

    public function update(Request $request){

        $validate = Validator::make($request->all(),[
            "start_time" => 'required|date_format:H:i:s',
            "end_time" => 'required|date_format:H:i:s',
        ]);

        $id= $request->input('id');
        $schedule = Schedule::findOrFail($id);


        if($validate->fails()){
        return back()->withErrors($validate)->withInput()->with('schedule', $schedule);
        }else{
            $schedule->start_time = $request->input('start_time');
            $schedule->end_time = $request->input('end_time');
            $schedule->save();   
    
            return to_route('schedules.index');
        }

       

    }

}
