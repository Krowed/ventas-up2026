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

    public function save_info_business(Request $request) {
        if(!$request->ajax()) {
            return response()->json([
                'status'    => false,
                'msg'       => 'Intente de nuevo',
                'type'      => 'warning'
            ]);
        }

        $ruc                = $request->input('ruc');
        $razon_social       = $request->input('razon_social');
        $direccion          = $request->input('direccion');
        $pais               = "PE";
        $departamento       = $request->input('departamento');
        $provincia          = $request->input('provincia');
        $distrito           = $request->input('distrito');
        $url_api            = $request->input('url_api');

        if(!empty($departamento)) {
            if(!empty($provincia)) {
                if(!empty($distrito)) {
                    Business::where('id', 1)->update([
                        'ruc'               => trim($ruc),
                        'razon_social'      => trim($razon_social),
                        'direccion'         => trim($direccion),
                        'codigo_pais'       => $pais,
                        'url_api'           => trim($url_api),
                        'ubigeo'            => $distrito
                    ]);
                }
            }
        }

        Business::where('id', 1)->update([
            'ruc'               => trim($ruc),
            'razon_social'      => trim($razon_social),
            'direccion'         => trim($direccion),
            'codigo_pais'       => $pais,
            'url_api'           => trim($url_api),
        ]);

        return response()->json([
            'status'    => true,
            'msg'       => 'Datos actualizados correctamente',
            'type'      => 'success'
        ]);
    }

    public function save_info_user(Request $request)
    {
        if(!$request->ajax())
        {
            echo json_encode([
                'status'    => false,
                'msg'       => 'Intente de nuevo',
                'type'      => 'warning'
            ]);
            return;
        }

        $ruc                        = Business::where('id', 1)->first()['ruc'];
        $nombre_comercial           = $request->input('nombre_comercial');
        $usuario_sunat              = $request->input('usuario_sunat');
        $clave_sunat                = $request->input('clave_sunat');
        $clave_certificado          = $request->input('clave_certificado');
        $certificado                = $request->file('certificado');
        $vencimiento_certificado    = $request->input('vencimiento_certificado');
        $servidor_sunat             = $request->input('servidor_sunat');

        if(!empty($certificado)) // Hay algo
        {   
            $nombre_certificado  = $ruc . '.pfx';
            $certificado->move('sunat_api/Certificado' , $nombre_certificado);
            
            Business::where('id', 1)->update([
                'nombre_comercial'          => $nombre_comercial,
                'usuario_sunat'             => $usuario_sunat,
                'clave_sunat'               => $clave_sunat,
                'clave_certificado'         => $clave_certificado,
                'certificado'               => $nombre_certificado,
                'vencimiento_certificado'   => $vencimiento_certificado,
                'servidor_sunat'            => $servidor_sunat
            ]);
        }
        else
        {
            Business::where('id', 1)->update([
                'nombre_comercial'          => $nombre_comercial,
                'usuario_sunat'             => $usuario_sunat,
                'clave_sunat'               => $clave_sunat,
                'clave_certificado'         => $clave_certificado,
                'vencimiento_certificado'   => $vencimiento_certificado,
                'servidor_sunat'            => $servidor_sunat
            ]);
        }

        echo json_encode([
            'status'    => true,
            'msg'       => 'Datos actualizados correctamente',
            'type'      => 'success'
        ]);
    }

    public function gen_json(Request $request) {
        if(!$request->ajax()) {
            echo json_encode([
                'status'    => false,
                'msg'       => 'Intente de nuevo',
                'title'     => 'Espere',
                'type'      => 'warning'
            ]);
            return;
        }

        $business           = Business::where('id', 1)->first();

        if(empty($business->ruc)) {
            echo json_encode([
                'status'    => false,
                'msg'       => 'Ingrese el numero de RUC',
                'type'      => 'warning'
            ]);
            return;
        }

        if(empty($business->ubigeo)) {
            echo json_encode([
                'status'    => false,
                'msg'       => 'Seleccione el ubigeo',
                'type'      => 'warning'
            ]);
            return;
        }

        $data_ubigeo        = $this->get_ubigeo($business->ubigeo);
        $array_json         =
        [
            "rucEmisor"         => $business->ruc,
            "razEmisor"         => $business->razon_social,
            "direccionEmisor"   => $business->direccion,
            "paisEmisor"        => $business->codigo_pais,
            "ubigeoEmisor"      => $business->ubigeo,
            "depEmisor"         => $data_ubigeo["departamento"],
            "provEmisor"        => $data_ubigeo["provincia"],
            "distEmisor"        => $data_ubigeo["distrito"],
            "comercialEmisor"   => $business->nombre_comercial,
            "urbEmisor"         => "-",
            "userSol"           => base64_encode($business->usuario_sunat),
            "claveSol"          => base64_encode($business->clave_sunat),
            "nomCertificado"    => base64_encode($business->certificado),
            "clavCertificado"   => base64_encode($business->clave_certificado),
            "localEmisor"       => "0000",
            "servidorSunat"     => $business->servidor_sunat
        ];

        $cpe_                   = $business->ruc;
        $file                   = 'sunat_api/Json/' . $cpe_ . '.json';
        file_put_contents($file, "[". json_encode($array_json) ."]");
        echo json_encode([
            'status'    => true,
            'msg'       => 'JSON generado correctamente',
            'type'      => 'success'
        ]);
    }
}
