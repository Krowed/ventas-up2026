<?php

namespace App\Http\Controllers;

use App\Models\Business;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        $data['nombre_comercial']   = Business::find(1)->nombre_comercial;
        return view('auth', $data);
    }

    public function login(Request $request)
    {
        $email      = $request->input('email');
        $password   = $request->input('password');
        $remember   = $request->filled('remember');

        if (empty($email) || empty($password)) {
            return back()->with('message', 'Debe rellenar todos los campos');
        }
    }
}
