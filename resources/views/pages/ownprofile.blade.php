@extends ('components.navbar')

@section('content')
<hr style="margin:0px 0px 5px 0px;padding:0px 0px 0px 0px;border-color:#ececec">

<div class="container-fluid d-flex justify-content-center" style="padding-left: 5%; padding-right: 5%; padding-top:0px;margin-bottom: 20px">
    <div class="row" style="width:100%; margin-top:0px; margin-bottom: 20px;">
      <!--Foster profile information -->
      <div class="col-lg-3 col-sm-6" style="padding-top:10px;padding-right:20px;padding-left: 20px;">
        <div class="border" style="border-radius:20px;padding:20px 20px 10px 20px">
            <div class="row" style="padding-bottom:5px">
                <div class="col col-auto" style="margin-right:px">
                    <img style="width:55px; border-radius:50%; padding: 2px" src="{{asset('build/images/profilepic/chef.jpg') }}">
                </div>
                <div class="col">
                    <div class="row" style="padding-top: 5px;padding-bottom: 5px;font-size:medium"><a href="profile.html"> @chefarnold </a></div>
                    <div class="row" style="font-size: small;color:gray;vertical-align: bottom;padding-right: 2px;">5.0  
                    <span style="padding-left:2px" class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>(20 reviews)
                    </div>
                </div>
            </div>
            <p style="font-size:13px;line-height:1.6; padding-top:15px">I am a chef who loves to take care of dogs and cats. During my free time, I go around our town to feed stray dogs. Some of my dogs are retired K9 and some are stray dogs that we rescued and took home.</p>
            <p style="font-size:15px;color:#581542"><i>More dogs posted by @chefarnold</i></p> 
            <div class="row" style="margin-bottom:15px">
                <div class="col col-sm-6 col-xs-4" style="margin-bottom:20px;margin-right: 0px;margin-left: 0px;">
                    <div class="containerimg" style="width:100%">
                        <img src="{{asset('build/images/searchres/fem0.jpg') }}" alt="Avatar" class="image" style="width:100%">
                        <div class="middle">
                        <div class="text"><a href='dogdetail.html'>View</a></div>
                        </div>
                    </div>
                </div>
                <div class="col col-sm-6 col-xs-4" style="margin-bottom:20px;margin-right: 0px;margin-left: 0px;">
                    <div class="containerimg" style="width:100%">
                        <img src="{{asset('build/images/dog4.jpg') }}" alt="Avatar" class="image" style="width:100%">
                        <div class="middle">
                        <div class="text"><a href='dogdetail.html'>View</a></div>
                        </div>
                    </div>
                </div>
                <div class="col col-sm-6 col-xs-4" style="margin-bottom:5px">
                    <div class="containerimg" style="width:100%">
                        <img src="{{asset('build/images/dog1.jpg') }}" alt="Avatar" class="image" style="width:100%">
                        <div class="middle">
                        <div class="text"><a href='dogdetail.html'>View</a></div>
                        </div>
                    </div>
                </div>
                <div class="col col-sm-6 col-xs-4" style="margin-bottom:5px">
                    <div class="containerimg" style="width:100%">
                        <img src="{{asset('build/images/searchres/fem3.jpg') }}" alt="Avatar" class="image" style="width:100%">
                        <div class="middle">
                        <div class="text"><a href='dogdetail.html'>View</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
        <!--Dog profile information -->
        <div class="col-lg-9 col-sm-6" style="padding-left:20px;padding-top:15px;margin-bottom: 20px;">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="#">Dogs Posted</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Dogs Rehomed</a>
                </li>
            </ul>
        </div>
  
    </div>
</div>

@endsection