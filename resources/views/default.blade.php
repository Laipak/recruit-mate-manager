<!DOCTYPE html>
<html>
    <head>
        <title>Recruit Mate Manager</title>

        <link href="{{ URL::asset('assets/resources/Semantic-UI/semantic.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ URL::asset('assets/css/app.css') }}" rel="stylesheet" type="text/css">
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


        <script src="{{ URL::asset('assets/resources/Jquery/jquery-2.2.0.min.js') }}"></script>
        <script src="{{ URL::asset('assets/resources/Semantic-UI/semantic.min.js') }}"></script>
        <script src="{{ URL::asset('assets/js/app.js') }}"></script>
    </body>
</html>
