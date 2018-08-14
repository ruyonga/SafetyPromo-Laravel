<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
    }


    public function makeCon(){


        $client = new Client([ 'base_uri' => env('GUZZLE_BASE'),'timeout'  => env('TIME_OUT'), 'headers' => ['x-access-token' => $this->gettoken()] ]);

        return $client;
    }

    public function gettoken()
    {// grab credentials from the request




        return  $token = session('token');

    }
}
