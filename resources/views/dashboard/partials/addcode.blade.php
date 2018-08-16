<div class="form-group">

    {!! Form::label('value', 'Value of each code: ', ['class' => 'control-label']) !!}
    {!! Form::text('value', isset($promocode) && !is_null($promocode) ? $promocode->value : null, ['class' => 'form-control ' , 'required']) !!}

    @if($errors->has('value'))
        <span class="help-block">
                    <strong>{{ $errors->first('value') }}</strong>
                </span>
    @endif
</div>


<div class="form-group{{ $errors->has('dob') ? ' has-error' : '' }}">
    {!! Form::label('expirydate', 'Code Expiry date:', ['class' => 'control-label']) !!}
    {!! Form::text('expirydate',isset($promocode) && !is_null($promocode) ? $promocode->expirydate : null, ['class' => ' date form-control', 'required', 'id' => 'dobdatepicker']) !!}
    @if($errors->has('expirydate'))
        <span class="help-block">
      <strong>{{ $errors->first('expirydate') }}</strong></span>
    @endif
</div>
<div class="form-group">

    {!! Form::label('codenum', 'Number of Codes to generate', ['class' => 'control-label']) !!}
    {!! Form::text('codenum', isset($promocode) && !is_null($promocode) ? $promocode->codenum : null, ['class' => 'form-control ' , 'required']) !!}

    @if($errors->has('codenum'))
        <span class="help-block">
                    <strong>{{ $errors->first('codenum') }}</strong>
                </span>
    @endif
</div>
<div class="form-group">

    {!! Form::label('radius', 'Promo code usage radius (Meters)', ['class' => 'control-label']) !!}
    {!! Form::text('radius', isset($promo) && !is_null($promo) ? $promo->radius : null, ['class' => 'form-control ' , 'required']) !!}

    @if($errors->has('radius'))
        <span class="help-block">
                    <strong>{{ $errors->first('radius') }}</strong>
                </span>
    @endif
</div>


<div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
    {!! Form::label('address', 'Location:', ['class' => 'control-label']) !!}
    {!! Form::text('address',isset($promo) && !is_null($promo) ? $promo->location->address : null, ['class' => 'form-control', 'required']) !!}
    @if($errors->has('address'))
        <span class="help-block"><strong>{{ $errors->first('address') }}</strong></span>
    @endif
    <span>Always ensure the cordinates below are filled before submit</span>
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="form-group{{ $errors->has('latitude') ? ' has-error' : '' }}">
            {!! Form::label('lat', 'Latitude:', ['class' => 'control-label']) !!}
            {!! Form::text('lat', isset($promo), ['class' => 'form-control', 'required']) !!}
            @if($errors->has('lat'))
                <span class="help-block">
                    <strong>{{ $errors->first('lat') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group{{ $errors->has('lng') ? ' has-error' : '' }}">
            {!! Form::label('lng', 'Longitude:', ['class' => 'control-label']) !!}
            {!! Form::text('lng',isset($promo) , ['class' => 'form-control ' , 'required']) !!}
            @if($errors->has('lng'))
                <span class="help-block">
                    <strong>{{ $errors->first('lng') }}</strong>
                              </span>
            @endif
        </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
        <div class="col-md-12">
            {!! Form::submit($submitButtonText, ['class' => 'btn btn-danger col-md-6']) !!}
        </div>
    </div>
</div>

