<?php

namespace App\Http\Controllers;

use App\Models\Munkaidok;
use Carbon\Carbon;
use Illuminate\Http\Request;


class MunkaidokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $munkaidok = Munkaidok::where('user', '=', auth()->user()->name)->get();
        $max = Carbon::now()->toDateString();
        $min = Carbon::now()->subWeek()->toDateString();
        return view('user.munkaido.index', compact('min', 'max', 'munkaidok'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $max = Carbon::now()->toDateString();
        $min = Carbon::now()->subWeek()->toDateString();
        return view('user.munkaido.create', compact('min', 'max'));
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
            'nap' => 'required',
            'mettol' => 'required',
            'meddig' => 'required',             
        ]);
        
        $munkaido = new Munkaidok();

        $munkaido->user = auth()->user()->name;
        $munkaido->nap = $request->nap;
        $munkaido->mettol = $request->mettol;
        $munkaido->meddig = $request->meddig;
        

        $munkaido->save();


        return redirect()->route('user.munkaido.index')
                        ->with('success','Sikeresen lejelentette a munkaidejét!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Munkaidok  $munkaidok
     * @return \Illuminate\Http\Response
     */
    public function show(Munkaidok $munkaidok)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Munkaidok  $munkaidok
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Munkaidok $munkaido)
    {
        
        $max = Carbon::now()->toDateString();
        $min = Carbon::now()->subWeek()->toDateString();
        $data=Munkaidok::find($id);
        return view('user.munkaido.edit', compact('data', 'max', 'min'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Munkaidok  $munkaidok
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $szerkesztes = Munkaidok::find($id);
        $szerkesztes->mettol = $request->mettol;
        $szerkesztes->meddig = $request->meddig;
        $szerkesztes->save();

        return redirect()->route('user.munkaido.index')
        ->with('success','Sikeresen szerkesztette a munkaidejét!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Munkaidok  $munkaidok
     * @return \Illuminate\Http\Response
     */
    public function destroy(Munkaidok $munkaidok)
    {
        //
    }
}
