<?php

namespace App\Http\Controllers;

use App\Helpers\Services\LocationServiceInterface;
use App\Requests\Location\SearchRequest;

class SearchController extends Controller
{
    public $service;

    public function __construct(LocationServiceInterface $service)
    {
        $this->service = $service;
    }

    public function search(SearchRequest $request)
    {
        if($request->validator->fails()) {
            return response()->json([
                'errors' => $request->validator->messages()->getMessages()
            ], 422);
        }
        $attributes = $request->all();
        $location = $this->service->searchAtDatabase($attributes);
        if(empty($location)) {
            $location = $this->service->searchAtGoogle($attributes);
        }
        return response()->json(['message' => $location], 200);
    }
}
