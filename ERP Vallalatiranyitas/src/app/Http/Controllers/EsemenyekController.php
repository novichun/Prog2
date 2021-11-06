<?php

namespace App\Http\Controllers;

use App\Models\Esemenyek;

use Illuminate\Http\Request;

class EsemenyekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        $search = $request->get('search');
        $esemenyek = Esemenyek::where('cim', 'like', '%'.$search.'%')->paginate(10);
        return view('admin.esemenyek.index', ['esemenyek' => $esemenyek]);

        $esemenyek = Esemenyek::latest()->paginate(10)->with('cim');

    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.esemenyek.create');
        
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
            'cim' => 'required',
            'leiras' => 'required',
            'datum' => 'required',            
        ]);
        
        Esemenyek::create($request->all());
     
        return redirect()->route('admin.esemenyek.index')
                        ->with('success','Sikeresen létrehozta az eseményt.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $Task
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $Task
     * @return \Illuminate\Http\Response
     */
    public function edit(Esemenyek $esemenyek)
    {
        return view('admin.esemenyek.edit',compact('esemenyek'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $Task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Esemenyek $esemenyek)
    {
        $request->validate([
            'cim' => 'required',
            'leiras' => 'required',
            'datum' => 'required',  
        ]);
   
        $esemenyek->update($request->all());
    
        return redirect()->route('admin.esemenyek.index')
                        ->with('success','Esemény sikeresen frissítve!');
                    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $Task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Esemenyek $esemenyek)
    {
        $esemenyek->delete();
    
        return redirect()->route('admin.esemenyek.index')
                        ->with('success','Esemény sikeresen törölve!');
    }
}
