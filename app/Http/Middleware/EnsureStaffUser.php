<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

/**
 * Safety net for every route in the staff area (dashboard, profile, password, contracts, ...).
 * Ship Crew sign in through the separate crew guard, so they should never have a staff session.
 * This catches the other cases: a role changed to Ship Crew, an account deactivated, or a
 * password removed while the person is still signed in.
 *
 * Register as an alias in bootstrap/app.php: $middleware->alias(['staff' => EnsureStaffUser::class]);
 * Use:  Route::middleware(['auth', 'staff'])->group(...)
 */
class EnsureStaffUser
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();   // web guard

        if (! $user || ! $user->isStaff() || ! $user->is_active || $user->password === null) {
            Auth::guard('web')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('login')
                ->withErrors(['email' => 'These credentials do not match our records.']);
        }

        return $next($request);
    }
}
