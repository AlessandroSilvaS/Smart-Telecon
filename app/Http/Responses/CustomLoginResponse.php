<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class CustomLoginResponse implements LoginResponseContract
{
    public function toResponse($request)
    {
        $user = $request->user();

        if ($user->is_admin) {
            return redirect()->intended('/provider');
        }

        return redirect()->intended('/provider');
    }
}
