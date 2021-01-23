<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;

Route::get('/', function () {
    return view('welcome');
});


// recibe toda la informacion del cliente
Route::post('/api/client', function () {

    Log::debug('ClientsController.start | begin');

    /*
        {
            business_token: '29348u231jha1s2f5jskjgdf', 
            client_token: '34kjl5hn34l5hn34j54h3j',
            first_connection: true,
            screenshot: [
                {
                    img: 'imagen base 64',
                    monitor: '1'
                }
            ]
        }
        */


    Log::debug('ClientsController.start | end');
    return 'Hello World';
});
