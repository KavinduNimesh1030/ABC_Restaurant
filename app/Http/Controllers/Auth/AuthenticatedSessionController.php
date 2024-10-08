<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('home.pages.sign-in');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();
        $request->session()->regenerate();
        $roles = Auth::user()->getRoleNames();

       

        $route = '';
        if ($roles->contains('admin')) {
            $route = '/account/admin/dashboard';
        } elseif ($roles->contains('customer')) {
            $route = '/';
        } elseif ($roles->contains('staff')) {
            $route = '/account/staff/dashboard';
        } else {
            $route = '/';
        }


        return redirect()->intended($route);
    

        // return redirect()->intended(route('dashboard', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
