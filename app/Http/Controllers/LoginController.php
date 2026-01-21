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

        if(Auth::attempt($credentials, $remember)) {
            $estado     = User::where('id', Auth::user()->id)->first()->estado;
            if($estado != 1) {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return back()->with('message', 'No tiene los permisos necesarios');
            }

            $request->session()->regenerate();
            $user       = Auth::user();
            dd($user->warehouses);
            // Si solo tiene un almacen asignado redireccionamos al dashboard principal
            if() {

            }
            return redirect()->route('establishment');
        } 
        else {
            Auth::logout();
            return back()->with('message', 'Usuario o contraseña incorrectos. Por favor, intente de nuevo.');
        }
    }
}
