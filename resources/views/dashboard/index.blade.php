    @extends('layouts.app')

    @section('content')
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-8">
                                  <div class="card border-warning" >
                                        <div class="card-header bg-warning text-white">Generat Codes</div>
                                            <div class="card-body ">
                                                <table class="table table-hover table-responsive" id="example">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Code</th>
                                                        <th>value</th>
                                                        <th>Event</th>
                                                        <th>status</th>
                                                        <th>Action</th>

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

                                                                <button type="button" class="btn {{ $code->active  ? "btn-success" : "btn-danger" }}"> {{ $code->active ? "Active": "Deactivated"}} </button>

                                                            </td>
                                                            <td>

                                                                <a href="{{ route('promotions', ['id' => $code->_id])}}" >Manage </a>

                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                            </div>
                             
                                    
                             
                          
                       
                        <div class="col-md-4">
                            <div class="card border-warning mb-3">
                                <div class="card-header bg-danger text-white">Generat Codes</div>
                                <div class="card-body ">
                                    {!! Form::open(['action' => ['DashboardController@store'], 'files' => true ]) !!}

                                    @include('dashboard.partials.addcode', ['submitButtonText' => 'Generate codes', 'is_edit' => false])

                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <script type="text/javascript">


                    function setStatusInputValueAndSubmitForm(val) {
                        console.log(val);
                        document.getElementById('input_status').setAttribute('value', val);
                        document.getElementById('status-form').submit();
                    }
                    $(document).ready(function(){

                        $('.date').datepicker({
                            format: 'mm-dd-yyyy'
                        });
                        $('#example').DataTable(); });

                </script>


    @stop

