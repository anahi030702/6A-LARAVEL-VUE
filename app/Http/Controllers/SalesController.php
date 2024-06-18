<?php

namespace App\Http\Controllers;

use App\Models\Sale;
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
        $validate = Validator::make($request->all(),[
            "seats" => 'required',
            "price" => 'required',
            "screening_id" => 'required',
        ]);

            if($validate->fails()){
                return back()->withErrors($validate)->withInput();
                // return $validate->errors();
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

    



}
