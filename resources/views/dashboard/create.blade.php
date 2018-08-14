@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="card border-warning mb-3">
                        <div class="card-header bg-warning text-white">Create an Event</div>
                        <div class="card-body ">
                            {!! Form::open(['action' => ['EventsController@store'], 'files' => true ]) !!}

                            @include('dashboard.partials.newevent', ['submitButtonText' => ' Add New Event', 'is_edit' => false])

                            {!! Form::close() !!}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@stop