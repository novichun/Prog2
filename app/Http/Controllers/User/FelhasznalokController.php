<?php

namespace App\Http\Controllers\User;
use App\Models\Felhasznalok;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FelhasznalokController extends Controller
{
    public function __invoke()
    
    {
        $users = User::all();
        
        return view('user.felhasznalok.felhasznalok')->with('users', $users);
    }

  
}
