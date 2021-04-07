<html>

<head>
    <title>BEMS- @yield('title')</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css"
        rel="stylesheet">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
        integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous">
    </script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"
        integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous">
    </script>

    <style>
        .sidenav {
        height: 100%;
        width: 160px;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: #111;
        overflow-x: hidden;
        padding-top: 20px;
        }

        .sidenav a {
        padding: 6px 8px 6px 16px;
        text-decoration: none;
        font-size: 18px;
        color: #818181;
        display: block;
        }

        .sidenav a:hover {
        color: #f1f1f1;
        }
        body {
            background-color:  #ffffff;
            padding-top: 20px;
            padding-left: 20px;
        }

    </style>

</head>

<body>
    {{-- @section('sidebar')

    @show --}}
    <div class="sidenav">
        <a href="{{ route('employee.list') }}">Employees</a>
        <a href="{{ route('employee.archived') }}">Archive</a>
        <a href="{{ route('employee.log')}}">Activity Log</a>
      </div>

    <div class="container">
        @yield('content')
    </div>
   
</body>

</html>
