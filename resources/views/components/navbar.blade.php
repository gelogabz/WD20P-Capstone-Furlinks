<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
      <span style="padding:5px"></span>
      <a class="btn btn-primary my-2 my-sm-0" id="myBtn" role="button" data-bs-toggle="modal" data-bs-target="#myModal" href="/login">Log In</a>
      <span style="padding:5px"></span>
      <a class="btn btn btn-outline-primary my-2 my-sm-0 login-btn" id="myBtn3" type="button" href="/register">Sign Up</a>
    </div>  
  </nav>

  <!-- INCLUDE MODAL FORM-->

  <script>
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
  </script>
  {{-- <div class="container justify-content-center"> --}}
  @include ('components/modal')
  {{-- </div> --}}

  @yield ('content')
<br><br><br><br><br><br><br><br>
  @include('components/footer')
</body>
</html>