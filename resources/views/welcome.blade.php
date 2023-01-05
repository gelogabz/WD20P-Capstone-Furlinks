@extends('components.navbar')
@section('content')
<hr style="margin:0px 0px 5px 0px;padding:0px 0px 0px 0px;border-color:#ececec">
<div class="d-flex align-items-center justify-content-center">
  <div class="container" style="display:block; background-image: url({{asset('build/images/bgimage.jpg')}}); background-size:cover; border-radius: 15px; text-align: center; margin:20px; padding:25px; background-blend-mode:darken;">
    <h1 class="font-effect-outline" style="color:#FFF">Find you fur-fect match
    </h1>
    <form>  
        <div class="d-flex align-items-center justify-content-center" style="opacity:90%">
          <div class="d-flex form-row justify-content-left rounded-2"  style="width: 90%; background-color: #FFF;font-size:small">
          
            <div class="form-group col-sm-2" style="vertical-align:middle;margin:auto;padding: 3px;">
              <label style="padding-left:10%; padding-right:4%;"> Gender: </label>
                <select class="form-select form-select-sm" id="Gender" style="border:none;background-color:#FFF;margin-left: 10px;">
                  <option selected>Select</option>
                  <option>Male</option>
                  <option>Female</option>
                  <option>Any</option>
                </select>
            </div>
            
            <div class="form-group col-sm-3" style="vertical-align:middle;margin:auto;padding: 3px;">
                  <label style="padding-left:10%;padding-right:0%;"> Age Bracket: </label>
                    <select class="form-select" id="age" style="border:none;background-color: #FFF">
                      <option selected>Select</option>
                      <option>Puppy 3-6 mos</option>
                      <option>Puppy 6-12 mos</option>
                      <option>Young 1-2 yrs</option>
                      <option>Adult 2 yrs & up</option>
                      <option>Any</option>
                    </select>
            </div>

            <div class="form-group col-sm-3" style="vertical-align:middle;margin:auto;padding: 3px;">
                  <label style="padding-left:10%;padding-right:1%"> Size: </label>
                    <select class="form-select form-select-sm" id="breed" style="border:none;background-color: #FFF" >
                      <option selected>Select</option>
                      <option>Small breed</option>
                      <option>Medium-sized</option>
                      <option>Large breed</option>
                      <option>Any</option>
                    </select>
            </div>

            <div class="form-group col-sm-2" style="vertical-align:middle;margin:auto;padding: 3px;">
                <label style="padding-left:10%;padding-right:10%"> Color: </label>
                  <select class="form-select form-select-sm" id="breed" style="border:none;background-color: #FFF" >
                    <option selected>Select</option>
                    <option>White</option>
                    <option>Black</option>
                    <option>Brown</option>
                    <option>Mixed</option>
                    <option>Any</option>
                  </select>
            </div>
              
            <div class="form-group col-sm-1" style="margin:0">
                <a href=/search typ e="button" class="btn btn-primary" style="border-radius:0; letter-spacing:1px; height:34px; padding-top:7px; color:#FFF">
                  <i class="fa-solid fa-magnifying-glass" style="padding-right:5px;"></i>SEARCH</a>
            </div>
          </div>  
        </div>
    </form>
  </div>
</div>

<div class="container-fluid" style="padding-left: 5%; padding-right: 5%;margin-bottom:1%">
  <h5 style="margin-top:1%">Recently posted dogs for adoption</h5>  
  @foreach($dogs as $dog)

      <div class="card d-inline-flex m-2">
          <div class="card" style="width:18rem;">
              <img src="{{ URL::asset($dog->pic) }}" class="card-img-top" alt="dog">
              <div class="card-body">
                  <h3 class="card-title">{{$dog->name}}</h3>
                  <h6 class="card-subtitle mb-2 text-muted">{{$dog->age}}</h6>
                  <h6 class="card-subtitle mb-2">{{$dog->breed1_name}}</h6>
                  <h6 class="card-subtitle mb-2">{{$dog->breed2_name}}</h6>
              </div>
          </div>
      </div>

  @endforeach
  <div class="row">
  {{--<div class="col-lg-3 col-md-6">
    <img src="{{asset('build/images/dog1.jpg') }}" class="image img-responsive" width="100%" style="padding:5%; padding-bottom:2%" />
    <p style="padding-left:5%;font-weight: 700; margin-bottom: 0px; margin-top:0px">Female, 2 mo. old
    <span style="float:right; padding-right: 7%;font-size: small">16 <i class="fa-regular fa-heart" style="font-size:large"></i></span>
    </p>
    <p style="padding-left:5%; margin-bottom: 0px; margin-top:0px"><i>Aspin</i></p>
    <p style="padding-left:5%;font-size: small">Posted 2m ago</p>
  </div>--}}
</div>




<div class="row">

  {{-- <div class="col-lg-3 col-md-6">
    <img src="{{asset('build/images/dog1.jpg') }}" class="image img-responsive" width="100%" style="padding:5%; padding-bottom:2%" />
    <p style="padding-left:5%;font-weight: 700; margin-bottom: 0px; margin-top:0px">Female, 2 mo. old
    <span style="float:right; padding-right: 7%;font-size: small">16 <i class="fa-regular fa-heart" style="font-size:large"></i></span>
    </p>
    <p style="padding-left:5%; margin-bottom: 0px; margin-top:0px"><i>Aspin</i></p>
    <p style="padding-left:5%;font-size: small">Posted 2m ago</p>
  </div>
  <div class="col-lg-3 col-md-6">
    <img src="{{asset('build/images/dog2.jpg') }}" class = "img-responsive" width = "100%" style="padding:5%; padding-bottom:2%" />
    <p style="padding-left:5%;font-weight: 700; margin-bottom: 0px; margin-top:0px">Male, 7+ yo
    <span style="float:right; padding-right: 7%;font-size: small">8 <i class="fa-regular fa-heart" style="font-size:large"></i></span>
    </p>
    <p style="padding-left:5%; margin-bottom: 0px; margin-top:0px"><i>German Shepherd</i></p>
    <p style="padding-left:5%;font-size: small">Posted 1h ago</p>
  </div>
  <div class="col-lg-3 col-md-6">
    <img src="{{asset('build/images/dog3.jpg') }}" class = "img-responsive" width = "100%" style="padding:5%; padding-bottom:2%" />
    <p style="padding-left:5%;font-weight: 700; margin-bottom: 0px; margin-top:0px">Male, 3+ yo
    <span style="float:right; padding-right: 7%;font-size: small"><i class="fa-regular fa-heart" style="font-size:large"></i></span>
    </p>
    <p style="padding-left:5%; margin-bottom: 0px; margin-top:0px"><i>Chow chow</i></p>
    <p style="padding-left:5%;font-size: small">Posted 5h ago</p>
  </div>
  <div class="col-lg-3 col-md-6">
    <img src="{{asset('build/images/dog4.jpg') }}" class = "img-responsive" width ="100%" style="padding:5%; padding-bottom:2%" />
    <p style="padding-left:5%;font-weight: 700; margin-bottom: 0px; margin-top:0px">Female, 3 mo. old
    <span style="float:right; padding-right: 7%;font-size: small">33 <i class="fa-regular fa-heart" style="font-size:large"></i></span>
    </p>
    <p style="padding-left:5%; margin-bottom: 0px; margin-top:0px"><i>Aspin</i></p>
    <p style="padding-left:5%;font-size: small">Posted 1d ago</p>
  </div>
  </div> --}}
</div>

<div class="container-fluid" style="background-color:#FFE38B;text-align: center;vertical-align: middle;">
  <a href="#Search"><p style="padding-top:1%;margin:0px"> How it works <br>
  <img src="{{asset('build/images/down.png') }}" style="height:10px;"/></p></a>
</div>

<div class="container-fluid" id="Search" style="background-color:#FFE38B; margin:0px; height:100vh;">
  <div class="row">
      <div class="col-lg-6">
        <div class="center">
        <img src="{{asset('build/images/Search1.png') }}" style=" display: block; margin-top:10%;margin-bottom:10%; width:80%">
      </div>
      </div>
      <div class="col-lg-6" style="text-align:center;margin:auto;color:#9A2373">
        <h1 class="header">Search for a dog</h1>
          <p class="par" style="margin-top:2%; margin-bottom:5%">What type of dog would you like to adopt?<br> Think of what would match your<br> personality - like “small breed or toy<br>  
            dog” - and see what you find.
            </p>
          <button class="btn btn-primary2 my-2 my-sm-0">EXPLORE</button>
      </div> 
  </div>
</div>

<div class="container-fluid" style="background-color:#D6DFF2; margin:0px; height:100vh;">
  <div class="row">
      <div class="col-lg-6" style="text-align:center;margin:auto;color:#172f67;padding-top:5%">
          <h1 class="header">Apply for adoption</h1>
          <p class="par" style="margin-top:2%;  margin-bottom:5%">Fill up and submit the adoption form. If you <br>are qualified, the dog rescuer/foster <br>parent will conduct an interview<br> 
            to finalize the adoption.
            </p>
          <button class="btn btn-primary2 my-2 my-sm-0">EXPLORE</button>
      </div>
      <div class="col-lg-6">
        <div class="center">
        <img src="{{asset('build/images/Search2.png') }}" style=" display: block; margin-top:10%;margin-bottom:10%; width:80%">
      </div>
      </div>
</div> 
</div>

<div class="container-fluid" style="background-color:#FDE7EF; height:100vh;">
  <div class="row">
    <div class="col-lg-6 d-flex">
      <img src="{{asset('build/images/Search3.jpg') }}" style="width:100%">
    </div>
    <div class="col-lg-6" style="text-align:center;margin:auto;color:#9A2373">
          <h1 class="header" style="margin-top:2%">Share and invite</h1>
          <p class="par" style="margin-top:2%; margin-bottom:5%">Support the community by sharing <br> your experience and providing feedback <br> on rescuers and fosters. Encourage <br> family and friends to “adopt, not shop”.
            </p>
          <button class="btn btn-primary2 my-2 my-sm-0">EXPLORE</button>
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


