<?php

namespace App\Http\Controllers;

use App\Models\Region;

class RegionController extends Controller
{
    public function index()
    {
        return response()->json(['message' => Region::all()], 200);
    }
}
