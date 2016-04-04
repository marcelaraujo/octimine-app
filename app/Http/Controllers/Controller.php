<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Validator;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

class Controller extends BaseController
{
    use DispatchesJobs, ValidatesRequests;

    /**
     * {@inheritdoc}
     */
    protected function formatValidationErrors(Validator $validator)
    {
        //print_r($validator->errors()->all());
        //exit;
        return $validator->errors()->all();
    }
}
