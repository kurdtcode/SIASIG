<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\Anggota;

class SuperAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        $anggota = Anggota::where('email', $user->email)->first();
        
        if ($anggota && $anggota->role === 'super admin') {
            return $next($request);
        }

        return redirect('/')->with('error', 'You do not have access to this resource.');
    }
}
