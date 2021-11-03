<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Task extends Model
{
    use HasFactory;
    protected $fillable = [
        'alkalmazott', 'projekt' , 'feladat', 'hatarido'
    ];
   
    public function projects(){
        return $this->belongsToMany('App\Models\Project');
    }
    public function users()
    {
    return $this->belongsToMany(User::class, 'user_task');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'alkalmazott');
    }
    
}
