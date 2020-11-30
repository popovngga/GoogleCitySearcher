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
            'title' => 'required|max:255',
            'body' => 'required',
        ]);
        parent::__construct($request, $validator);
    }
}
