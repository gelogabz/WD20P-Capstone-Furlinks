@extends ('components.navbar')
@section('content')

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