<?php

namespace App\Http\Controllers;

use App\Models\Location;

class AddressController extends Controller
{
    public function getAll()
    {
        $location = Location::all();
        $addresses = $location->map(function ($q) {
            return ['id' => $q->id, 'address' => $q->address];
        });
        return response()->json([
            'message' => $addresses
        ], 200);
    }

    public function getAddressById(int $id)
    {
        $location = Location::where('region_id', $id)->get();
        $addresses = $location->map(function ($q) {
            return ['id' => $q->id, 'address' => $q->address];
        });
        return response()->json([
            'message' => $addresses
        ], 200);
    }
}
