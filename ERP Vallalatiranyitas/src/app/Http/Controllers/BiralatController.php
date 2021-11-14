<?php

namespace App\Http\Controllers;
use App\Models\Szabadsagoks;
use Illuminate\Http\Request;

class BiralatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $osszes=Szabadsagoks::all();

        $fuggok=Szabadsagoks::with('users')->where('biralat', '=', 0)->get();

        return view('admin.biralat.index',compact('osszes', 'fuggok'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function elfogad($id)
    {
        Szabadsagoks::where('id', $id)->update(['biralat' => 1]);;
        return redirect('admin/biralat.index')->with('success','Szabadságkérelem sikeresen elfogadva!');
    }
    public function elutasit($id)
    {   
        
        Szabadsagoks::where('id', $id)->update(['biralat' => 2]);;
        return redirect('admin/biralat.index')->with('success','Szabadságkérelem sikeresen elfogadva!');
    }
    public function visszavon($id)
    {   
        
        Szabadsagoks::where('id', $id)->update(['biralat' => 0]);;
        return redirect('admin/biralat.index')->with('success','Szabadságkérelem sikeresen visszaállítva "Függőben" állapotra!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function naplo()
    {

        $elbiralt=Szabadsagoks::where('biralat', '=', 1)
        ->orWhere('biralat', '=', 2)
        ->get();

        return view('admin.biralat.naplo',compact('elbiralt'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
