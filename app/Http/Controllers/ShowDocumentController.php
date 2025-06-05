<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShowDocumentController extends Controller
{

    public function showDocument(){

        $user = Auth()->user();

        $team = $user->team;

        return view('presentation.createDocument', compact('team'));
        
    }
    
}
