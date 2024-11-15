<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use DB;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */

    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */

    public function store(LoginRequest $request): RedirectResponse
    {
        $credentials = $request->only('email', 'password');

        if (Auth::once($credentials)) {
            $request->authenticate();
            $request->session()->regenerate();
            // Get the authenticated user if needed
            $user = auth()->user();
            if ($user->hasRole('refiner')) {
                return redirect('/refiner/dashboard')->with('success', 'Login successful.');
            }
            elseif ($user->hasRole('freight')) {
                return redirect('/freight/dashboard')->with('success', 'Login successful.');
            }
            elseif ($user->hasRole('shipper')) {
                return redirect('/shipper/dashboard')->with('success', 'Login successful.');
            }
            elseif ($user->hasRole('client')) {
                return redirect('/client/dashboard')->with('success', 'Login successful.');
            }
            return redirect()->intended(RouteServiceProvider::HOME)->with('success', 'Login successful.');
        }  else {
            $email = User::where('email', $credentials['email'])->first();
            
            if (!$email) {
                return redirect()->back()->with('warning', 'Email is incorrect.');
            } else {
                return redirect()->back()->with('warning', 'Password is incorrect.');
            }
        }
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
