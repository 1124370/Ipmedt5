<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TelefoonApiController extends Controller
{
    public function get(){
        $get = \App\Models\aanwezig::first();
        return $get;
    }
}
