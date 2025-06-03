<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class loginResponseController extends Controller
{
     public function toResponse($request)
    {
         $user = Auth::user();

        if ($user->currentTeam && $user->hasRole('admin')) {
            return redirect('/dasshboard');
        }

        return redirect('/provider');
    }
}
