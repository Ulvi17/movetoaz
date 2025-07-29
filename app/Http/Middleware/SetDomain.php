<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class SetDomain
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $host = $request->getHost();
        $all = settings();

        if (!empty($all) && count($all) > 0) {
            foreach ($all as $set) {
                if ($host==$set->domain) {
                    Session::put('domain', $set->domain);
                    Session::put('setting_id', $set->id);
                }
            }
        }
        
        // dd(Session::get("domain"),Session::get("setting_id"),$host,$all);

        return $next($request);
    }
}
