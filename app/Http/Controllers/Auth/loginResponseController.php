<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LoginResponse;
use Illuminate\Support\Facades\Auth;

class CustomLoginResponse implements LoginResponse
{
    public function toResponse($request)
    {
        $user = Auth::user();

        if ($user->hasRole('admin')) {
            return redirect('/dashboard');
        }

        return redirect('/provider');
    }
}
