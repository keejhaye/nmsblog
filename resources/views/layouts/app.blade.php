<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>NMSBLOG</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.0/css/font-awesome.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/nmsblog.css') }}">
    </head>
    <body>
         <!-- Fixed navbar -->
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ url('/') }}">NMSBLOG</a>
                </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                   <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><p class="navbar-text">Already have an account?</p></li>
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Login</b> <span class="caret"></span></a>
                            <ul id="login-dp" class="dropdown-menu keep-open-on-click">
                                <li>
                                     <div class="row">
                                            <div class="col-md-12">
                                                Login via
                                                <div class="social-buttons">
                                                    <a href="{{ url('/auth/google') }}" class="btn btn-primary social-login-btn social-google"><i class="fa fa-google-plus"> Google</i></a>
                                                </div>
                                                or
                                                 <form class="form" role="form" method="post" action="{{ route('login') }}" accept-charset="UTF-8" id="login-nav">
                                                         {{ csrf_field() }}
                                                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email address" required autofocus>

                                                            @if ($errors->has('email'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('email') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                        <div class="form-group">
                                                            <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>

                                                            @if ($errors->has('password'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('password') }}</strong>
                                                                </span>
                                                            @endif
                                                             <div class="help-block text-right"><a class="btn btn-link" href="{{ route('password.request') }}">Forgot Your Password?</a></div>
                                                        </div>
                                                        <div class="form-group">
                                                             <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                                                        </div>
                                                        <div class="checkbox">
                                                             <label>
                                                             <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                                             </label>
                                                        </div>
                                                 </form>
                                            </div>
                                            <div class="bottom text-center">
                                                New here ? <a href="{{ route('register') }}"><b>Join Us</b></a>
                                            </div>
                                     </div>
                                </li>
                            </ul>
                        </li>
                   @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div><!--/.nav-collapse -->
          </div>
        </nav>


        @yield('content')


        <hr>
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 item">
                        Copyright &copy; 2017 <b><a href="/" style="color: #fff">NMSBLOG</a></b>.
                        All rights reserved.
                        
                    </div>
                </div>
            </div>
        </footer>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script type="text/javascript">
            $(document).on('click', '.dropdown-menu', function(e) {
                if ($(this).hasClass('keep-open-on-click')) { e.stopPropagation(); }
            });
        </script>
    </body>
</html>


