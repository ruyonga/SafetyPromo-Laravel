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

    public  function index(){
        return view('promocode.index')->with('code');
    }


    public function process(Request $request){



        try {
            $response = $this->makeCon()->post('validate', [RequestOptions::JSON => $request->request->all()]);

            $promo = json_decode($response->getBody()->getContents());

//            //dd($promo);
            $sm = new StaticMap();
            $sm->setKey('AIzaSyC_fwl5oXjcI8ssGd_2QW-RX1tFjkLUCUs')
                ->setSize('600x600')
                ->setCenter([0.3476,32.5825])
                ->setMarkers('')
                ->setZoom(13);


            $pickup = [$request->input('lato'), $request->input('lngo')];
            $dropoff = [$request->input('latd'), $request->input('lngd')];

            $points = [$pickup, $dropoff];

            $path = new Path();
            $path
                ->setPath($points);


            $sm->addPath($path);




            Session::flash('Message', "Code is valid");
            Session::flash('alert-class', 'alert-success');


            return view('promocode.show')->with('code',$promo)->with('polym', $sm->generateUrl())->with('path', $path);


        } catch (GuzzleException $e) {
            Session::flash('error', "error code processing request " . $e->getMessage());
            Session::flash('alert-class', 'alert-danger');

            return back()->withInput();

        }
    }
}
