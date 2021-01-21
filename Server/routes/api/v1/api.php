<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// coneccion cuando el usuario prende la pc
Route::post('start', 'api\v1\ClientsController@start');

// recibe toda la informacion del cliente
Route::post('connect', 'api\v1\ClientsController@screenshot');

