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

    public function aanuit()
    {
        $niet_storen = Decibel::all()->first();

        if ($niet_storen->led_on == 'uit')
        {
            $niet_storen->led_on = 'aan';
        }
        else
        {
            $niet_storen->led_on = 'uit';
        }
        $niet_storen->save();
        return redirect('/');
    }
}
