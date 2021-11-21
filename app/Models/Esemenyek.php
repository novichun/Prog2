<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;
class Esemenyek extends Model
{
    use HasFactory;
    protected $fillable = [
        'cim', 'leiras', 'datum'
    ];
    
}
