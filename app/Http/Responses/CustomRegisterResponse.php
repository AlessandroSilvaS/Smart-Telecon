<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\RegisterResponse;
use Illuminate\Support\Facades\Auth;

class CustomRegisterResponse implements RegisterResponse
{
    public function toResponse($request)
    {
        $user = Auth::user();

        dd($user->hasRole('admin'));

        if ($user->hasRole('admin')) {
            return redirect('/dashboard');
        }

        return redirect('/provider');
    }
}
