<!doctype html>
<!--This is the master layout view.  The user and paras views are child view so this.  Using one stylesheet for all, plus
bootstrap, so that is listed here. Also common main title and footer.  -->

<html>
    <head>
        <title>@yield('title', 'Plan My Week')</title>
        <meta charset='utf-8'>

        <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <link href="/css/p4.css" type='text/css' rel='stylesheet'>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.min.js"></script>
        @yield('head')
    </head>
    <body>
        <h2>Plan My Week</h2>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/"><img
                        src='/images/planMyWeek100.png'
                        style='width:50px'
                        alt='Plan My Week Logo'>
                    </a>
                </div>
                <ul class="nav nav-pills">
                    <li role="presentation" class="active"><a href="/">Home</a></li>
                    @if(Auth::check())
                    <li role="presentation" class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Activities<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="/activities/show">Show Activities</a></li>
                            <li><a href="/activities/create">Create Activity</a></li>
                        </ul>
                    </li>
                    <li role="presentation" class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Schedules<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="/schedules/">Show Schedules</a></li>
                            <li><a href="/schedules/show/">Create Schedule</a></li>
                        </ul>
                    </li>
                    @endif
                    <li role="presentation"><a href="/logout">Logout</a></li>
                </ul>
            </div>
        </nav>
        @if(\Session::has('flash_message'))
        <div class="alert alert-success" role="alert">
            {{ \Session::get('flash_message') }}
        </div>
        @endif

        <section>
            @yield('content')
        </section>

        <footer>
            &copy; {{ date('Y') }}
        </footer>

        @yield('body')

    </body>
</html>
