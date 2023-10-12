<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DemoController extends Controller
{
    public function index()
    {
        $array = [
            [
                'name' => 'Bishawjit',
                'email' => 'b@gmail.com'
            ],
            [
                'name' => 'Joy',
                'email' => 'j@gmail.com'
            ]
        ];

        return response()->json([
            'msg' => 'Data Found',
            'data' => $array,
            'status' => true
        ], 200);
    }
}
