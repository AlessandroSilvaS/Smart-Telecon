<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class loginResponseController extends Controller
{
     public function toResponse($request)
    {
         $user = Auth::user();

        // Exemplo: Redirecionar baseado no time
        if ($user->currentTeam && $user->hasRole('admin')) {
            return redirect('/dashboard');
        }

        return redirect('/minha-template-customizada');
    }
}
