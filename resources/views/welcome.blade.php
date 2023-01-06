@extends('components.navbar')
@section('content')
{{-- own css --}}
<link rel="stylesheet" href="{{asset('build/assets/main.css')}}">
{{-- own css --}}
<hr style="margin:0px 0px 5px 0px; padding:0px 0px 0px 0px; border-color:#ececec">
<div class="d-flex align-items-center justify-content-center">
  <div class="container" style="display:block; background-image: url({{asset('build/images/bgimage.jpg')}}); background-size:cover; border-radius: 15px; text-align: center; margin:20px; padding:25px; background-blend-mode:darken;">
    <h1 class="font-effect-outline fw-bold" style="color:#FFF; font-family:Quicksand;">Find you fur-fect match</h1>
    <form>  
        <div class="d-flex align-items-center justify-content-center" style="opacity:90%">
          <div class="d-flex form-row justify-content-left rounded-2 w-100"  style="background-color: #FFF;font-size:small">
          
            <div class="form-group col-sm-3 col-lg-3 col-md-3" style="vertical-align:middle; margin:auto; padding:3px;">
              <label style="padding-left:10%; padding-right:10%; font-family: 'Poppins'; font-size:21px; color:#413F42;" class="fw-bold mt-2"> Gender: </label>
                <select class="form-select form-select-sm mb-2 ms-2" id="gender" style="border:none; background-color:#FFF; font-family: 'Lato'; font-size:12pt;">
                  <option selected>Select</option>
                  <option>Male</option>
                  <option>Female</option>
                  <option>Any</option>
                </select>
            </div>
            <div class="form-group col-sm-3 col-lg-3 col-md-3" style="vertical-align:middle; margin:auto; padding:3px;">
              <label style="padding-left:15%; padding-right:10%; font-family: 'Poppins'; font-size:21px; color:#413F42;" class="fw-bold mt-2"> Size: </label>
                <select class="form-select form-select-sm mb-2" id="breed" style="border:none; background-color:#FFF; font-family: 'Lato'; font-size:12pt;">
                  <option selected>Select</option>
                      <option>Small breed</option>
                      <option>Medium-sized</option>
                      <option>Large breed</option>
                      <option>Any</option>
                </select>
            </div>
            <div class="form-group col-sm-3 col-lg-3 col-md-3" style="vertical-align:middle; margin:auto; padding:3px;">
              <label style="padding-left:10%; padding-right:10%; font-family: 'Poppins'; font-size:21px; color:#413F42;" class="fw-bold mt-2"> Color: </label>
                <select class="form-select form-select-sm mb-2" id="dogscolor" style="border:none; background-color:#FFF; font-family: 'Lato'; font-size:12pt;">
                  <option selected>Select</option>
                    <option>White</option>
                    <option>Black</option>
                    <option>Brown</option>
                    <option>Mixed</option>
                    <option>Any</option>
                </select>
            </div>
              
            <div class="form-group col-sm-1 col-lg-1 col-md-1" style="margin:0%; padding:0%;">
                <a href=/search typ e="button" class="btn btn-primary rounded-2 h-100" style="border-radius:0; letter-spacing:3px; font-family: 'Lato'; padding-top:7px; color:#FFF; background-color:#5082B7;">
                  <i class="fa-solid fa-magnifying-glass" style="padding-top:15px;"></i>SEARCH</a>
            </div>

          </div>  
        </div>
    </form>
  </div>
</div>

<div class="container-fluid" style="padding-left: 5%; padding-right: 5%;margin-bottom:1%">
  <h5 style="margin-top:1%; font-family: 'Poppins';">Recently posted dogs for adoption</h5>  

  <div class="row">
    @foreach($dogs as $dog)
      <div class="col-lg-3 col-md-6">
        <img src="{{'image/' . $dog->pic}}" class="image img-responsive" width="100%" style="padding:5%; padding-bottom:2%" />
        <p style="padding-left:5%;font-weight: 700; margin-bottom: 0px; margin-top:0px; font-family: 'Poppins';">{{$dog->gender}}, {{$dog->age_month}} month/s. old</p>
        <p style="padding-left:5%; margin-bottom: 0px; margin-top:0px; font-family: 'Lato';"><i>{{$dog->breed1_name}} , {{$dog->breed2_name}}</i></p>
        <p style="padding-left:5%;font-size: small; font-family: 'Lato';">Posted {{$dog->updated_at}}</p>
      </div>
    @endforeach
  </div>

<div class="container-fluid" style="background-color:#C8A279; text-align: center;v ertical-align: middle; opacity:90%">
  <a href="#Search" style="color: #F4F4F4"><p style="padding-top:1%;margin:0px"> How it works <br>
  <img src="{{asset('build/images/down.png') }}" style="height:10px;"/></p></a>
</div>

<div class="container-fluid" id="Search" style="background-color:#C8A279; margin:0px; height:100vh; opacity:90%">
  <div class="row">
      <div class="col-lg-6">
        <div class="center">
        <img src="{{asset('build/images/Search1.png') }}" style=" display: block; margin-top:10%;margin-bottom:10%; width:80%">
      </div>
      </div>
      <div class="col-lg-6" style="text-align:center;margin:auto;color:#F4F4F4">
        <h1 class="header">Search for a dog</h1>
          <p class="par" style="margin-top:2%; margin-bottom:5%">What type of dog would you like to adopt?<br> Think of what would match your<br> personality - like “small breed or toy<br>  
            dog” - and see what you find.
            </p>
          <button class="btn btn-primary2 my-sm-0">
            <p class="pt-2">EXPLORE</p>
          </button>
      </div> 
  </div>
</div>

<div class="container-fluid" style="background-color:#799FC8; margin:0px; height:100vh;">
  <div class="row">
      <div class="col-lg-6" style="text-align:center; margin:auto; color:#2963a1; padding-top:5%">
          <h1 class="header">Apply for adoption</h1>
          <p class="par" style="margin-top:2%;  margin-bottom:5%">Fill up and submit the adoption form. If you <br>are qualified, the dog rescuer/foster <br>parent will conduct an interview<br> 
            to finalize the adoption.
            </p>
          <button class="btn btn-primary2-1 my-sm-0">
            <p class="py-2">EXPLORE</p>
          </button>
      </div>
      <div class="col-lg-6">
        <div class="center">
        <img src="{{asset('build/images/Search2.png') }}" style=" display: block; margin-top:10%;margin-bottom:10%; width:80%">
      </div>
      </div>
</div> 
</div>

<div class="container-fluid" style="background-color:#799FC8; height:100vh;">
  <div class="row">
    <div class="col-lg-6 d-flex">
      <img src="{{asset('build/images/Search3.jpg') }}" style="width:100%">
    </div>
    <div class="col-lg-6" style="text-align:center; margin:auto; color:#5082B7">
          <h1 class="header" style="margin-top:2%">Share and invite</h1>
          <p class="par" style="margin-top:2%; margin-bottom:5%">Support the community by sharing <br> your experience and providing feedback <br> on rescuers and fosters. Encourage <br> family and friends to “adopt, not shop”.
            </p>
          <button class="btn btn-primary2 my-sm-0">
            <p class=" pt-2">EXPLORE</p>
          </button>
      </div>
    </div>
</div> 

<div id="signup"></div>
<div class="container-fluid" style="height:100vh;background-image:url({{asset('build/images/bgimage.png')}}); background-size:cover;background-color:#FFF">
  <div class="row">
      <div class="col col-lg-6 d-none d-lg-block">
        <div class="container" style="margin-top:50%;padding-left:20%;text-align:left;color:#FFF">
          <h1 class="header" style="font-size:50px">Sign up<br>to join<br>the community</h1>
    </div>
    </div>
    <div class="col col-lg-4 col-sm-12">
      <div class="container d-flex justify-content-center">
        <div class="logincont">
            <form class="rounder p-10 p-sm-2 pb-0"  target="_blank" action="https://formsubmit.co/07e3875514446ae967847acb0afca671" method="POST">
              <img src="{{asset('build/images/logo-color.png') }}" width="35px" style="display: block; margin:auto"></img>
              <h5 style="text-align:center;margin:2%">Welcome to Furlinks</h5>
              <br>
                  <div class="mb-3">
                    <label for="email"><b>Email</b></label>
                    <input type="text" name="email" class="form-control" placeholder="Enter email" required>
                  </div>
                  <div class="mb-3">
                    <label for="psw"><b>Password</b></label>
                    <input type="password" class="form-control" placeholder="Enter Password" name="psw" required>
                  </div>
                  <div class="mb-3">
                     <label for="psw-repeat"><b>Repeat Password</b></label>
                     <input type="password" class="form-control" placeholder="Repeat Password" name="psw-repeat" required>
                  </div>
<!--              <div class="form-check">
                    <label>
                      <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
                    </label>
                  </div>-->   
                  <div class="clearfix" style="margin-bottom: 0;padding-bottom: 0;">
                    <button class="btn btn-primary" type="submit" class="signupbtn" style="width:100%">Continue</button>
                  <p style="text-align:center;padding-top:5px">or</p>
                  <a class="btn btn-primary4 btn-md btn-block" style="background-color: #3b5998;text-align: left;padding-left: 60px;" href="#!" role="button">
                  <i class="fab fa-facebook-f me-2"></i><text style="font-size:14px;padding-left:10px;">Continue with Facebook</a> 
                  <a class="btn btn-primary4 btn-md btn-block" style="background-color: #dd4b39;text-align: left;padding-left: 60px;;" href="#!" role="button">
                  <i class="fab fa-google me-2"></i><text style="font-size:14px;padding-left:10px;"> Continue with Google</a>
                  <br>
                  <p style="font-size:small">By continuing, you agree to our <a href="#" style="color:dodgerblue">Terms of Service</a> and acknowledge that you have read our<a href="#" style="color:dodgerblue"> Privacy Policy</a>
                  <br><br>
                  Already a member? <a href="#" style="text-emphasis-style:bold;">Log In</p></a>                 
                </div>
            </form>
            </div>
          </div>  
   </div>
  </div>
</div>
@endsection


