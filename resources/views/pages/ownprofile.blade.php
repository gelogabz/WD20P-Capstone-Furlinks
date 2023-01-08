@extends ('components.navbar')
@section('content')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> --}}

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

                    <div class="row" style="padding-top: 5px;padding-bottom: 5px;font-size:medium"><a href="profile.html"><span>@</span>{{ Auth::user()->name }}</a></div>

                    <div class="row" style="font-size: small;color:gray;vertical-align: bottom;padding-right: 2px;"> 
                       
                   <span>5.0 <span class="fa fa-star checked"> <span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span></span></span>(20 reviews)
                    </div>
                </div>
            </div>
            <p style="font-size:13px;line-height:1.6; padding-top:15px">I am a chef who loves to take care of dogs and cats. During my free time, I go around our town to feed stray dogs. Some of my dogs are retired K9 and some are stray dogs that we rescued and took home.</p>

            <p style="font-size:15px;color:#581542"><i>More dogs posted by <span>@</span>{{ Auth::user()->name }}</i></p>

            <div class="row" style="margin-bottom:15px">
                @foreach($dogs as $dogsitem)
                <div class="col col-sm-6 col-xs-4" style="margin-bottom:20px;margin-right: 0px;margin-left: 0px;">
                    <div class="containerimg" style="width:100%">
                        <img src="{{'image/' . $dogsitem->pic}}" alt="Avatar" class="image" style="width:100%;">
                        <div class="middle">
                        <div class="text"><a href="/dogprofile/{{$dogsitem->id}}">View</a></div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
      </div>
        <!--Dog profile information -->
        <div class="col-lg-9 col-md-6 col-sm-12" style="padding-left:20px;padding-top:15px;margin-bottom: 20px;">
            <div class="container-fluid" style="width:100%;margin-top:0px;padding-top:0px">
                <div class="d-flex mt-3">
                    <ul class="nav nav-tabs flex-grow-1 flex-nowrap" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Dog Posted</a></li>
                        <li>
                            <a class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Dog Re-Homed</a></li>
                    </ul>
                        <span class="ml-auto text-nowrap border border-top-0 border-left-0 border-right-0 border-bottom-0" style="padding: bottom 5px;">
                            <a class="btn btn-primary2" href="/dogprofile/create" type="button" style="float:center;vertical-align: bottom;text-align: center;padding-top:5px">
                                <i class="fa-regular fa-pen-to-square" style="font-size:medium;padding-right:10px;padding-top:4px"></i>POST DOG</a>
                </div>
            </div>

              <div class="tab-content justify-content-center" id="myTabContent">
                <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                    @endif
                 @foreach($dogs as $dogsitem)
                    <div class="card d-inline-flex m-4 border">
                      <div class="card" style="width: 25rem;">
                       <img src="{{'image/' . $dogsitem->pic}}" class="card-img-top" alt="picture">
                          <div class="card-body">
                            <h3 class="card-title">{{$dogsitem->name}}</h3>
                            <h6 class="card-subtitle mb-2">{{$dogsitem->gender}}, {{$dogsitem->age_yr}}y and {{$dogsitem->age_month}}m</h6>
                            <h6 class="card-subtitle mb-2 text-muted">{{$dogsitem->breed1_name}} , {{$dogsitem->breed2_name}}</h6>
                            <h6 class="card-subtitle mb-2 text-muted"> {{$dogsitem->status_name}}</h6>
                           {{-- <h5 class="card-title">{{$dogsitem->gender}}, {{$dogsitem->age}} yrs old.</h5>
                           <h5 class="card-title">{{$dogsitem->breed_id1}},{{$dogsitem->breed_id2}}</h5> --}}
                          <a href="/dogprofile/{{$dogsitem->id}}" class="btn btn-primary text-white">Show Details</a>
                          </div>
                      </div>
                   </div>
                   @endforeach
                   {{-- @endforeach --}}
                    <div class="text-center mt-5">
                    {{$dogs->links()}}
                    </div>
                </div>
                <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                  <h3>Menu 1</h3>
                  <p>Some content in menu 1.</p>
                </div>
              </div>
        </div>
    </div>
</div>



@endsection