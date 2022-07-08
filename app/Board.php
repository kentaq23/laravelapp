<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    // 新たにメソッドを追加
public function person()
{
   return $this->belongsTo('App\Person');
}

// 既にあるメソッドを修正
public function getData()
{
   return $this->id . ': ' . $this->title . ' (' 
      . $this->person->name . ')';
}
}
