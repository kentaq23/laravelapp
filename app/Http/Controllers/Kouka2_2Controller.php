<?php

namespace App\Http\Controllers;

use App\___(1)___;
use Illuminate\Http\Request;

class Kouka2_2Controller extends Controller
{
    public function index()
    {
        $items = ___(2)___;
        $param = ['input' => '','items' => $items];
        return view('kouka2_2.index', $param);
    }

    public function find(Request $request)
    {
        //where()メソッドを利用すること。
        $item = Person::where('id',$request->id)->first();
        return view('kouka2_2.show', ['item' => $item]);
    }

    public function show(Request $request)
    {
        //where()メソッドを利用すること。
        $item = ___(4)___;
        return view('kouka2_2.show', ['item' => $item]);
    }

    public function add()
    {
        return view('kouka2_2.add');
    }

    public function create(Request $request)
    {
        $this->validate(___(5)___);
        $restdata = new Restdata;
        $form = $request->all();
        unset($form['_token']);
        $restdata->___(6)___;
        return redirect('/kouka2_2');
    }
    public function edit(Request $request)
    {
        $item = ___(7)___;
        return view('kouka2_2.edit', ['item' => $item]);
    }

    public function update(Request $request)
    {
        $this->validate(___(8)___);
        $restdata = Restdata::find($request->id);
        $form = $request->all();
        unset($form['_token']);
        $restdata->___(9)___;
        return redirect('/kouka2_2');
    }

    public function del(Request $request)
    {
        $item = ___(10)___;
        return view('kouka2_2.del', ['item' => $item]);
    }

    public function remove(Request $request)
    {
        Restdata::___(11)___;
        return redirect('/kouka2_2');
    }
}
