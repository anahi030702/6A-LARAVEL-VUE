<?php

namespace App\Http\Controllers;

use App\Models\Screening;
use Illuminate\Http\Request;
use Inertia\Response;
use Inertia\Inertia;
use Illuminate\Support\Facades\Validator;

class ScreeningsController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Screenings/ViewScreenings',[
            'screenings' => Screening::all()
        ]);
    }
}
