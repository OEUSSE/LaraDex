<?php

namespace LaraDex\Http\Middleware;

use Closure;
use Auth;

class CheckAge
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
        $userId = Auth::id(); // Obtener infomación del usuario Loggeado
        if ($request->age <= 200) {
            return redirect('/trainers');
        }

        $request->name = "Saúl";

        return $next($request);
    }
}
