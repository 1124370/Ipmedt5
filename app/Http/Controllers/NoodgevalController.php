<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NoodgevalController extends Controller
{
    public function aanuit(){
        $noodgeval = \App\Models\Noodgeval::first();

        if($noodgeval->noodgeval_on == 'uit'){
            $noodgeval->noodgeval_on == 'aan';
        }
        else{
            $noodgeval->noodgeval_on == 'uit';
        }
        $noodgeval->save();

        return view('noodgeval', ['noodgeval' => $noodgeval->noodgeval_on]);
    }
}
