<?php

namespace App\Http\Controllers;

use App\Models\Eszkozok;
use App\Models\Project;
use Illuminate\Http\Request;

class eszkozokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $eszkozok = Eszkozok::where('eszkoz', 'like', '%'.$search.'%')->paginate(10);
        return view('admin.eszkozok.index', ['eszkozok' => $eszkozok]);

        $eszkozok = Eszkozok::latest()->paginate(10)->with('name');

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.eszkozok.create');
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
            'marka' => 'required',
            'eszkoz' => 'required',
        ]);
    
       $eszkoz = Eszkozok::create($request->all());
        $eszkoz->projects()->sync(1);
        return redirect()->route('admin.eszkozok.index')
                        ->with('success','Sikeresen létrehozta az eszközt.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\eszkozok  $eszkozok
     * @return \Illuminate\Http\Response
     */
    public function show(Eszkozok $eszkozok)
    {
        return view('admin.eszkozok.show',compact('eszkozok'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\eszkozok  $eszkozok
     * @return \Illuminate\Http\Response
     */
    public function edit(Eszkozok $eszkozok)
    {
        return view('admin.eszkozok.edit',compact('eszkozok'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\eszkozok  $eszkozok
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Eszkozok $eszkozok)
    {
        $request->validate([
            'marka' => 'required',
            'eszkoz' => 'required',
        ]);
    
        $eszkozok->update($request->all());
    
        return redirect()->route('admin.eszkozok.index')
                        ->with('success','Eszköz sikeresen frissítve!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\eszkozok  $eszkozok
     * @return \Illuminate\Http\Response
     */
    public function destroy(Eszkozok $eszkozok)
    {
        $eszkozok->delete();
    
        return redirect()->route('admin.eszkozok.index')
                        ->with('success','Eszköz sikeresen törölve!');
    }

    public function vissza($id, Request $request)
    {
        Eszkozok::find($id)->projects()->sync([1]);
    
       
        $projects = Project::latest()->paginate(10);
        $szabad = Project::find(1);

       
        $search = $request->get('search');
        $projects = Project::where('name', 'like', '%'.$search.'%')->paginate(10);
        return view('user.projektek', ['projects' => $projects, 'szabad' => $szabad]);
    }
    

}