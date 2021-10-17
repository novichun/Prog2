<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jogok extends Model
{
    use HasFactory;

    public function feladatok(){
        return $this->belongsToMany('App\Models\User');
    }
    
    
}
