<?php

namespace App\Http\Controllers;

use App\Models\Massages;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MassagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $uzenetek = Massages::where('fogado', '=', auth()->user()->name)->get();
        $users = User::where('name', '!=', auth()->user()->name)->get();
        return view('user.massages.index', compact('users', 'uzenetek'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $users = User::where('name', '!=', auth()->user()->name)->get();
        return view('user.massages.create', compact('users'));
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
            'cimzett' => 'required',
            'targy' => 'required',
            'uzenet' => 'required',          
        ]);
        
        $uzenet = new Massages();

        $uzenet->kuldo = auth()->user()->name;
        $uzenet->fogado = $request->cimzett;
        $uzenet->targy = $request->targy;
        $uzenet->uzenet = $request->uzenet;
        

        $uzenet->save();

        return redirect()->route('user.massages.index')
        ->with('success','Sikeresen elküldte az üzenetet!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Massages  $massages
     * @return \Illuminate\Http\Response
     */
    public function show(Massages $massages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Massages  $massages
     * @return \Illuminate\Http\Response
     */
    public function edit(Massages $massages)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Massages  $massages
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Massages $massages)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Massages  $massages
     * @return \Illuminate\Http\Response
     */
    public function destroy(Massages $massages)
    {
        //
    }
}
