<?php

use App\Models\Clients;
use App\Models\Business;
use App\Models\ClientsBusiness;
use App\Models\ClientsConfig;
use App\Models\ClientsScreenshot;
use App\Models\ClientsConnect;


use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


Route::get('/', function () {
    return view('welcome');
});


// recibe toda la informacion del cliente
Route::post('/api/client', function (Request $request) {

    Log::debug('ClientsController.client | begin');

    /*
        {
            business_token: '29348u231jha1s2f5jskjgdf',
            client_token: '34kjl5hn34l5hn34j54h3j', nuleable
            client_name: 'nombre', nuleable
            screenshot: [ nuleable
                {
                    img: 'imagen base 64',
                    monitor: '1'
                }
            ]
        }
        */

    $business = Business::where('token', $request->business_token)->first();
    $response = [];

    // comprueba que client_token exista. Si no exista significa que es la isntalacion del cliente
    if (empty($request->client_token)) {
        Log::debug('ClientsController.client | Nuevo cliente registrado!');
        $client = new Clients();
        $client->token = Str::orderedUuid();
        if (empty($request->client_name))
            $client->name = $client->token;
        else
            $client->name = $request->client_name;
        $clientsConfig = new ClientsConfig();
        $clientsConfig->connect_interval = 60;
        $clientsConfig->screenshot = 1;
        $clientsConfig->save();
        $client->clients_config_id = $clientsConfig->id;
        $client->save();
        $clients_business = new ClientsBusiness();
        $clients_business->business_id = $business->id;
        $clients_business->clients_id = $client->id;
        $clients_business->save();
    } else {
        $client = Clients::where('token', $request->client_token)->first();
        $clientsConfig = ClientsConfig::where('id', $client->clients_config_id)->first();
    }

    //client connect
    $clientConnect = new ClientsConnect();
    $clientConnect->client_token = $request->client_token;
    $clientConnect->save();


    //screenshot
    if (!empty($request->screenshot)) {
        $img_response = Http::asForm()->post('http://colaboradores.revueltoderadio.com', [
            'img' => $request->screenshot,
            'ext' => 'png'
        ]);

        $clientsScreenshot = new ClientsScreenshot();
        $clientsScreenshot->clients_token =  $request->client_token;
        $img_response = json_decode($img_response);
        $clientsScreenshot->img_url = $img_response->img;
        $clientsScreenshot->error = $img_response->err;
        $clientsScreenshot->save();
    }


    $response['client_token'] = $client->token;
    $response['client_config'] = $clientsConfig;

    Log::debug('ClientsController.client | end');
    return json_encode($response);
});
