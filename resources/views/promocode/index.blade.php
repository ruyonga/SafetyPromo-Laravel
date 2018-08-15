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

            </div>
        </div>
    </div>
@stop
