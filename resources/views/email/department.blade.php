<!DOCTYPE html>
<html>
    <head>
        <link href="{{ URL::asset('assets/resources/Semantic-UI/semantic.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ URL::asset('assets/css/app.css') }}" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="ui text container">
            <div class="ui padded segment">
                <hr>
                <hr>
                To Department of {{ ucwords($department) }},
                <br>
                <br>
                This email is sent through Recruit Mate Manager.<br>
                Please check the attachment(s) for record files.
                <hr>
                <hr>
            </div>
        </div>
    </body>
</html>
