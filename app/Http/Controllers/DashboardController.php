<?php

namespace App\Http\Controllers;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\RequestOptions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use function env;
use Tidusvn05\StaticMap\StaticMap;
use Tidusvn05\StaticMap\Marker;

class DashboardController extends Controller
{
    //

    public function index()
    {

        try {
            $promocodes = $this->makeCon()->get('promocode')->getBody()->getContents();


            return view('dashboard.index')->with('codes', json_decode($promocodes));

        } catch (GuzzleException $e) {

            Session::flash('error', "An error occurred processing request " . $e->getMessage());
            Session::flash('alert-class', 'alert-danger');


            return view('error')->with('error', "Something bad happened");
        }

    }

    public function show($id)
    {
        try {
            $promotions = $this->makeCon()->get('promocode/' . $id);

            /**
             * Pass to the blade a message and a bootstrap alert class time
             */

            if ($promotions->getStatusCode() == 500) {
                Session::flash('warning', "Error finding Promotion in database");
                Session::flash('alert-class', 'alert-warning');

                return redirect()->route('dashboard');

            } else if ($promotions->getStatusCode() == 404) {
                Session::flash('warning', "Promotion Id not found in the system");
                Session::flash('alert-class', 'alert-warning');

                return redirect()->route('dashboard');

            } else {

                $promo = json_decode($promotions->getBody()->getContents());

                //dd($promo);
                $sm = new StaticMap();
                $sm->setKey('AIzaSyC_fwl5oXjcI8ssGd_2QW-RX1tFjkLUCUs')
                    ->setCenter([$promo->event->coordinates[1], $promo->event->coordinates[0]])
                    ->setZoom(18);


                $marker2 = new Marker();
                $marker2->addLocation([$promo->event->coordinates[1], $promo->event->coordinates[0]])
                    ->setAnchor('center');
                $sm->addMarker($marker2);


                return view('dashboard.show')->with('promo', $promo)->with("map", $sm->generateUrl());
            }

        } catch (GuzzleException $e) {

            Session::flash('error', "An error occurred processing request " . $e->getMessage());
            Session::flash('alert-class', 'alert-danger');

            return redirect()->route('dashboard');

        }


    }


    public function store(Request $request)
    {
        try {
            $response = $this->makeCon()->post('promocode', [RequestOptions::JSON => $request->request->all()]);


            /**
             * Pass to the blade a message and a bootstrap alert class time
             */
            if ($response->getStatusCode() == 201) {
                Session::flash('message', "successfully generated " . $request['codenum']);
                Session::flash('alert-class', 'alert-success');


                return redirect()->route('dashboard');
            }

        } catch (GuzzleException $e) {
            Session::flash('message', "Error processing request " . $e->getMessage());
            Session::flash('alert-class', 'alert-danger');

            return back()->withInput();

        }
    }

    public function updateStatus(Request $request, $id)
    {


        try {

            $response = $this->makeCon()->put('promocode/status/'.$id, [RequestOptions::JSON => $request->request->all()]);


            /**
             * Pass to the blade a message and a bootstrap alert class time
             */
            if($response->getStatusCode() == 204){
                Session::flash('message', "Promo code status changed ");
                Session::flash('alert-class', 'alert-success');


            }

            return redirect()->route('dashboard');

        } catch (GuzzleException $e) {
            Session::flash('error', "Failed to update record" . $e->getMessage());
            Session::flash('alert-class', 'alert-danger');

            return back()->withInput();

        }

    }
}