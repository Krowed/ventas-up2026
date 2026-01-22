<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        $data['nombre_comercial']   = Business::find(1)->nombre_comercial;
        return view('auth', $data);
    }

    public function login(Request $request)
    {
        $email          = trim($request->input('email'));
        $password       = trim($request->input('password'));
        $remember       = $request->filled('remember');

        if (empty($email) || empty($password)) {
            return back()->with('message', 'Debe rellenar todos los campos');
        }

        $credentials    = [
            'email'     => strtolower($email),
            'password'  => $password
        ];

        if (Auth::attempt($credentials, $remember)) {
            $estado     = User::where('id', Auth::user()->id)->first()->estado;
            if ($estado != 1) {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return back()->with('message', 'No tiene los permisos necesarios');
            }

            $request->session()->regenerate();
            $user       = Auth::user();
            // Si solo tiene un almacen asignado redireccionamos al dashboard principal
            if ($user->warehouses->count() == 1) {
                session(['selected_warehouse_id' => $user->warehouses->first()->id]);
                return redirect()->route('dashboard.index');
            }

            return redirect()->route('warehouses.selector');
        } else {
            Auth::logout();
            return back()->with('message', 'Usuario o contraseña incorrectos. Por favor, intente de nuevo.');
        }
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
