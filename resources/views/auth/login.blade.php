<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Invoices</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
         <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{asset('vendor/bootstrap/css/metisMenu.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{asset('dist/css/sb-admin-2.css') }}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{asset('vendor/morrisjs/morris.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{asset('vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                       {{--  <a href="{{ route('login') }}">Login</a> --}}

                        {{-- @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif --}}
                    @endauth
                </div>
            @endif

            <div class="content">
                         <div class="login-box-body">


              <form method="post" action="{{ route('login') }}">
                 @csrf
                <div class="form-group has-feedback">
                  <input type="email" class="form-control form-color @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required name="username" placeholder="Email / username">
                  
                  <span class="glyphicon glyphicon-user form-control-feedback"></span>
                   @error('email')
                  <span class="invalid-feedback text-danger" role="alert" >
                      <strong><small>{{ $message }}</small></strong>
                  </span>
              @enderror
                </div>
                <div class="form-group has-feedback">
                  <input type="password" class="form-control form-color @error('password') is-invalid @enderror" required name="password" placeholder="Password">

                  <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                   @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="row">

                  <!-- /.col -->
                  <div class="col-xs-6 col-xs-offset-3">
                    <button type="submit" name="login" class="btn btn-success  btn-block btn-flat">Sign In</button>
                  </div>
               <!--<a href="#">I forgot my password</a>-->
                </div>
              </form>
              
              <hr>
              <div>

                <p>
                  <strong>Copyright &copy; {{ date('Y') }} <a href="javascript:void(0)" class="text-header">Invoice</a>.</strong>
                  <br>All rights reserved.</p>
              </div>
          </div>
            </div>
        </div>
    </body>
        <!-- jQuery -->
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>

</html>
