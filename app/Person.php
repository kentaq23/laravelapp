<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    public function scopeAgeGreaterThan($query, $n)
    {
       return $query->where('age','>=', $n);
    }
    
    public function scopeAgeLessThan($query, $n)
    {
       return $query->where('age', '<=', $n);
    }
}
