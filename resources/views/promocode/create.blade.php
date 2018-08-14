@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="card border-warning mb-3">
                <div class="card-header bg-warning text-white">Create an Event</div>
                <div class="card-body ">
                    {!! Form::open(['method' => 'PATCH', 'action' => ['PromoCodesController@patch', 'id'=> $hospital->_id], 'files' => true ]) !!}
                    {!! Form::open(['action' => [], 'files' => true ]) !!}

                    @include('dashboard.partials.addcode', ['submitButtonText' => 'Generate codes', 'is_edit' => false])

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop
