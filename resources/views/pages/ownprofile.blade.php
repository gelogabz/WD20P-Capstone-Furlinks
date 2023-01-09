@extends ('components.navbar')
@section('content')

{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script> --}}

{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> --}}
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> --}}
{{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}

<hr style="margin:0px 0px 5px 0px;padding:0px 0px 0px 0px;border-color:#ececec">

<div class="container-fluid d-flex justify-content-center" style="padding-left: 5%; padding-right: 5%; padding-top:0px;margin-bottom: 20px">
    <div class="row" style="width:100%;  margin-bottom: 20px;">
        <div class="row" style="width:100%;margin-top:20px">
            <h3>My Dogs
            <span class="ml-auto text-nowrap" style="padding: bottom 5px;">   
            <a class="btn btn-primary" href="/dogprofile/create" type="button" style="float:right;vertical-align: bottom;text-align: center;padding-top:5px">
                <i class="fa-regular fa-pen-to-square" style="font-size:medium;padding-right:10px;padding-top:4px"></i>
                POST DOG
            </a>
            </span>
            </h3>

        {{-- <!--Foster profile information -->
        <div class="col-lg-3 col-md-6 col-sm-12 mx-auto" style="padding-top:10px;margin-top:30px;">
            <div class="border" style="border-radius:20px;padding:20px 20px 10px 20px">
                <div class="row" style="padding-bottom:5px">
                    <img style="width: 150px; border-radius:50%; display:block;margin:auto" src="{{'Image/'. $user->profile_pic}}">
                    <h4 style="text-align:center">{{ $user->firstname }}{{' '.$user->lastname }}</h4>

                    <div class="row" style="padding-top:5px; padding-bottom: 5px; font-size:medium;"><a href="profile.html" style="text-decoration:none;">
                        <span>@</span>{{ $user->user_name }}</a>
                    </div>

                    <div class="row" style="font-size: small;color:gray;vertical-align: bottom; padding-bottom: 15px;padding-right: 2px;"> 
                        <span>5.0 <span class="fa fa-star checked"></span> 
                        <span class="fa fa-star checked"></span> 
                        <span class="fa fa-star checked"></span> 
                        <span class="fa fa-star checked"></span> 
                        <span class="fa fa-star checked"></span><span style="padding-left:10px;font-size:small;color:gray;vertical-align: bottom;padding-right: 2px;">(20 reviews)</span></span>
                    </div>
                    <div class="row" style="font-size: small;color:gray;vertical-align: bottom;padding-right: 2px;padding-bottom: 10px;"> 
                        <p> {{ $user->city }}{{", ". $user->province }}</p>
                    </div>
                    <p style="font-size:13px;line-height:1.6; padding-top:10px">{{ $user->about }}</p>
                    <div>
                        <h6 style="color:#491036;margin-top:20px;padding-left:5px"><i class="fa-solid fa-dog" style="color:#811D60;font-size:22px;padding-right:20px"></i><strong>55</strong> Dogs Posted</h6>
                        <h6 style="color:#491036;margin-top:20px"><i class="fa-solid fa-people-roof" style="color:#811D60;font-size:24px;padding-right:20px"></i><strong>41</strong> Dogs Re-Homed</h6>
                    </div>
                </div>
            </div>
        </div> --}}
        <!--Dog profile information -->
    
        {{-- <div class="container-fluid" style="width:100%">
            <div class="d-flex mt-3">
                <ul class="nav nav-tabs flex-grow-1 flex-nowrap" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#dogposted" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Dog Posted</a>
                    </li>
                    <li>
                        <a class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#dog-rehomed" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Dog Re-Homed</a>
                    </li>
                </ul>
            </div>
        </div> --}}
            <div class="tab-content justify-content-center" id="myTabContent">
                <div class="tab-pane fade show active" id="dogposted" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success" style="height:50px">
                        <p>{{ $message }}</p>
                    </div>
                    @endif
                    @foreach($dogs as $dogsitem)
                    <div class="card d-inline-flex m-4 border">
                        <div class="card" style="width:15rem;">
                        <img src="{{'image/' . $dogsitem->pic}}" class="card-img-top" alt="picture">
                            <div class="card-body">
                            <h5 class="card-title" style="font-style:italic">{{$dogsitem->name}}</h5>
                            <h6 class="card-subtitle mb-2">{{($dogsitem->gender=="1-Male")? "Male" : "Female" }}, {{$dogsitem->age_yr}}y and {{$dogsitem->age_month}}m</h6>
                            <h6 class="card-subtitle mb-2 text-muted">{{$dogsitem->breed1_name}} , {{$dogsitem->breed2_name}}</h6>
                            <h6 class="card-subtitle mb-2 text-muted" style="font-size:smaller"> Date Posted: {{date('M d, Y', strtotime($dogsitem->created_at))}}</h6>
                            <a href="/dogprofile/{{$dogsitem->id}}" class="btn btn-primary text-white">Show Details</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="text-center mt-5">
                    {{$dogs->links()}}
                    </div>
                </div>
                <div class="tab-pane fade" id="dog-rehomed" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                    <h3>Menu 1</h3>
                    <p>Some content in menu 1.</p>
                </div>
                </div>
        </div>
    </div>
</div>



@endsection