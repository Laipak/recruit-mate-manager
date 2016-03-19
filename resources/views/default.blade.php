<!DOCTYPE html>
<html>
    <head>
        <title>Recruit Mate Manager</title>
        <link rel="icon" href="favicon.ico" type="image/x-icon"> 
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"> 
        <link href="{{ asset('assets/resources/Semantic-UI/semantic.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div id="wrapper">
            @if (Route::getCurrentRoute()->getName() != 'home')
                @include('partials.navigation')
            @endif
            <div class="ui main fluid container">
                <div class="ui one column container grid">
                    <div class="ui basic padded segment"></div>
                    @section('content')
                    @show
                </div>
            </div>
            @include('partials.footer')
        </div>


        <script src="{{ asset('assets/resources/Jquery/jquery-2.2.0.min.js') }}"></script>
        <script src="{{ asset('assets/resources/Semantic-UI/semantic.min.js') }}"></script>
        <script src="{{ asset('assets/js/app.js') }}"></script>
    </body>
</html>
