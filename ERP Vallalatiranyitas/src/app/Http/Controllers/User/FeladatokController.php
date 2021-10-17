<?php

namespace App\Http\Controllers\User;
use App\Models\Feladatok;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FeladatokController extends Controller
{
    public function __invoke()
    {
        return view('user.feladatok');
    }

  
}
