<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class vakkenController extends Controller
{
    public function index(){
        return view('vakken.index',['vakken' => \App\Models\vak::all(), 'inputtime' => \App\Models\inputtime::first()]);
    }
}
