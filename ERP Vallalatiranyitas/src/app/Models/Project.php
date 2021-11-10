<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Eszkozok;
class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'felelos'
    ];
    public function tasks(){
        return $this->belongsToMany('App\Models\Task');
    }
    public function documents(){
        return $this->belongsToMany('App\Models\Documents');
    }
    public function eszkozoks()
{
  return $this->belongsToMany(Eszkozok::class, 'eszkoz_projekt');
}
}
