<?php

namespace App\Http\Middleware;

use Closure;

use DB;

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;

class CheckAccess
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
         
        $route_name = Route::getCurrentRoute()->getName();

        $has_access = false;
        
        $userRoles = Auth::user()->roles->pluck('id');

        foreach ($userRoles as $key => $userRole)
        {

            $count = DB::table('role_action')->where('role_id', '=', $userRole)->where('action', '=', $route_name)->count();

            if($count > 0)
            {  
               $has_access = true;
               break;
            }        
            
        }  // end foreach

        if(!$has_access)
        {
           return redirect('/permission-denied');
        }

       
        
            return $next($request);
      
        
       
    }
}
