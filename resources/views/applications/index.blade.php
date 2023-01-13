@extends ('components.navbar')

@section('content')

<style>
  .btn-primary2,
  .btn-primary2:active,
  .btn-primary2:visited {
    width:140px;
    border-radius: 10px;
    border-color:aqua;
    background-color: #29468a;
    color:#FFF;
    border-color: #29468a;
    height: 30px;
    padding-top:2px !important;
  }
  .btn-primary2:hover {
    width:10`0px;
    background-color: #0d1e47;
    border-color: #29468a; 
    height: 30px;
    padding-top:2px !important;
    transition: all 1s ease;
    -webkit-transition: all 1s ease;
    -moz-transition: all 1s ease;
    -o-transition: all 1s ease;
    -ms-transition: all 1s ease;
  }
  .tableheader {
    text-align:center !important;
  }
</style>

<hr style="margin:0px 0px 5px 0px;padding:0px 0px 0px 0px;border-color:#ececec">
<div class="container-fluid d-flex justify-content-center" style="padding-left: 5%; padding-right: 5%; padding-top:0px;margin-bottom: 20px">
  <div class="row" style="width:100%;margin-top:5px;margin-bottom:20px">
    <a class="btn btn-outline-primary2" href="/dogprofile/{{$dogs->id}}" type="button" style="vertical-align: bottom;text-align: left;padding-left:10px;width:180px;margin-bottom:20px">
      <i class="fa fa-arrow-left" aria-hidden="true" style="font-size:medium;padding-right:10px;padding-top:4px"></i>Back to Dog Profile</a>
    @if ($message = Session::get('success'))
    <div class="alert alert-success" style="height:50px">
        <p>{{ $message }}</p>
    </div>
    @endif

    <div class="row" style="width:100%">          
      <div class="col-md-9 col-sm-12">                              
        <div class="row">
          <h3 class="" style="font-family: Poppins; color:#413F42">Applications for Adoption</h3>
        </div>
        <div class="row" style="margin-top:20px;margin-right:70px">
          <table class="table" style="margin-top:10px;vertical-align:middle;margin-left:30px; padding-right:10px;">
            <colgroup>
              <col span="1" style="width:12%">
              <col span="1" style="width:18%">
              <col span="1" style="width:20%">
              <col span="1" style="width:20%">
              <col span="1" style="width:15%">
              <col span="1" style="width:15%">
            </colgroup>
            <tr style="border-bottom:0.3pt solid #e1e1e1;">
              <th colspan="2" style="text-align:center"> Username</th>
              <th>Name</th>
              <th>Date Submitted</th>
              <th>Status</th>
              <th> </th>          
            </tr>
    
            @foreach($applications as $application)    
            <tr>
              <td><img class="propic2" src="{{asset('image/'.$application->profile_pic)}}" style="width:60px;border-radius:50%;display:block;margin:auto;"></td>
              <td style="vertical-align:middle">{{" ".$application->username}}</td>
              <td style="vertical-align:middle">{{$application->firstname}}{{" ".$application->lastname}}</td>
              <td style="vertical-align:middle">{{date('M d, Y', strtotime($application->created_at))}}</td>
              <td style="vertical-align:middle">{{$application->appstatus_name}}</td>
              <td style="vertical-align:middle"><a href="/applications/{{$application->id}}/edit" class="btn btn-outline-primary2" type="button" style="width:140px;margin-right:0px">
                View Application 
                <i class="fa-solid fa-arrow-right"></i></a>
              </td>
            </tr>
            @endforeach
          </table>
        </div>
      </div>
      
      <div class="col-md-3 col-sm-12" style="padding:0px 0px ">
        <div class="border" style="border-radius:10px;margin-right:0px;padding:20px 10px">
            <div class="card">
              <div class="card-title" style="text-align:center"><h5>Dog for Adoption</h5></div>
              <img src="{{asset('image/'.$dogs->pic)}}" alt="dog" class="card-img-top" style="width:90%;display:block;margin:auto">
              <div class="card-body">
                  <h5 class="card-title" style="font-style:italic">{{$dogs->name}}</h5>
                  <h6 class="card-subtitle mb-2">{{($dogs->gender=="1-Male")? "Male" : "Female" }}, {{$dogs->age_yr}}y and {{$dogs->age_month}}m</h6>
                  <h6 class="card-subtitle mb-2 text-muted">{{$dogs->breed1_name}} , {{$dogs->breed2_name}}</h6>
                  <h6 class="card-subtitle mb-2 text-muted" style="font-size:smaller"> Date Posted: {{date('M d, Y', strtotime($dogs->created_at))}}</h6>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection('content')
