<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    // Define role constants
    private const ROLE_ADMIN = 3;
    private const ROLE_SELLER = 2;
    private const ROLE_CUSTOMER = 1;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, string $role)
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect('/loginRegister'); // Redirect to login if not authenticated
        }

        // Get the authenticated user
        $user = Auth::user();

        // Check user role based on ID
        switch ($role) {
            case 'admin':
                if ($user->role_id !== self::ROLE_ADMIN) {
                    return redirect('/home'); // Redirect if not admin
                }
                break;

            case 'seller':
                if ($user->role_id !== self::ROLE_SELLER) {
                    return redirect('/home'); // Redirect if not seller
                }
                break;

            case 'admin_and_seller':
                if (!in_array($user->role_id, [self::ROLE_ADMIN, self::ROLE_SELLER])) {
                    return redirect('/home'); // Redirect if not admin or seller
                }
                break;

            case 'customer':
                if ($user->role_id !== self::ROLE_CUSTOMER) {
                    return redirect('/home'); // Redirect if not customer
                }
                break;
            case 'all_roles':
                // Allow all authenticated users, no specific role check needed
                break;
            default:
                return redirect('/home'); // Redirect for unknown role
        }


        return $next($request); // Allow the request to proceed
    }
}
