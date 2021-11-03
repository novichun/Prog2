<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $tasks = Task::with('user')->latest()->paginate(10);

    return view('admin.tasks.index',compact('tasks'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tasks.create', [
            'users' => User::all(),
            'projects' => Project::all()
        ]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'alkalmazott' => 'required',
            'projekt' => 'required',
            'feladat' => 'required',
            'hatarido' => 'required',
            
        ]);
        
        $task = Task::create($request->all());
        $task->users()->sync($request->alkalmazott);

        return redirect()->route('admin.tasks.index')
                        ->with('success','Feladat sikeresen kiosztva!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $Task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $Task)
    {
        return view('admin.tasks.show',compact('Task'), ['task' => $Task]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $Task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $Task)
    {
        return view('admin.tasks.edit', [
            'task' => $Task,
            'users' => User::all(),
            'projects' => Project::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $Task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $Task)
    {
        $request->validate([
            'alkalmazott' => 'required',
            'projekt' => 'required',
            'feladat' => 'required',
            'hatarido' => 'required',
        ]);
   
        $Task->update($request->all());
        $Task->users()->sync($request->input('alkalmazott'));
    
        return redirect()->route('admin.tasks.index')
                        ->with('success','Feladat sikeresen frissitve!');
                    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $Task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $Task)
    {
        $Task->delete();
    
        return redirect()->route('admin.tasks.index')
                        ->with('success','Feladat sikeresen törölve!');
    }
}
