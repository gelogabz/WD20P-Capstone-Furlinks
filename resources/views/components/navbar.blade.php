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
    <link rel="icon" href="logo_web.ico" />
    <link rel="stylesheet" href="{{asset('build/assets/app.css')}}"/>
    <link rel="stylesheet" href="{{asset('build/assets/main.css')}}" />
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    
    <!--fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400&family=Poppins:wght@300;400&family=Quicksand:wght@300;400&display=swap" rel="stylesheet">
 
    <!--iconsfromgetbootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/b63f0cdae2.js" crossorigin="anonymous"></script>
    <style>

      
      .btn-primary:hover{
        /* background-color: #366495 !important; */
        background-color: #cfdeef !important;
        border-style: solid !important;
        border-color: #366495 !important;
        border-width: 1px !important;
        color:#366495;
       
        
      }
      .btn-dark:hover{
        /* background-color: #a77035 !important; */
        background-color: #eee7df !important;
        border-style: solid !important;
        border-color: #a77035 !important;
        border-width: 1px !important;
        color:#a77035;
        
      }
      
      
      
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light" style="padding-left: 5%; padding-right: 5%;padding-bottom:5px">
    {{-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button> --}}
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
      @guest
      <div class='d-flex'>
          @if (Route::has('login'))
          <div>
                <a class="btn btn-primary mx-1" 
                style="background-color: #5082B7;
                border-radius: 14px;
                border:none;
                font-family: 'Lato', sans-serif;
                padding-left: 15px;
                padding-right: 15px;
                transition: all 0.4s ;"
                
                role="button" href="{{ route('login') }}"><i class="bi bi-box-arrow-in-right"></i> Login</a>
          </div>
          @endif

          @if (Route::has('register'))
          <div>
                 <a class="btn btn-dark mx-1" 
                 style="background-color: #b78550;
                 border-radius: 14px;
                 border:none;
                 font-family: 'Lato', sans-serif;
                 transition: all 0.4s;"
                 
                 role="button" href="{{ route('register') }}"><i class="bi bi-person-add"></i> Register</a>
          </div>
          @endif
      </div>
      @else
      <ul class='list-unstyled mt-2'>
        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="/" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            <span>Welcome !<span> {{ Auth::user()->name }}
            {{-- <img class='propic1' src="{{asset('image/'.$userprofiles->profile_pic)}}">   --}}
          </a>
          <div style="background-color:#f0e8dc;" class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="/applications">
              <i class="bi bi-window-stack"></i> My Applications
            </a>
            <a class="dropdown-item" href="/dogsposted">
              <i class="bi bi-file-earmark-post"></i> Dogs Posted
            </a>
            <a class="dropdown-item" href="/dogsrehomed">
              <i class="bi bi-house-add-fill"></i>  Dogs Rehomed
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="/userprofile/{{Auth::user()->id}}">
              <i class="bi bi-person-fill"></i> My Profile
            </a>
            <a class="dropdown-item" href="/accountsetting">
              <i class="bi bi-gear-fill"></i> Settings
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{ route('logout') }}"
              onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
              <i class="bi bi-door-closed-fill"></i> {{ __('Logout') }}
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
  @yield ('content')
  @include('components/footer')
</body>
</html>