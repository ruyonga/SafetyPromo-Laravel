<?php

namespace App\Http\Controllers;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\RequestOptions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Tidusvn05\StaticMap\Path;
use Tidusvn05\StaticMap\StaticMap;

class PromoCodesController extends Controller
{
    //

    public function index()
    {
        return view('promocode.index')->with('code');
    }

    /**
     * Check for valid cards from the apis, use the response to generate the static map
     * cj
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function process(Request $request)
    {


        try {
            $response = $this->makeCon()->post('promocode/validate', [RequestOptions::JSON => $request->request->all()]);

            $promo = json_decode($response->getBody()->getContents());
//
            $sm = new StaticMap();
            $sm->setKey('AIzaSyC_fwl5oXjcI8ssGd_2QW-RX1tFjkLUCUs')
                ->setSize('600x600')
                ->setCenter([0.3476, 32.5825])
                ->setMarkers('')
                ->setZoom(13);


            //Generate teh points for the polma
            $pickup = [$promo->origin->coordinates['0'], $promo->origin->coordinates['1'], ];
            $dropoff = [$promo->destination->coordinates['0'], $promo->destination->coordinates['1']];

            $points = [$pickup, $dropoff];

            $path = new Path();
            $path->setPath($points);
            $sm->addPath($path);


            Session::flash('Message', "Code is valid");
            Session::flash('alert-class', 'alert-success');


            return view('promocode.show')->with('code', $promo)->with('polym', $sm->generateUrl())->with('path', $path);


        } catch (GuzzleException $e) {
            if ($e->getCode() == 400) {
                /*
                    if the code is out of radius
                */

                return view('error')->with('error', "Code can only be used within a limited radius to the venue");
            } else if ($e->getCode() == 402) {
                /*
                    if the code is already used
                */

                return view('error')->with('error', "Promo Code is invalid or already used");

            }
            Session::flash('error', "error code processing request ", $e->getMessage());
            Session::flash('alert-class', 'alert-danger');

            return back()->withInput();

        }
    }


    /**
     * Method to return active codes from the api
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function activecodes()
    {

        try {
            $promocodes = $this->makeCon()->get('getactivecodes');

            if ($promocodes->getStatusCode() == 200) {
                $activecoded = json_decode($promocodes->getBody()->getContents());


                return view('promocode.activecodes')->with('codes', $activecoded);
            } else {
                return view('error');
            }

        } catch (GuzzleException $e) {

            Session::flash('error', "An error occurred processing request " . $e->getMessage());
            Session::flash('alert-class', 'alert-danger');


            return view('error')->with('error', "Something bad happened");
        }


    }

}
