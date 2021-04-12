<?php

namespace App\Http\Controllers;
use App\Models\werk;
use Illuminate\Http\Request;

class aanhetwerkController extends Controller
{
    public function newvak(Request $request){
        
        $werkvak = werk::all()->first();

        $werkvak->name = $request->input('werkvak');
        $werkvak->active = 1;
        $vakken->save();

        return redirect('/vakken')
    }
}
