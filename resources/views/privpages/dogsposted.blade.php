@extends ('components.navbar')
@section('content')
<style>
    [rel='prev'], [rel='next'] {
        background-color: #799FC8  !important;
        color: #f4f4f4 !important;
        text-decoration: none !important;
    }
</style>

<hr style="margin:0px 0px 5px 0px;padding:0px 0px 0px 0px;border-color:#ececec">

<div class="container-fluid d-flex justify-content-center" style="padding-left: 5%; padding-right: 5%; padding-top:0px; margin-bottom: 20px">
    <div class="row" style="width:100%;  margin-bottom: 20px;">
        <div class="row" style="width:100%; margin-top:20px;">
            <h3>My Dogs
            <span class="ml-auto text-nowrap" style="padding: bottom 5px;">   
            <a class="btn postdog_btn mb-3" href="/dogprofile/create" type="button" style="float:right; font-family:Poppins; vertical-align:bottom; text-align: center; padding-top:6px">
                <i class="fa-regular fa-pen-to-square" style="font-size:medium; padding-right:9px; padding-top:5px;"></i>
                POST DOG
            </a>
            </span>
            </h3>
            <center>
            <div class="tab-content justify-content-center align-content-center mx-0 px-0" id="myTabContent">
                <div class="tab-pane fade show active " id="dogposted" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success" style="height:50px">
                        <p>{{ $message }}</p>
                    </div>
                    @endif

                    @foreach($dogs as $dogsitem)
                    <div class="card d-inline-flex my-4 mx-4 border">
                        <div class="card" style="width:250px;">
                        <img src="{{'image/' . $dogsitem->pic}}" class="card-img-top" alt="picture">
                            <div class="card-body">
                            <h5 class="card-title fw-bold text-start" style="font-style:italic; font-family: Quicksand; color:#;">{{$dogsitem->name}}</h5>
                            <h6 class="card-subtitle mb-2 text-start" style="font-family: Poppins;">{{($dogsitem->gender=="1-Male")? "Male" : "Female" }}, {{$dogsitem->age_yr}}y and {{$dogsitem->age_month}}m</h6>
                            <h6 class="card-subtitle mb-2 text-muted text-start" style="font-family: Lato; font-weight:10px">{{$dogsitem->breed1_name}} , {{$dogsitem->breed2_name}}</h6>
                            <h6 class="card-subtitle mb-2 text-muted text-start" style="font-size:smaller; font-family: Lato; font-weight:10px"> Date Posted: {{date('M d, Y', strtotime($dogsitem->created_at))}}</h6>
                            <a href="/dogprofile/{{$dogsitem->id}}" class="btn mt-2 showdeets_btn">Show Details</a>
                            </div>
                        </div> 
                    </div>
                    @endforeach 
                </div>
            </div>
            <div class="text-center paginationbtn mt-3 mb-2" aria-current="paginationbtn">
                {{$dogs->links()}}
            </div>
            </center>
        </div>
    </div>
</div>

@endsection