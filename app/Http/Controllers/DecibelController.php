<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DecibelController extends Controller
{
    public function show(){ 
        return view('index',[
            'cur' => \App\Models\Decibel::latest()->first(),
            'decibel' => \App\Models\Decibel::all(),
            'minDecibel' => \App\Models\Decibel::min('waardes'),
            'maxDecibel' => \App\Models\Decibel::max('waardes'),
            'avgDecibel' => \App\Models\Decibel::avg('waardes'),
        ]);
    }
}
