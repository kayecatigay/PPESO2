<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;

class AuthorizedAdmin
{
    public function handle($request, Closure $next)
    {
        // dd("SDFsdf");
        if (!$this->isAdmin($request)) {
            abort(Response::HTTP_UNAUTHORIZED);
        }

        return $next($request);
    }

    protected function isAdmin($request)
    {
        // Write your logic to check if the user us admin.

        // something like
        if(isset($request->user()->roles))
            { 
                // return  $request->user()->roles == 1; 
                return true;
            }
        else
            { return false; }

    }
}