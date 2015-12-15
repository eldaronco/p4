<!doctype html>
<!--This is the master layout view.  The user and paras views are child view so this.  Using one stylesheet for all, plus
bootstrap, so that is listed here. Also common main title and footer.  -->

<html>
<head>
    <title>@yield('title', 'Plan My Week')</title>
    <meta charset='utf-8'>

    <link href="/css/bootstrap.min.css" type='text/css' rel='stylesheet'>
        <link href="/css/p4.css" type='text/css' rel='stylesheet'>

</head>
<body>
    @if(\Session::has('flash_message'))
    <div class='flash_message'>
        {{ \Session::get('flash_message') }}
    </div>
    @endif



    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
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
                <li role="presentation" class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Activities<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="/activities/show">View Activities</a></li>
                        <li><a href="/activities/create">Create Activity</a></li>
                    </ul>
                </li>
                <li role="presentation"><a href="#">Schedules</a></li>
                <li role="presentation"><a href="#">Logout</a></li>
            </ul>
        </div>
    </nav>
  <h1 class='main_title'>Plan My Week</h1>

    <section>
      @yield('content')
    </section>

  <footer>
    &copy; {{ date('Y') }}
  </footer>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <section>
    @yield('body')
  </section>
</body>
</html>