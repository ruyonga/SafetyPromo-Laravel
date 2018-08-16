@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-danger " style="color: white;"><h3>Warning</h3></div>

                    <div class="card-body">
                        @if(isset($error))
                         <p class="card-text"> {{ $error }}</p>
                         @else
                           <p class="card-text"> An error occured processing your request</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
