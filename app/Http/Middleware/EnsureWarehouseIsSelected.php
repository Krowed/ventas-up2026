<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureWarehouseIsSelected
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // 1. Si no está logueado, que siga su camino (el middleware 'auth' se encargará de él)
        if (!auth()->check()) {
            return $next($request);
        }

        // 2. Si ya está logueado pero NO ha seleccionado almacén
        if (!session()->has('selected_warehouse_id')) {

            $warehouses = auth()->user()->warehouses;

            // Caso A: Solo tiene un almacén, se lo asignamos de una vez
            if ($warehouses->count() === 1) {
                session(['selected_warehouse_id' => $warehouses->first()->id]);
                return $next($request);
            }

            // Caso B: Tiene varios o ninguno, lo mandamos a seleccionar
            // (Evitamos redirección infinita si ya está en la página de selección)
            if (!$request->routeIs('warehouses.selector*') && !$request->routeIs('logout')) {
                return redirect()->route('warehouses.selector');
            }
        }

        return $next($request);
    }
}
