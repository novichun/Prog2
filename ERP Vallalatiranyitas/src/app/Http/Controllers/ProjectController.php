<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use Illuminate\Http\Request;
use View;


class ProjectController extends Controller
{
    /**
        * Display a listing of the resource.
        *
        * @return Response
        */
        public function index()
        {
            // get all the sharks
            $projects = Projects::all();
    
            // load the view and pass the sharks
            return View::make('admin.project.index')
                ->with('projects', $projects);
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('admin.project.create');
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
            'name' => 'required',
            'felelos' => 'required',
        ]);
    
        Projects::create($request->all());
     
        return redirect()->route('admin.project.index')
                        ->with('success','Post created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Projects $projects)
    {
        return view('admin.project.edit',compact('projects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Projects $projects)
    {
        $request->validate([
            'name' => 'required',
            'felelos' => 'required',
        ]);
    
        $projects->update($request->all());
    
        return redirect()->route('admin.project.index')
                        ->with('success','Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Projects $projects)
    {
        //
    }
}
