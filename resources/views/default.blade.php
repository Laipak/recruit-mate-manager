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
                @include('navigation')
            @endif
            <div class="ui main fluid container">
                <div class="ui one column container grid">
                    <div class="ui basic padded segment"></div>
                    @section('content')
                    @show
                </div>
                @if (Route::getCurrentRoute()->getName() != 'home')
                    <a id="setting-button" href="{{ route('setting') }}" class="ui huge blue circular icon button" data-content="Setting" data-variation="inverted" data-position="left center">
                        <i class="setting icon"></i>
                    </a>
                    {!! Form::open(['route' => 'post_logout']) !!}
                        <button id="logout-button" class="ui huge red circular icon button" data-content="Logout" data-variation="inverted" data-position="left center">
                            <i class="sign out icon"></i>
                        </button>
                    {!! Form::close() !!}
                @endif
            </div>
            @include('footer')
        </div>


        <script src="{{ URL::asset('assets/resources/Jquery/jquery-2.2.0.min.js') }}"></script>
        <script src="{{ URL::asset('assets/resources/Semantic-UI/semantic.min.js') }}"></script>
        <script src="{{ URL::asset('assets/js/app.js') }}"></script>
    </body>
</html>
