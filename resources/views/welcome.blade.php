<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }
            a {
                color: black;
                text-decoration:none;
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }

            .subtitle {
                font-size: 36px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <a href="{{url('/databases')}}">
                    <div class="title">Reliable Jet Demo</div>
                    <div class="subtitle">Click Here To Begin</div>
                </a>
            </div>
        </div>
    </body>
</html>
