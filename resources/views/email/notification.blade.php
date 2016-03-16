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
                Dear {{ $applicant->name }},
                <br>
                <br>
                Thanks for submitting the form to us using Recruit Mate App, <br>
                we're here to notify you that your form has been sent to the respctive departments and will be processed soon !
                <br>
                <br>
                <br>
                Thanks again and we'll get to you soon.
                <hr>
                <hr>
            </div>
        </div>
    </body>
</html>
