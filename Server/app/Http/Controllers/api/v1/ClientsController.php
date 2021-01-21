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



        Log::debug('ClientsController.start | end');
    }
}
