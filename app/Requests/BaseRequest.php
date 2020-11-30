<?php

namespace App\Requests;

use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

abstract class BaseRequest
{
    public $validator;
    public $request;

    public function __construct(Request $request, Validator $validator)
    {
        $this->validator = $validator;
        $this->request = $request;
    }

    public function all()
    {
        return $this->request->all();
    }
}
