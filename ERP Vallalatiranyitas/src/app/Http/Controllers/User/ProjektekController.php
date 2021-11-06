<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Project;
use App\Models\Eszkozok;

class ProjektekController extends Controller
{
    public function __invoke(Request $request)
    {
        $projects = Project::latest()->paginate(10);
     


            $search = $request->get('search');
        $projects = Project::where('name', 'like', '%'.$search.'%')->paginate(10);
        return view('user.projektek', ['projects' => $projects]);
    }
  
    public function show($id, Project $project)
    {
        $project = Project::with('eszkozoks')->find($id);
        return view('user.projektek-show', compact('project'));
    }
 

}
