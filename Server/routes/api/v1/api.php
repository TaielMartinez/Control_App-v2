<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::post('connect', 'Api\v1\Operation\OperationController@save');
