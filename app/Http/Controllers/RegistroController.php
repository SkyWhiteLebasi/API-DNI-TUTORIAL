<?php

namespace App\Http\Controllers;

use App\Models\Registro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RegistroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function buscarDni(Request $request)
    {
     

        $dni = $request->dni;
        // $curl = curl_init();

        $token = config('services.apisunat.token');
        $urldni= config('services.apisunat.urldni');
        $urlruc=config('services.apisunat.urlruc');

        $response = Http::withHeaders([
            'Referer' => 'https://apis.net.pe/consulta-dni-api',
            'Authorization' => 'Bearer ' . $token
        ])->get($urldni.$dni);
        $persona = json_decode($response->getBody()->getContents(), true);

        dd($persona);
        // $persona = json_decode($response);
       
        if ($response->successful() && isset($persona['numeroDocumento'])) {
            return view('registro.create', [
                'dni' => $persona['numeroDocumento'],
                'nombres' => $persona['nombres'],
                'apel_paterno' => $persona['apellidoPaterno'],
                'apel_materno' => $persona['apellidoMaterno']
            ]);
        } else {
            return redirect()->back()->withErrors(['DNI no encontrado']);
        }
    }


    public function index(Request $request)
    {
        //
     
        $datos['registros'] = Registro::all()->sortDesc();
        return view('registro.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('registro.create');
    }

    public function store(Request $request)
    {
        $campos = [
            'nombres' => 'required|string',
            'dni' => 'required',
            'apel_paterno' => 'nullable|string',
            'apel_materno' => 'nullable|string',
        ];

        $mensaje = [
            'required' => 'El :attribute es requerido',
        ];

        $dni = $request->dni;
        $this->validate($request, $campos, $mensaje);

        $datosProducto = request()->except('_token'); //trae los datos excepto el token
        // $curl = curl_init();

        // $token = config('services.apisunat.token');
        // $urldni = config('services.apisunat.urldni');
        // $urlruc = config('services.apisunat.urlruc');

        // $response = Http::withHeaders([
        //     'Referer' => 'https://apis.net.pe/consulta-dni-api',
        //     'Authorization' => 'Bearer ' . $token
        // ])->get($urldni.$dni);

        // $persona = json_decode($response);
        // dd($persona);
        Registro::insert($datosProducto);

        return redirect('registro')->with('guardar', 'ok');
    }

    /**
     * Display the specified resource.
     */
    public function show(Registro $registro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Registro $registro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Registro $registro)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Registro $registro)
    {
        //
    }
}
