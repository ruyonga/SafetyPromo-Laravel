
<div class="form-group">

    {!! Form::label('code', 'Promo code: ', ['class' => 'control-label']) !!}
    {!! Form::text('code', isset($promo) && !is_null($promo) ? $promo->code : null, ['class' => 'form-control ' , 'required']) !!}

    @if($errors->has('code'))
        <span class="help-block">
                    <strong>{{ $errors->first('code') }}</strong>
                </span>
    @endif
</div>


<div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
    {!! Form::label('origin', 'Pickup(Origin):', ['class' => 'control-label']) !!}
    {!! Form::text('origin',isset($promo) && !is_null($promo) ? $promo->location->address : null, ['class' => 'form-control', 'required']) !!}
    @if($errors->has('origin'))
        <span class="help-block"><strong>{{ $errors->first('origin') }}</strong></span>
    @endif
    {{--<span>Always ensure the coordinates below are filled before submit</span>--}}
</div>
{{--<div class="row" >--}}
    {{--<div class="col-lg-6">--}}
        {{--<div class="form-group{{ $errors->has('lato') ? ' has-error' : '' }}">--}}
            {{--{!! Form::label('lato', 'Latitude:', ['class' => 'control-label']) !!}--}}
            {{--{!! Form::text('lato', isset($promo), ['class' => 'form-control', 'required']) !!}--}}
            {{--@if($errors->has('lato'))--}}
                {{--<span class="help-block">--}}
                    {{--<strong>{{ $errors->first('lat') }}</strong>--}}
                {{--</span>--}}
            {{--@endif--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div class="col-lg-6">--}}
        {{--<div class="form-group{{ $errors->has('lngo') ? ' has-error' : '' }}">--}}
            {{--{!! Form::label('lngo', 'Longitude:', ['class' => 'control-label']) !!}--}}
            {{--{!! Form::text('lngo',isset($promo) , ['class' => 'form-control ' , 'required']) !!}--}}
            {{--@if($errors->has('lngo'))--}}
                {{--<span class="help-block">--}}
                    {{--<strong>{{ $errors->first('lngo') }}</strong>--}}
                              {{--</span>--}}
            {{--@endif--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}




<div class="form-group{{ $errors->has('destination') ? ' has-error' : '' }}">
    {!! Form::label('destination', 'Drop off(destination):', ['class' => 'control-label']) !!}
    {!! Form::text('destination',isset($promo) && !is_null($promo) ? $promo->location->address : null, ['class' => 'form-control', 'required']) !!}
    @if($errors->has('destination'))
        <span class="help-block"><strong>{{ $errors->first('destination') }}</strong></span>
    @endif
    {{--<span>Always ensure the cordinates below are filled before submit</span>--}}
</div>
{{--<div class="row" >--}}
    {{--<div class="col-lg-6">--}}
        {{--<div class="form-group{{ $errors->has('latd') ? ' has-error' : '' }}">--}}
            {{--{!! Form::label('latd', 'Latitude:', ['class' => 'control-label']) !!}--}}
            {{--{!! Form::text('latd', isset($promo), ['class' => 'form-control', 'required']) !!}--}}
            {{--@if($errors->has('latd'))--}}
                {{--<span class="help-block">--}}
                    {{--<strong>{{ $errors->first('latd') }}</strong>--}}
                {{--</span>--}}
            {{--@endif--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div class="col-lg-6">--}}
        {{--<div class="form-group{{ $errors->has('lngd') ? ' has-error' : '' }}">--}}
            {{--{!! Form::label('lngd', 'Longitude:', ['class' => 'control-label']) !!}--}}
            {{--{!! Form::text('lngd',isset($promo) , ['class' => 'form-control ' , 'required']) !!}--}}
            {{--@if($errors->has('lngd'))--}}
                {{--<span class="help-block">--}}
                    {{--<strong>{{ $errors->first('lngd') }}</strong>--}}
                              {{--</span>--}}
            {{--@endif--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
<div class="form-group">
    <div class="row">
        <div class="col-md-12">
            {!! Form::submit($submitButtonText, ['class' => 'btn btn-success col-md-6']) !!}
        </div>
    </div>
</div>

