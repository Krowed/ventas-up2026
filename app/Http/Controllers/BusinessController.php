<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\Department;
use App\Models\District;
use App\Models\Province;
use Illuminate\Http\Request;

class BusinessController extends Controller
{
    public function index()
    {
        $business       = Business::find(1);
        $departments    = Department::get();
        return view('business.index', compact(
            'business',
            'departments'
        ));
    }

    public function load_ubigeo()
    {
        $ubigeo         = Business::find(1)->ubigeo;
        $departments    = Department::get();
        $department     = NULL;
        $province       = NULL;
        $district       = NULL;

        if (!empty($ubigeo)) {
            $district       = District::where('codigo', $ubigeo)->first();
            $province       = Province::where('codigo', $district->provincia_codigo)->first();
            $department     = Department::where('codigo', $district->departamento_codigo)->first();

            $provinces      = Province::where('departamento_codigo', $department->codigo)->get();
            $districts      = District::where('departamento_codigo', $department->codigo)
                            ->where('provincia_codigo', $province->codigo)->get();
        } else {
            $district   = NULL;
            $province   = NULL;
            $department = NULL;
        }

        return response()->json([
            'ubigeo'        => $ubigeo,
            'departments'   => $departments,
            'provinces'     => $provinces,
            'districts'     => $districts,
            'department'    => $department,
            'province'      => $province,
            'district'      => $district
        ]);
    }

    public function load_provinces(Request $request)
    {
        $codigo         = $request->input('codigo');
        $provinces      = Province::where('departamento_codigo', $codigo)->get();
        return response()->json([
            'provinces' => $provinces
        ]);
    }

    public function load_districts(Request $request)
    {
        $codigo                 = $request->input('codigo');
        $departamento_codigo    = $request->input('codigo_departamento');
        $departamento           = Department::where('codigo', $departamento_codigo)->first()->codigo;
        $provincia_codigo       = Province::where('codigo', $codigo)->first()->codigo;
        $districts              = District::where('departamento_codigo', $departamento_codigo)
                                ->where('provincia_codigo', $provincia_codigo)
                                ->get();
        return response()->json([
            'districts' => $districts
        ]);
    }
}
