<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Fortify\CreateNewUser;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Models\Jogok;
use App\Models\Role;
use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Gate::denies('logged-in')){
            dd('no acces');
        }
        if(Gate::allows('is-admin')){
            return view('admin.users.index', ['users' => User::paginate(10)]);
        }
        dd("adminnak kell lenned");
        $users = User::paginate(10);

        return view('admin.users.index')
                    ->with([
                        'users' => $users
                    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create', ['jogoks' => Jogok::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {

        //$validatedData = $request->validated();

        //$user = User::create($validatedData);

        $newUser = new CreateNewUser();
        $user = $newUser->create($request->all());
        
        $user->jogoks()->sync($request->jogoks);
        
        Password::sendResetLink($request->only(['email']));

        $request->session()->flash('succes', 'Sikeresen létrehozta a felhasználót');

        return redirect(route('admin.users.index'));
       
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
        return view('admin.users.edit', ['jogoks' => Jogok::all(), 'user' => User::find($id)]);
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
        $user = User::findOrFail($id);

        if(!$user){
            $request->session()->flash('error', 'Nem szerkesztheti ezt a felhasználót');
            return redirect(route('admin.users.index'));
        }

        $user->update($request->except(['_token', 'jogoks']));

        $user->jogoks()->sync($request->jogoks);

        $request->session()->flash('succes', 'Sikeresen szerkesztette a felhasználót');

        return redirect(route('admin.users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
       
        User::destroy($id);

        $request->session()->flash('succes', 'Sikeresen kitörölte a felhasználót');

        return redirect(route('admin.users.index'));
    }
}
