<?php

use App\Models\Clients;
use App\Models\Business;
use App\Models\ClientsBusiness;


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
        $client->clients_config_id = 1;
        $client->save();
        $clients_business = new ClientsBusiness();
        $clients_business->business_id = $business->id;
        $clients_business->clients_id = $client->id;
        $clients_business->save();
        $response['client_token'] = $client->token;
    } else {
        $client = Clients::where('token', $request->client_token);
    }

    Log::debug('ClientsController.client | end');
    return print_r($client->id, true);
});
