A PRECIOS@S, LES DEJO UN PEQUEÑO PROYECTO PARA MANEJAR LAS APIS DE RENIEC PERU:

PASO 1: DEBERAN DE CREAR SU CUENTA EN https://apis.net.pe/
PASO 2: CREAN UN TOKEN PARA SU SISTEMA EN https://apis.net.pe/app/tokens
PASO 3: EN SU ARCHIVO ENV AGREGAN LO SIGUENTE: 

API_SUNAT_TOKEN = 'aqui tu token'
API_SUNAT_URL_DNI = 'https://api.apis.net.pe/v2/reniec/dni?numero='
API_SUNAT_URL_RUC = 'https://api.apis.net.pe/v2/sunat/ruc?numero='

PASO 4: EN SU ARCHIVO CONFIG/SERVICES.PHP AGREGAN LO SIGUIENTE:
 
    'apisunat' => [
        'token' => env('API_SUNAT_TOKEN'),
        'urldni' => env('API_SUNAT_URL_DNI'),
        'urlruc' => env('API_SUNAT_URL_RUC')
    ],
PASO 5: EN SU CONTROLADOR CREAN LA FUNCION DE BUSQUEDA Y CON ESO QUEDA:

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
   }
LOS QUIERO MUCHO, BYE.
