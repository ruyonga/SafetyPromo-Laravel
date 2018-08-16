@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card mb-2">
                            <h3 class="card-header  {{ $promo->active ?  "bg-success": "bg-danger" }}" style="color:white;">Promo code {{$promo->code }}</h3>

                            <img style="height: 300px; width: 100%; display: block;" src="{{$map}}" alt="Event Venue">
                            <div class="card-body">
                                <h3 class="card-title"><b>Venue:</b> {{ $promo->event->address }}</h3>
                                <h4 class="card-subtitle text-muted">{{ date('F d, Y', strtotime($promo->expirydate))}}</h4>
                            </div>
                            <div class="card-body">
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

                                <p class="card-text">  @if(\Carbon\Carbon::now()->gt($promo->expirydate) || $promo->expired)
                                        Expired  <span class="badge badge-danger">Expired</span>
                                    @else
                                        {{--Whats the opposite of expired? Normal? Okay? Works?--}}
                                        Not expired <span class="badge badge-success">Not Expired</span>

                                    @endif
                                <td>

                                </td>
                                    </p>
                            </div>


                            <div class="card-footer text-muted">
                                <div style="display: none;">
                                    {!! Form::open(['method'=>'PATCH','action' => ['DashboardController@updateStatus', 'id'=> $promo->_id], 'id' => 'status-form']) !!}
                                    {{ csrf_field() }}
                                    @if($promo->active)
                                    {{ Form::hidden('active', 'false') }}
                                        {{ Form::hidden('expired','true') }}

                                    @else
                                        {{ Form::hidden('active', 'true') }}
                                        {{ Form::hidden('expired','false') }}

                                    @endif
                                </div>
                                <button type="submit"   class="btn {{ $promo->active  ?  "btn-danger": "btn-success" }}"> {{ $promo->active ?"Deactivated code":  "Activate code" }} </button>
                                {!! Form::close() !!}
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

