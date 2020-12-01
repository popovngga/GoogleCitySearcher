<?php

namespace App\Http\Controllers;

use App\Models\City;

class CityController extends Controller
{
    public function index()
    {
        return response()->json(['message' => City::all()], 200);
    }
}
