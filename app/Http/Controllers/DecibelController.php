<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DecibelController extends Controller
{
    public function show(){ 
        return view('index',[
            'cur' => \App\Models\Decibel::latest()->first(),
            'avgDecibel' => \App\Models\Decibel::avg('waardes'),
        ]);
    }
}
