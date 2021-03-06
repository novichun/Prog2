<?php

namespace App\Http\Controllers;
use App\Models\Documents;
use Illuminate\Http\Request;
use App\Models\Project;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $file=Documents::all();
        return view('user.dokumentumok.index', compact('file'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
        return view('user.dokumentumok.create', [
            'projects' => Project::all(),
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


  
        $documents=Documents::create();
        if($request->file('file')){
            $file=$request->file('file');
            $filename=$file->getClientOriginalName();
            $request->file->move('storage/', $filename);
            $documents->file= $filename;

        }
        $documents->title=$request->title;
        $documents->description=$request->description;
        $documents->projects()->sync($request->projekt);
        $documents->save();

        return redirect('user/dokumentumok.index');
        

        


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Documents::find($id);
        return view('user.dokumentumok.reszletek', compact('data'));
    }
    public function download($file){
        return response()->download('storage/'.$file);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
