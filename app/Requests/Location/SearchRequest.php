<?php

namespace App\Requests\Location;

use App\Requests\BaseRequest;
use Illuminate\Http\Request;
use Validator;

class SearchRequest extends BaseRequest
{
    public function __construct(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'longitude' => 'required|numeric|between:-180.000000,180.000000',
            'latitude'  => 'required|numeric|between:-90.000000,90.000000',
        ]);
        parent::__construct($request, $validator);
    }
}
