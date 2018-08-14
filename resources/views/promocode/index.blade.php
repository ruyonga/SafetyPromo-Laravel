@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card border-warning mb-3">
                    <div class="card-header bg-warning text-white">Create an Event</div>
                    <div class="card-body ">
                        {!! Form::open(['method'=>'POST', 'action' => ['PromoCodesController@process'], 'files' => true ]) !!}

                        @include('promocode.partials.challenge', ['submitButtonText' => 'Validate Code', 'is_edit' => false])

                        {!! Form::close() !!}
                    </div>
                </div>

            </div>
            <div class="col-md-6">
                <div class="card border-primary mb-3" style="max-width: 100rem;">
                    <div class="card-header ">Results</div>
                    <div class="card-body">
                       <img src="">
                       <ul>
                           <li> <h3> Code: {{ isset($code->code)? $code->code: null  }}</h3></li>
                           <li>Value: {{ isset($code->value)? $code->value: null }}</li>
                           <li>Expiry date {{ date('F d, Y', strtotime(isset($code->expirydate)? $code->expirydate : null))}}</li>

                       </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
