@extends ('components.navbar')
@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<hr style="margin:0px 0px 5px 0px;padding:0px 0px 0px 0px;border-color:#ececec">

<div class="container-fluid d-flex justify-content-center" style="padding-left: 5%; padding-right: 5%; padding-top:0px;margin-bottom: 20px">
    <div class="row" style="width:100%; margin-top:0px; margin-bottom: 20px;">
      <!--Foster profile information -->
      <div class="col-lg-3 col-md-6 col-sm-12 mx-auto" style="padding-top:10px;padding-right:20px;padding-left: 20px;">
        <div class="border" style="border-radius:20px;padding:20px 20px 10px 20px">
            <div class="row" style="padding-bottom:5px">
                <div class="col col-auto" style="margin-right:px">
                    <img style="width:55px; border-radius:50%; padding: 2px" src="{{asset('build/images/profilepic/chef.jpg') }}">
                </div>
                <div class="col">
                    <div class="row" style="padding-top: 5px;padding-bottom: 5px;font-size:medium"><a href="profile.html"> @chefarnold </a></div>
                    <div class="row" style="font-size: small;color:gray;vertical-align: bottom;padding-right: 2px;"> 
                       
                   <span>5.0 <span class="fa fa-star checked"> <span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span></span></span>(20 reviews)
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
        <div class="col-lg-9 col-md-6 col-sm-12" style="padding-left:20px;padding-top:15px;margin-bottom: 20px;">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#dogposted">Dog Posted</a></li>
                <li><a data-toggle="tab" href="#dogrehomed">Dog Re-Homed</a></li>
              </ul>
              <div class="tab-content justify-content-center">
                <div id="dogposted" class="tab-pane fade in active ">
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                    @endif

                    <div class="card d-inline-flex m-4 border border-1">
                        <img src="..." class="card-img-top" alt="picture">
                        <div class="card pb-5" style="width: 25rem;">
                            <div class="card-body text-center pt-3 ">
                                <a href="/dogprofile/create" class="btn btn-primary mt-5">POST DOG</a>
                            </div>
                        </div>
                     </div>
                    @foreach($dogs as $dogsitem)
                    <div class="card d-inline-flex m-4 border">
                      <div class="card" style="width: 25rem;">
                       <img src="{{'image/' . $dogsitem->pic}}" class="card-img-top" alt="picture">
                          <div class="card-body">
                            <h3 class="card-title">{{$dogsitem->name}}</h3>
                            <h6 class="card-subtitle mb-2">{{$dogsitem->gender}}, {{$dogsitem->age_yr}}y and {{$dogsitem->age_month}}m</h6>
                            <h6 class="card-subtitle mb-2 text-muted">{{$dogsitem->breed1_name}} , {{$dogsitem->breed2_name}}</h6>
                           {{-- <h5 class="card-title">{{$dogsitem->gender}}, {{$dogsitem->age}} yrs old.</h5>
                           <h5 class="card-title">{{$dogsitem->breed_id1}},{{$dogsitem->breed_id2}}</h5> --}}
                          <a href="/pages/{{$dogsitem->id}}" class="btn btn-primary text-white">Show Details</a>
                          </div>
                      </div>
                   </div>
                   @endforeach
                   {{-- @endforeach --}}
                   
                    <div class="text-center mt-5">
                    {{-- {{$dogprofiles->links()}} --}}
                    </div>
                 
                </div>
                <div id="dogrehomed" class="tab-pane fade">
                  <h3>Menu 1</h3>
                  <p>Some content in menu 1.</p>
                </div>
              </div>
        </div>
    </div>
</div>



@endsection