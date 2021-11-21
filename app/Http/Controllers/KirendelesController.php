<?php

namespace App\Http\Controllers;
use App\Models\Project;
use App\Models\Eszkozok;
use Illuminate\Http\Request;

class KirendelesController extends Controller
{
    public function __invoke(Request $request,Eszkozok $eszkozok)
    {

      

        $projects =Project::where('id', '!=', 1)->get();
        $szabad = Project::with('eszkozoks')->find(1);
        
        return view('user.kirendeles.index', compact('szabad', 'projects'));

    

        
    }
    public function kirendeles(Request $request, Eszkozok $eszkozok, $id)
    {
   
     

        $name = $request->input('projekt');


        Eszkozok::find($id)->projects()->sync([$name]);

      

        return back()->with('success','Sikeresen kirendelte az eszközt!');

        
        

        
    }
}
