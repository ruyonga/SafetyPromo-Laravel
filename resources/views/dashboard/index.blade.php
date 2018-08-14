@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-8">
                        <table class="table table-hover" id="code-table">
                            <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Code</th>
                                <th>value</th>
                                <th>Event</th>
                                <th>Exp date</th>
                                <th>Exp state</th>
                                <th>status</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($codes as $key=>$code)
                                <tr>
                                    <td>
                                        {{ $key }}
                                    </td>
                                    <td>
                                        <b>{{$code->code}}</b>
                                    </td>
                                    <td>
                                        {{$code->value}}
                                    </td>
                                    <td>{{ $code->event->address }}</td>
                                    <td>
                                        {{ date('F d, Y', strtotime($code->expirydate))}}
                                    </td>
                                    <td>
                                        @if(\Carbon\Carbon::now()->gt($code->expirydate))
                                            Expired  <span class="badge badge-danger">exp</span>
                                        @else
                                            {{--Whats the opposite of expired? Normal? Okay? Works?--}}
                                            Not expired <span class="badge badge-success">Ok</span>

                                        @endif
                                    </td>
                                    <td>

                                        <div class="btn-group" role="group"
                                             aria-label="Button group with nested dropdown">
                                            <button type="button"
                                                    class="btn {{ $code->active  ? "btn-success" : "btn-danger" }}"> {{$code->code? "Active": "Deactivated"}} </button>
                                            <div class="btn-group" role="group">
                                                <button id="btnGroupDrop1" type="button"
                                                        class="btn {{ $code->active  ? "btn-success" : "btn-danger" }}  dropdown-toggle"
                                                        data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false"></button>
                                                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                    <a class="dropdown-item" href="#"
                                                       onclick="event.preventDefault(); setStatusInputValueAndSubmitForm('true');">Activate</a>
                                                    <a class="dropdown-item" href="#"
                                                       onclick="event.preventDefault(); setStatusInputValueAndSubmitForm('false');">Deactivate</a>
                                                </div>
                                            </div><div style="display: none;">
                                                {!! Form::open(['method' => 'PATCH', 'action' => ['DashboardController@updateStatus', $code->_id], 'id' => 'status-form']) !!}
                                                {{ csrf_field() }}
                                                {{ Form::hidden('new_status', null, ['id' => 'input_status']) }}
                                                {!! Form::close() !!}
                                            </div>

                                        </div>


                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>


                    </div>
                    <div class="col-md-4">
                        <div class="card border-warning mb-3">
                            <div class="card-header bg-warning text-white">Create an Event</div>
                            <div class="card-body ">
                                {!! Form::open(['action' => ['DashboardController@store'], 'files' => true ]) !!}

                                @include('dashboard.partials.addcode', ['submitButtonText' => 'Generate codes', 'is_edit' => false])

                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('scripts')
    <script type="text/javascript">

        $(document).ready(function () {
            $('#code-table').DataTable();
        });


        function setStatusInputValueAndSubmitForm(val) {
            document.getElementById('input_status').setAttribute('value', val);
            document.getElementById('status-form').submit();
        }

    </script>

@stop

