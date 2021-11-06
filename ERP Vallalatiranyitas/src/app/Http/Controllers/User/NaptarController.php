<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Esemenyek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;

class NaptarController extends Controller
{
    public function __invoke(Request $request)
    {
       
      
         $esemenyek = Esemenyek::all();

            return view('user.naptar', compact('esemenyek'));
      
            
    }

    

}
