<!DOCTYPE html>
<html lang="en">
<head>
    <title>Reliable Jet Demo</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <style>
        /* Remove the navbar's default margin-bottom and rounded borders */
        .navbar {
            margin-bottom: 0;
            border-radius: 0;
        }

        /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
        .row.content {height: 650px}

        /* Set gray background color and 100% height */
        .sidenav {
            padding-top: 20px;
            background-color: #f1f1f1;
            height: 100%;
        }

        /* Set black background color, white text and some padding */
        footer {
            background-color: #555;
            color: white;
            padding: 15px;
        }

        /* On small screens, set height to 'auto' for sidenav and grid */
        @media screen and (max-width: 767px) {
            .sidenav {
                height: auto;
                padding: 15px;
            }
            .row.content {height:auto;}
        }
    </style>
</head>
<body>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{url('databases')}}"><img src="{{url('images/logo.png')}}" height="35px"></a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li><a href="{{url('databases')}}">Home</a></li>
                <li class="active"><a href="{{url('statistics')}}">Statistics</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="https://salvatoremitrano.quickbase.com/"><span class="glyphicon glyphicon-log-in"></span> Go to the QuickBase Site</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid text-center">
    <div class="row content">
        <div class="col-sm-2 sidenav">
            Your Databases:
            @foreach($databases as $database)
                <p><a href="{{url('databases', $database['dbid'])}}">{{$database['dbname']}}</a></p>
            @endforeach
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                Create Database
            </button>
        </div>
        <div class="col-sm-10 text-left">
            <h1>Statistics</h1>
            <div class="col-sm-6 text-left">
                <div id="container" style="min-width: 250px; max-width:500px; height: 350px; margin: 0 auto;"></div>
            </div>
            <div class="col-sm-6 text-left">
                <div id="container2" style="min-width: 250px; max-width:500px; height: 350px; margin: 0 auto;"></div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{url('databases/create')}}" method="post">
                {!! csrf_field() !!}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Create New Database</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 form-control-label">Database Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputEmail3" placeholder="Name" name="name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 form-control-label">Database Description</label>
                        <div class="col-sm-10">
                            <textarea rows="3" class="form-control" id="inputPassword3" placeholder="Description" name="description"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" >Create</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>

    $(function () {
        $('#container').highcharts({
            chart: {
                type: 'areaspline'
            },
            title: {
                text: 'Average work completion during one week'
            },
            legend: {
                layout: 'vertical',
                align: 'left',
                verticalAlign: 'top',
                x: 150,
                y: 100,
                floating: true,
                borderWidth: 1,
                backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
            },
            xAxis: {
                categories: [
                    'Monday',
                    'Tuesday',
                    'Wednesday',
                    'Thursday',
                    'Friday',
                    'Saturday',
                    'Sunday'
                ],
                plotBands: [{ // visualize the weekend
                    from: 4.5,
                    to: 6.5,
                    color: 'rgba(68, 170, 213, .2)'
                }]
            },
            yAxis: {
                title: {
                    text: 'Fruit units'
                }
            },
            tooltip: {
                shared: true,
                valueSuffix: ' units'
            },
            credits: {
                enabled: false
            },
            plotOptions: {
                areaspline: {
                    fillOpacity: 0.5
                }
            },
            series: [{
                name: 'John',
                data: [3, 4, 3, 5, 4, 10, 12]
            }, {
                name: 'Jane',
                data: [1, 3, 4, 3, 3, 5, 4]
            }, {
                name: 'Joe',
                data: [1, 2, 4, 2, 5,7,3]
            }]
        });
    });

    $(function () {
        $('#container2').highcharts({
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Stacked bar chart'
            },
            xAxis: {
                categories: ['Jet 1', 'Jet 2', 'Jet 3', 'Jet 4', 'Jet 5']
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Total parts repaired'
                }
            },
            legend: {
                reversed: true
            },
            plotOptions: {
                series: {
                    stacking: 'normal'
                }
            },
            series: [{
                name: 'John',
                data: [5, 3, 4, 7, 2]
            }, {
                name: 'Jane',
                data: [2, 2, 3, 2, 1]
            }, {
                name: 'Joe',
                data: [3, 4, 4, 2, 5]
            }]
        });
    });

</script>

</body>
</html>