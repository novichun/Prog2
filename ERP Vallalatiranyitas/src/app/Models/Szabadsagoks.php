<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Szabadsagoks extends Model
{
    use HasFactory;
    protected $fillable = [
        'targy', 'leiras', 'kezdet', 'veg'
    ];
    public function users()
    {
    return $this->belongsToMany(User::class, 'user_szabadsagok');
    }
}
