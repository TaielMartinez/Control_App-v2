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

    public function client(Request $request)
    {
        Log::debug('ClientsController.start | begin');

        /*
        {
            business_token: '29348u231jha1s2f5jskjgdf', 
            client_token: '34kjl5hn34l5hn34j54h3j',
            screenshot: [
                {
                    img: 'imagen base 64',
                    monitor: '1'
                }
            ]
        }
        */


        Log::debug('ClientsController.start | end');
        return 'hola';
    }
}
