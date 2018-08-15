@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">

                <div class="card border-success  mb-3">
                    <div class="card-header bg-success">Results</div>
                    <div class="card-body">
                        <img style="height: 600px; width: 100%; display: block;" src="{{$polym}}" alt="Route map">
                        <ul style="list-style: none; margin-top: 2%;">
                            <li><h3> Code: {{ $code->code   }}</h3></li>
                            <li>Value: {{ $code->value }}</li>
                            <li>Expiry date {{ date('F d, Y', strtotime( $code->expirydate))}}</li>
                            <li>Route {{ $polym }}</li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop