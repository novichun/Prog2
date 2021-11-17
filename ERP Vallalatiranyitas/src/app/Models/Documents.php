<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documents extends Model
{
    protected $fillable=['title','description','file'];

    public function projects(){
        return $this->belongsToMany('App\Models\Project');
    }
}
