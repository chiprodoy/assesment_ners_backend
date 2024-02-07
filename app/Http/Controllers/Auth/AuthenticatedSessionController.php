<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\AuthResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    public $token;

    public $refresh_token;

    public $user;
    /**
     * Login
     *
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request)
    {
        if($request->wantsJson()){
            $request->authenticate();
            return new AuthResource(User::find($request->user()->id));

        }else{
            $request->authenticate();

            $request->session()->regenerate();

            return response()->noContent();
        }

    }

    /**
     * Logout
     *
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): Response
    {
        if($request->wantsJson()){
            $request->user()->currentAccessToken()->delete();
            return response('ok');
        }else{
            Auth::guard('web')->logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return response()->noContent();
        }

    }
}
