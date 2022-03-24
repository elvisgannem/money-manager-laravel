<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LoginController extends Controller
{
    public function index(): View
    {
        return view('auth.login');
    }

    public function login(Request $request): RedirectResponse
    {
        if(!Auth::attempt($request->only(['email', 'password']))) {
            return redirect()->back()->withErrors('Auth error');
        }

        return redirect('/');
    }
}
