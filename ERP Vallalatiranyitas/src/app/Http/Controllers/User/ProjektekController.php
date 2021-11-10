<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Project;
use App\Models\Task;
use App\Models\Eszkozok;

class ProjektekController extends Controller
{
    public function __invoke(Request $request)
    {
        $projects = Project::latest()->paginate(10);
        $szabad = Project::find(1);

            $search = $request->get('search');
        $projects = Project::where('name', 'like', '%'.$search.'%')->paginate(10);
        return view('user.projektek', ['projects' => $projects, 'szabad' => $szabad]);
    }
  
    public function show($id, Project $project)
    {
       $feladatok = Project::with('tasks')->find($id);
       $tasks = Task::with('user', 'projects')->find($id);
        $project = Project::with('eszkozoks')->find($id);
        return view('user.projektek-show', compact('project', 'feladatok', 'tasks'));
    }

    public function vissza( Request $request)
    {
        
   
        $projects = Project::latest()->paginate(10);
        $szabad = Project::find(1);

       
        $search = $request->get('search');
        $projects = Project::where('name', 'like', '%'.$search.'%')->paginate(10);
        return view('user.projektek', ['projects' => $projects, 'szabad' => $szabad]);
    }
 
 

}
