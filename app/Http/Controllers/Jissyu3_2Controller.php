<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Jissyu3_2Controller extends Controller
{
    public function index()
    {
        $data = [
            'msg'=>'___(5)___',
        ];
        return view('___(6)___', $data);
    }

    public function post(Request $request)
    {
        $data = [
            'name'=>$request->name,
            ___(7)___,
            ___(8)___
        ];
        return view('___(9)___', ___(10)___);
    }

}
