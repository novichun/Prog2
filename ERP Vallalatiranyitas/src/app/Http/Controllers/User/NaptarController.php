<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;

class NaptarController extends Controller
{
    public function __invoke(Request $request)
    {
        if($request->ajax()) {  
            $data = Task::whereDate('created_at', '>=', $request->created_at)
                ->whereDate('hatarido',   '<=', $request->hatarido)
                ->get(['id', 'feladat', 'created_at', 'hatarido']);
            return response()->json($data);
        }
        return view('user.naptar');
    }

    public function calendarEvents(Request $request)
    {
 
        switch ($request->type) {
           case 'create':
              $event = Task::create([
                  'feladat' => $request->feladat,
                  'created_at' => $request->created_at,
                  'hatarido' => $request->hatarido,
              ]);
 
              return response()->json($event);
             break;
  
           case 'edit':
              $event = Task::find($request->id)->update([
                  'feladat' => $request->feladat,
                  'created_at' => $request->created_at,
                  'hatarido' => $request->hatarido,
              ]);
 
              return response()->json($event);
             break;
  
           case 'delete':
              $event = Task::find($request->id)->delete();
  
              return response()->json($event);
             break;
             
           default:
             # ...
             break;
        }
    }

}
