<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;
class Eszkozok extends Model
{
    use HasFactory;
    protected $fillable = [
        'marka', 'eszkoz'
    ];
    public function projects()
    {
      return $this->belongsToMany(Project::class, 'eszkoz_projekt',);
    }
    public function project()
    {
        return $this->belongsTo(Project::class, 'name');
    }
}
