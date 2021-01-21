<?php

namespace App\Http\Controllers\Api\v1\ClientsController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;


class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function start(Request $request)
    {
        Log::debug('ClientsController.start | begin');
        Log::debug('ClientsController.start | request: '.print_r($request, true));

        /*
        {
            token: '34kjl5hn34l5hn34j54h3j',
            screenshot: [
                {
                    img: 'imagen base 64',
                    monitor: '1'
                }
            ]
        }
        */

        
        Log::debug('ClientsController.start | end');
        return view('welcome');
    }
}
