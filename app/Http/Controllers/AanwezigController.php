<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AanwezigController extends Controller
{
    public function show(){
        $show = \App\Models\Aanwezig::first()->aanwezig;
        return view('show', ['show' => $show]);
    }
}
  