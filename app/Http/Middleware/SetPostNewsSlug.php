<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetPostNewsSlug
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!empty($request->route('slug'))){
            $slug = $request->route('slug');
            app()->instance('newsSlug',$slug); 
        }else{
            $cat_slug = $request->route('category_slug');
            dd($cat_slug);
            app()->instance('catSlug',$cat_slug);
        }
        
        return $next($request);
    }
}
