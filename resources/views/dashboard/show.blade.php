@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card mb-2">
                            <h3 class="card-header">{{$promo->name }}</h3>

                            <img style="height: 300px; width: 100%; display: block;" src="{{$map}}" alt="Event Venue">
                            <div class="card-body">
                                <h3 class="card-title">{{ $promo->location->address }}</h3>
                                <h4 class="card-subtitle text-muted">{{ date('F d, Y', strtotime($promo->promodate))}}</h4>
                            </div>
                            <div class="card-body">
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>

                            <div class="card-footer text-muted">
                                <button type="button" href="{{ route('createcodes', ['id' => $promo->_id])}}" class="btn btn-danger">Generate Promocodes</button>

                            </div>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="card text-white bg-warning mb-6" style="max-width: 60rem;">
                            <div class="card-header">Actions</div>
                            <div class="card-body">
                             <table class="table table-hover" id="code-table">
                                 <thead>
                                 <tr>
                                     <td>#</td>
                                     <td>Code</td>
                                     <td>value</td>
                                     <td>status</td>

                                 </tr>
                                 </thead>
                                 <tbody>
                                 @foreach($promo->promocodes as $key=>$codes)
                                 <tr>
                                     <td>
                                        {{ $key }}
                                     </td>
                                     <td>
                                         {{$cods->code}}
                                     </td>
                                 </tr>
                                     @endforeach
                                 </tbody>
                             </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

