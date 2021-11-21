<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Munkaidok extends Model
{
    use HasFactory;
    protected $fillable = [
        'nap', 'mettol', 'meddig'
    ];
}