<?php

namespace App\Http\Controllers;
use App\Models\Project;
use App\Models\Eszkozok;
use Illuminate\Http\Request;

class KirendelesController extends Controller
{
    public function __invoke(Request $request,Eszkozok $eszkozok)
    {


       

        $projects =Project::all();
        $szabad = Project::with('eszkozoks')->find(1);

        return view('user.kirendeles.index', compact('szabad', 'projects'));

    

        
    }
    public function kirendeles(Request $request, Eszkozok $eszkozok)
    {

        
     
        
        $eszkozok->projects()->sync([$request->input('projekt') => array(
            'eszkozok_id' => 18,
            'project_id' => $request->projekt,
        )]);

        return back();

    

        
    }
}
