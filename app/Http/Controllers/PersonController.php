<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function getData()
{
   return $this->id . ': ' . $this->name . ' (' . $this->age . ')';
}
}
