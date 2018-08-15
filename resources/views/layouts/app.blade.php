<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>

    <script src="{{ asset('js/bootstrap.min.js') }}"></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset("css/flatt.css") }}" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">



    <script type="text/javascript">
        function initAutocomplete() {
            // Create the autocomplete object, restricting the search to geographical
            // location types.
            autocomplete = new google.maps.places.Autocomplete(
               (document.getElementById('address')),
                {types: ['geocode']});


            autocomplete2 = new google.maps.places.Autocomplete(
                (document.getElementById('origin')),
                {types: ['geocode']});


            autocomplete3 = new google.maps.places.Autocomplete(
                (document.getElementById('destination')),
                {types: ['geocode']});

            // When the user selects an address from the dropdown, populate the address
            // fields in the form.
            autocomplete.addListener('place_changed', fillInAddress);
            autocomplete2.addListener('place_changed', OriginAdd);
            autocomplete3.addListener('place_changed', DestinationAdd);



        }

        function fillInAddress() {
            // Get the place details from the autocomplete object.
            var place = autocomplete.getPlace();
            document.getElementById('lat').value = place.geometry.location.lat().toFixed(6);
            document.getElementById('lng').value = place.geometry.location.lng().toFixed(6);

        }
        function OriginAdd() {
            // Get the place details from the autocomplete object.
            var place = autocomplete2.getPlace();

            document.getElementById('lato').value = place.geometry.location.lat().toFixed(6);
            document.getElementById('lngo').value = place.geometry.location.lng().toFixed(6);

        } function DestinationAdd() {
            // Get the place details from the autocomplete object.
            var place = autocomplete3.getPlace();


            document.getElementById('latd').value = place.geometry.location.lat().toFixed(6);
            document.getElementById('lngd').value = place.geometry.location.lng().toFixed(6);

        }
    </script>

</head>
<body>

    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @else
                            <a class="navbar-brand" href="{{ url('/challenge') }}">
                                The Challenge
                            </a>

                            <a class="navbar-brand" href="{{ url('/dashboard') }}">Dashboard</a>

                                    <a class="navbar-brand" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        @csrf
                                    </form>


                            @endguest
                    </ul>
                </div>
            </div>
        </nav>


        <div class="py-4 container">

            @if(Session::has('message'))
                <div class="alert alert-success background-success" style="width: 65%;">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="far fa-times-circle text-white"></i>x
                    </button>
                    {{ Session::get('message') }}
                </div>
            @elseif(Session::has('error'))
                <div class="alert alert-success background-danger"  style="width: 65%;">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="far fa-times-circle text-white"></i>x
                    </button>
                    {{ Session::get('error') }}
                </div>


            @elseif(Session::has('warning'))
                <div class="alert alert-success background-warning"  style="width: 65%;">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="far fa-times-circle text-white"></i>x
                    </button>
                    {{ Session::get('warning') }}
                </div>
            @endif

            @yield('content')




        </div>

    </div>

    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBHnFZwdY119wn-9japTETbV6f3imYsWkQ&libraries=places&callback=initAutocomplete" async defer></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>


</body>
</html>
