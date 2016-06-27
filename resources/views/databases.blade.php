<!DOCTYPE html>
<html lang="en">
<head>
    <title>Reliable Jet Demo</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
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
                <li class="active"><a href="{{url('databases')}}">Home</a></li>
                <li><a href="{{url('statistics')}}">Statistics</a></li>
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
        <div class="col-sm-8 text-left">
            <h1>Welcome</h1>
            <p>The following Demo leverages the QuickBase API allowing to create and modify the data stored in Quickbase.</p>
            <hr>
            <h3>Databases:</h3>
            <table class="table">
                <thead class="thead-inverse">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>ID</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($databases as $index=>$database)
                <tr>
                    <th scope="row">{{$index + 1}}</th>
                    <td><a href="{{url('databases', $database['dbid'])}}">{{$database['dbname']}}</a></td>
                    <td>{{$database['dbid']}}</td>
                    <td><a href="databases/{{$database['dbid']}}/delete"><span class="glyphicon glyphicon-remove"></span></a></td>
                </tr>
                @endforeach
                </tbody>
            </table>
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


</body>
</html>