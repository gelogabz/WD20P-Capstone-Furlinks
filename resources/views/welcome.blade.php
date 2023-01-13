@extends('components.navbar')
@section('content')
{{-- own css --}}
<link rel="stylesheet" href="{{asset('build/assets/main.css')}}">
{{-- own css --}}

<hr style="margin:0px 0px 5px 0px; padding:0px 0px 0px 0px; border-color:#ececec">

<div class="d-flex align-items-center justify-content-center">
  <div class="container" style="display:block; background-image: url({{asset('build/images/bgimage.jpg')}}); background-size:cover; border-radius: 15px; text-align: center; margin:20px; padding:25px; background-blend-mode:darken;">
    <h1 class="font-effect-outline fw-bold" style="color:#FFF; font-family:Quicksand;">Find you fur-fect match</h1>    
    <form action="{{route('search.index')}}" method="GET" role="search" style="width:100%; background-color: #F4F4F4; margin-top:3x; border-radius:5px; opacity:89%">
      {{ csrf_field() }}
        <div class="d-flex align-items-center justify-content-center">
          <div class="d-flex row form-row justify-content-left rounded-2 w-100 py-0"  style="background-color: #F4F4F4;font-size:small">
          
            <div class="form-group col col-md-4 col-sm-12 col-xs-12" style="vertical-align:middle; margin:auto; padding:3px;">
              <label style="font-family: 'Poppins'; font-size:18px; color:#413F42;" class="fw-bold my-2 ms-5"> Gender: </label>
                <select class="rounded-2 py-1 pe-5 mx-2" name="gender" id="gender" style="border:none; background-color:white; font-family: 'Lato'; font-size:12pt;">
                  <option value='' selected><i>Select</i></option>
                  <option value="1-Male">Male</option>
                  <option value="2-Female">Female</option>
                 </select>
            </div>
            <div class="form-group col col-md-3 col-sm-12 col-xs-12" style="vertical-align:middle; margin:auto; padding:3px;">
              <label style="font-family: 'Poppins'; font-size:18px; color:#413F42;" class="fw-bold my-2 ms-5"> Size: </label>
                <select class="rounded-2 py-1 pe-3 mx-2" name="size" id="size" style="border:none; background-color:white; font-family: 'Lato'; font-size:12pt;">
                  <option value='' selected><i>Select</i></option>
                  <option value="Small">Small breed</option>
                  <option value="Medium">Medium-sized breed</option>
                  <option value="Large">Large breed</option>
                </select>
            </div>
            <div class="form-group col col-md-3 col-sm-12 col-xs-12" style="vertical-align:middle; margin:auto; padding:3px;">
              <label style="font-family: 'Poppins'; font-size:18px; color:#413F42;" class="fw-bold my-2"> Color: </label>
                <select class="rounded-2 py-1 pe-5 mx-2" name="color" id="color" style="border:none; background-color:white; font-family: 'Lato'; font-size:12pt;">
                  <option value='' selected>Select</option>
                  <option value="Black">Black</option>
                  <option value="Brown">Brown</option>
                  <option value="White">White</option>
                  <option value="Gray">Gray</option>
                  <option value="Mixed">Mixed</option>
                  <option value="Dotted">Dotted</option>
                  <option value="Brindled">Brindled</option>
                </select>
            </div>
            <div class="form-group col col-md-1 col-sm-12 col-xs-12">
              <input type="submit" value="SEARCH" class="btn rounded-2 border-0 h-100 " style="float:end; letter-spacing:3px; font-family: 'Lato'; color:#FFF; background-color:#5082B7;">
              {{-- <input type="submit" name="search" role=search id="search" value="SEARCH" class="btn btn-primary rounded-2 h-100" style="border-radius:0; letter-spacing:3px; font-family: 'Lato'; padding-top:7px; color:#FFF; background-color:#5082B7;"/> --}}
                  {{-- <i class="fa-solid fa-magnifying-glass" style="padding-top:15px;"></i> --}}
            </div>
          </div>  
        </div>
    </form>
  </div>
</div>

<div class="container-fluid" style="padding-left:5%; padding-right:5%; margin-bottom:1%;">
  <h5 style="margin-top:1%; font-family: 'Poppins';">Recently posted dogs for adoption</h5>  
  <div class="row">
    @foreach($dogs as $dog)
      <div class="col-lg-3 col-md-6 px-4">
        <div class="containerimg" style="width:100%">
          <img src="{{'image/' . $dog->pic}}" class="image img-responsive" width="100%" style="padding:5%; padding-bottom:2%" />
          <div class="middle">
            <a class="text" href="pages/{{$dog->id}}" style="text-decoration:none;">View More</a>
          </div>
        </div>
        <p style="padding-left:7%; font-weight: 700; margin-bottom: 0px; margin-top:0px; font-family: 'Poppins'; color:#413F42;">{{($dog->gender=="1-Male")? "Male" : "Female" }}, {{$dog->age_month}}mo. old</p>
        <p style="padding-left:7%; margin-bottom: 0px; margin-top:0px; font-family: 'Lato'; color:#413F42; font-weight:500;"><i>{{$dog->breed1_name}} , {{$dog->breed2_name}}</i></p>
        <p style="padding-left:7%; font-size: small; font-family: 'Lato'; color:#413F42; font-weight:300; margin-bottom:0px">Posted 
          {{ Carbon\Carbon::parse($dog->created_at)->diffForHumans()}} 
          
        </p>
      </div>
    @endforeach
  </div>
</div>

  <div class="container-fluid px-0" style="padding-top:5px; padding-bottom:20px; background-color:#f0e8dc; text-align: center; vertical-align: middle; opacity:90%">
    <a href="#learn" style="font-family: 'Lato'; font-size:12pt; color: #040404; text-decoration:none"> Learn more
    <img src="{{asset('build/images/down.gif')}}" style="padding-left:10px;height:15px;"/></a>
  </div>

<div class="container-fluid px-0">
  <div id="welcomecarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#welcomecarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#welcomecarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#welcomecarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active" data-bs-interval="2000">
        <div class="container-fluid" id="learn" style="background-color:#C8A279; height:100vh; opacity:90%">
          <div class="row">
            <div class="col-lg-6 order-md-2" style="text-align:center; margin:auto; color:#fffefe; padding:30px">
              <h1 class="header" style="font-family:Quicksand;">Search for a dog</h1>
              <p class="par" style="margin-top:4%; margin-bottom:5%; font-family: 'Poppins'; line-height:2">
                What type of dog would you like to adopt?<br> 
                Think of what would match your personality <br> 
                - like “small breed or toydog” - <br> 
                and see what you find.<br><br> 
                With the hundreds of dogs needing <br> 
                a new home, we're sure you will be able to<br> 
                find the right match.</p>
                <a href="/search" class="btn viewapp_btn" style="border-radius:20px">FIND MY MATCH</a>
              </p>
            </div> 
            <div class="col-lg-6">
              <img src="{{asset('build/images/Search1.png') }}" style="width:80%; padding-top:10%">
            </div>
          </div>
        </div>
      </div>

      <div class="carousel-item" data-bs-interval="2000">
        <div class="container-fluid" style="background-color:#799FC8; margin:0px; height:100vh; opacity:90%">
          <div class="row">
              <div class="col-lg-6" style="text-align:center; margin:auto; color:#082442; padding:30px;font-weight:500">
              <h1 class="header" style="font-family:Quicksand;">Apply for adoption</h1>
              <p class="par" style="margin-top:4%; margin-bottom:5%;font-family: 'Poppins'; line-height:2">
                Apply to adopt a dog with just <br> 
                a click of a button, it's that easy!<br><br> 
                Your profile and pet informatoin <br> 
                is stored safely as it awaits <br> 
                the time when you find the dog that <br> 
                brings a spark of joy to your heart.</p>
                <a href="#welcomepart" class="btn explore_btn" style="border-radius:20px;">REGISTER NOW</a>
              </div>
              <div class="col-lg-6">
                <img src="{{asset('build/images/Search2.png') }}" style="display:block; width:75%; margin:auto; padding-top:10%">
              </div>
          </div> 
        </div>
      </div>
      <div class="carousel-item" data-bs-interval="2000">
        <div class="container-fluid" style="background-color:#B78550; height:100vh; opacity:90%">
          <div class="row">
            <div class="col-lg-6 order-md-2" style="text-align:center; margin:auto; color:#fffefe; padding:30px">
              <h1 class="header" style="font-family:Quicksand;">Share and invite</h1>
              <p class="par" style="margin-top:4%; margin-bottom:5%; font-family: 'Poppins'; line-height:2">
                Support the community by sharing <br> 
                your experience here, especially <br> 
                if you were able to successfully adopt <br>
                or help a dog find a fur-ever home.<br><br>
                In that way, we can all encourage  <br> 
                our family and friends to “adopt, not shop”<br>
                </p>
                <a href="#welcomepart" class="btn viewapp_btn" style="border-radius:20px;width:230px">JOIN THE COMMUNITY</a>
            </div>
            <div class="col-lg-6">
              <img src="{{asset('build/images/Search3.jpg') }}" style="width:100%">
            </div>
          </div>
        </div> 
      </div>
    </div>
  </div>
</div>

{{-- 
  <div class="container-fluid" id="Search" style="background-color:#C8A279; height:100vh; opacity:90%">
    <div class="row">
        <div class="col-lg-6">
          <div class="center">
          <img src="{{asset('build/images/Search1.png') }}" style="display: block; width:80%" class="mt-5">
        </div>
        </div>
        <div class="col-lg-6" style="text-align:center;margin:auto;color:#F4F4F4">
          <h1 class="header" style="font-family:Quicksand;">Search for a dog</h1>
            <p class="par" style="margin-top:2%; margin-bottom:5%; font-family: 'Poppins';">What type of dog would you like to adopt?<br> Think of what would match your<br> personality - like “small breed or toy<br>  
            dog” - and see what you find.</p>
        </div> 
    </div>
  </div>
  <div class="container-fluid" style="background-color:#799FC8; margin:0px; height:100vh; opacity:90%">
    <div class="row">
        <div class="col-lg-6" style="text-align:center; margin:auto; color:#103965; padding-top:5%">
            <h1 class="header" style="font-family:Quicksand;">Apply for adoption</h1>
            <p class="par" style="margin-top:2%; font-family: 'Poppins'; margin-bottom:5%">Fill up and submit the adoption form. If you <br>are qualified, the dog rescuer/foster <br>parent will conduct an interview<br> 
              to finalize the adoption.</p>
        </div>
        <div class="col-lg-6">
          <div class="center">
          <img src="{{asset('build/images/Search2.png') }}" style="display:block; width:80%" class="mt-5">
        </div>
        </div>
    </div> 
  </div>

  <div class="container-fluid" style="background-color:#B78550; height:100vh; opacity:90%">
    <div class="row">
      <div class="col-lg-6 d-flex">
        <img src="{{asset('build/images/Search3.jpg') }}" style="width:90%" class="mt-4 mb-2">
      </div>
      <div class="col-lg-6" style="text-align:center; margin:auto; color:#F4F4F4">
            <h1 class="header" style="margin-top:2%; font-family:Quicksand;">Share and invite</h1>
            <p class="par" style="margin-top:2%; font-family: 'Poppins'; margin-bottom:5%">Support the community by sharing <br> your experience and providing feedback <br> on rescuers and fosters. Encourage <br> family and friends to “adopt, not shop”.</p>
        </div>
      </div>
  </div>  --}}

</div>
<div>
  <div class="container-fluid" id="welcomepart" style="height:115vh; background-image:url({{asset('build/images/bgimage.png')}}); background-size:cover; background-color:#FFF">
    <div class="row">
        <div class="col col-lg-6 d-none d-lg-block">
          <div class="container" style="margin-top:50%; padding-left:20%; text-align:left; color:#F4F4F4; opacity:80%">
            <h1 class="header" style=" font-family:Quicksand; font-size:50px">Sign up <br> to join <br> the community</h1>
          </div>
        </div>
      <div class="col col-lg-4 col-sm-12">
        <div class="container d-flex justify-content-center">
          <div class="logincont">
              <form class="rounder p-10 p-sm-2 pb-0"  target="_blank" action="https://formsubmit.co/07e3875514446ae967847acb0afca671" method="POST">
                <img src="{{asset('build/images/logo-color.png') }}" width="120px" style="display: block; margin:auto"/>
                <h5 style="text-align:center; margin-top:5%; margin-bottom:5%; font-family: 'Poppins';">Welcome to Furlinks</h5>
                <div class="mb-3">
                  <label for="email" style="font-family: 'Lato'; letter-spacing:1px;"><b>Email:</b></label>
                  <input type="text" name="email" class="form-control" placeholder="Enter email" required>
                </div>
                <div class="mb-3">
                  <label for="psw" style="font-family: 'Lato'; letter-spacing:1px;"><b>Password:</b></label>
                  <input type="password" class="form-control" placeholder="Enter Password" name="psw" required>
                </div>
                <div class="mb-3">
                  <label for="psw-repeat" style="font-family: 'Lato'; letter-spacing:1px;"><b>Repeat Password:</b></label>
                  <input type="password" class="form-control" placeholder="Repeat Password" name="psw-repeat" required>
                </div>
                <!--<div class="form-check">
                      <label>
                        <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
                      </label>
                    </div>-->   
                <div class="clearfix" style="margin-bottom:0; padding-bottom:0;">
                  <button class="btn signupbtn" type="submit" style="width:100%; font-family: 'Poppins'; letter-spacing:1px;">Continue</button>
                  <p style="text-align:center; padding-top:6px" class="fw-bold">or</p>
                  <a class="btn btn-primary4 btn-md btn-block w-100" style="background-color:#3b5998; text-align:center; font-family: Lato;" href="#!" role="button">
                    <i class="fab fa-facebook-f me-2"></i>Connect with Facebook
                  </a> 
                  <a class="btn btn-primary4 btn-md btn-block w-100 mt-2 mb-4" style="background-color: #dd4b39; text-align:center; font-family: Lato;" href="#!" role="button">
                    <i class="fab fa-google me-2"></i>Continue with Google
                  </a>
                  <br>
                  <p style="font-size:small; font-family:Lato">By continuing, you agree to our 
                    <a href="#" style="color:#885b2a" class="fw-bold">Terms of Service</a> and acknowledge that you have read our 
                    <a href="#" style="color:#885b2a" class="fw-bold">Privacy Policy</a>
                    <br><br><b>Already a member?</b> 
                    <a href="/login" style="color:#885b2a; text-decoration: none;font-weight:700" class="fw-bold">Login here.</p></a>                 
                </div>
              </form>
          </div>
        </div>  
     </div>
    </div>
  </div>
</div>
@endsection


