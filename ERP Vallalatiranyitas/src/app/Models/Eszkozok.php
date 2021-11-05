<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eszkozok extends Model
{
    use HasFactory;
    protected $fillable = [
        'marka', 'eszkoz', 'mennyiseg'
    ];
    
}
