<?php

namespace App\Http\Controllers;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\RequestOptions;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    //

    public function store(Request $request){
        try {
            $response = $this->makeCon()->post('promotions', [RequestOptions::JSON => $request->request->all()]);


            /**
             * Pass to the blade a message and a bootstrap alert class time
             */
            if ($response->getStatusCode() == 200) {
                Session::flash('message', "New Event added, Now generate promo codes");
                Session::flash('alert-class', 'alert-success');


                return redirect()->route('dashboard');
            }

        } catch (GuzzleException $e) {
            dd($e);
            Session::flash('message', "Failed to create hospital " . $e->getMessage());
            Session::flash('alert-class', 'alert-danger');

            return back()->withInput();

        }
    }
}
