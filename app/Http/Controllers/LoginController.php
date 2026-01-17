<?php

namespace App\Http\Controllers;

use App\Models\Business;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index() {
        $data['nombre_comercial']   = Business::find(1)->nombre_comercial;
        return view('auth', $data);
    }
}
