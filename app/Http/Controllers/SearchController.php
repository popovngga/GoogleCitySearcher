<?php

namespace App\Http\Controllers;

use App\Requests\Location\SearchRequest;
use Illuminate\Validation\ValidationException;

class SearchController extends Controller
{
    public function search(SearchRequest $request)
    {
        if($request->validator->fails()) {
            return response()->json([
                'errors' => $request->validator->messages()->getMessages()
            ], 422);
        }
        dd($request->all());
    }
}
