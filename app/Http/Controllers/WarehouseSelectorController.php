<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WarehouseSelectorController extends Controller
{
    public function index()
    {
        $data["warehouses"]     = auth()->user()->warehouses;
        return view('establishment', $data);
    }

    public function store(Request $request) {
        $id = $request->warehouse_id;
        // Verificamos que este usuario tenga permisos para el almacen
        if(!auth()->user()->warehouses->contains($id)) {
            return back()->with('error', 'No tienes permiso para acceder a este establecimiento.');
        }

        // Si pasa, guardamos en la sesión y redireccionamos
        session(['selected_warehouse_id' => $id]);
        return redirect()->route('dashboard.index');
    }
}
