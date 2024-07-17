<?php

namespace App\Http\Controllers;

use App\Models\Cinema;
use App\Models\Room;
use App\Models\Sale;
use App\Models\Screening;
use Illuminate\Http\Request;
use Inertia\Response;
use Inertia\Inertia;
use Illuminate\Support\Facades\Validator;

class SalesController extends Controller
{
    public function index(): Response
    {
        $sales = Sale::with(['screening.room', 'screening.movie', 'screening.schedule'])->get();
    
        return Inertia::render('Sales/ViewSales', [
            'sales' => $sales
        ]);
    }

    public function form(): Response
    {
        return Inertia::render('Sales/FormSales');
    } 

    public function create(Request $request)
    {
        $validate = Validator::make($request->all(), [
            "seats" => 'required|integer|min:1',
            "price" => 'required|numeric|min:1',
            "screening_id" => 'required|exists:screenings,id',
        ]);
    
        $additionalValidate = Validator::make($request->all(), [
            "cinema_id" => 'required|exists:cinemas,id',
            "room_id" => 'required|exists:rooms,id'
        ]);

            
            if ($validate->fails() || $additionalValidate->fails()) {
            $errors = $validate->errors()->merge($additionalValidate->errors());
            return back()->withErrors($errors)->withInput();
            }else{

            $sale = new Sale();
            $sale->seats = $request->input('seats');
            $sale->price = $request->input('price');
            $sale->screening_id = $request->input('screening_id');
            $sale->save();   
            
            return to_route('sales.index');
        }    
    
    }

    public function delete($id)
    {
        $screening = Sale::findOrFail($id);
        $screening->delete();
    
        return to_route('sales.index');
    }

    public function formedit($id): Response
    {
        $sale = Sale::findOrFail($id);
        $screening = Screening::findOrFail($sale->screening_id);
        $room = Room::findOrFail($screening->room_id);
        $cinema_id = $room->cinema_id;
        $room_id = $screening->room_id;

        return Inertia::render('Sales/EditSales', [
            'sale' => $sale,
            'cinema_id' => $cinema_id,
            'room_id' => $room_id
        ]);
    }

    public function update(Request $request)
{
    $validate = Validator::make($request->all(), [
        "seats" => 'required|integer|min:1',
        "price" => 'required|numeric|min:1',
        "screening_id" => 'required|exists:screenings,id',
    ]);

    $additionalValidate = Validator::make($request->all(), [
        "cinema_id" => 'required|exists:cinemas,id',
        "room_id" => 'required|exists:rooms,id'
    ]);

    $id = $request->input('id');
    $sale = Sale::findOrFail($id);

    if ($validate->fails() || $additionalValidate->fails()) {
        $errors = $validate->errors()->merge($additionalValidate->errors());
        return back()->withErrors($errors)->withInput()->with('sale', $sale);
    } else {
        $sale->seats = $request->input('seats');
        $sale->price = $request->input('price');
        $sale->screening_id = $request->input('screening_id');
        $sale->save();     
        
        return to_route('sales.index');
    }
}




}
