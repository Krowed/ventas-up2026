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
}
