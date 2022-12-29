<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <title>Furlinks</title>
    <link rel="stylesheet" href="{{URL::asset('build/assets/app.css')}}" />
    <link rel="stylesheet" href="{{ URL::asset('build/assets/main.css')}}" />
    <script src="https://kit.fontawesome.com/b63f0cdae2.js" crossorigin="anonymous"></script>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light" style="padding-left: 5%; padding-right: 5%;padding-bottom:5px">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="/" style="color:#811D60"><img src="{{asset('build/images/logo-color.png') }}" width="80px" style="padding-right:10px;vertical-align:middle"/></a>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="/about">About Us</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/how">How It Works</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/search">Find a Dog</a>
        </li>
      </ul>
    </div>
    <div>
      {{-- <span style="padding:5px"></span>
      <a class="btn btn-primary my-2 my-sm-0" id="myBtn" role="button" href="/login">Log In</a>
      <span style="padding:5px"></span>
      <a class="btn btn btn-outline-primary my-2 my-sm-0 login-btn" id="myBtn3" type="button" href="/register">Sign Up</a>
      --}}<ul>
      @guest
          @if (Route::has('login'))
              <li class="nav-item btn btn-primary my-2 my-sm-0" id="myBtn" role="button">
                  <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
              </li>
          @endif

          @if (Route::has('register'))
              <li class="nav-item btn btn btn-outline-primary my-2 my-sm-0 login-btn" id="myBtn3" type="button">
                  <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
              </li>
          @endif
        </ul>
      @else
      <ul class='list-unstyled'>
          <li class="nav-item dropdown">
               <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                <span>Welcome !<span> {{ Auth::user()->name }}
              </a>

              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>
              </div>
          </li>
        </ul>
        @endguest
                      
    </div>  
  </nav>

  <!-- INCLUDE MODAL FORM-->

  {{-- <script>
    $(document).ready(function(){
      $("#myBtn").click(function(){
        $("#myModal").modal();
      });
    });
    $(document).ready(function(){
      $("#myBtn2").click(function(){
        $("#myModal").modal('hide');
        $("#signupmodal").modal();
      });
    });
    $(document).ready(function(){
      $("#myBtn1").click(function(){
        $("#signupmodal").modal('hide');
        $("#myModal").modal();
      });
    });
    $(document).ready(function(){
      $("#myBtn3").click(function(){
        $("#signupmodal").modal();
      });
    });
  </script> --}}
  {{-- <div class="container justify-content-center"> --}}
  {{-- @include ('components/modal') --}}
  {{-- </div> --}}

  @yield ('content')
<br><br><br><br><br><br><br><br>
  @include('components/footer')
</body>
</html>