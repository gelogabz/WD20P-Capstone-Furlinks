@extends ('components.navbar')

@section('content')

<style>
  .btn-primary2,
    .btn-primary2:active,
    .btn-primary2:visited {
      width:100px;
      border-radius: 10px;
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
  <div class="row" style="width:100%;margin-top:20px;margin-bottom:40px">
    <h3 class="" style="font-family: Poppins; color:#413F42">My Applications</h3><br>

    @if ($message = Session::get('success'))
    <div class="alert alert-success" style="height:50px">
        <p>{{ $message }}</p>
    </div>
    @endif

    @if ($message = Session::get('error'))
    <div class="alert alert-warning" style="height:50px">
        <p>{{ $message }}</p>
    </div>
    @endif
    <div class=" table-responsive text-nowrap overflow-y:auto">
      <table class="table table-borderless" style="width:100%;margin-top:10px;vertical-align:middle">
        <tr style="border-bottom:0.3pt solid #e1e1e1;">
          <th></th>
          <th>Name</th>          
          <th>Gender</th>
          <th>Age</th>
          <th>Location</th>
          <th>Foster/Rescuer</th>
          <th>Date Submitted</th>
          <th>Status</th>
        </tr>

        @foreach($applications as $application)    
        <tr>
          <td><img src="{{asset('Image/'.$application->dog_pic)}}" style="width:100px;border-radius:10px;display:block;margin:auto;"></td>
          <td style="vertical-align:middle"><a class="username" href="pages/{{$application->dog_id}}">{{$application->dog_name}}</a></td>
          <td style="vertical-align:middle">{{($application->gender=="1-Male")? "Male" : "Female" }}</td>
          <td style="vertical-align:middle">{{$application->age_yr}}y {{" ".$application->age_month}}m old</td>
          <td style="vertical-align:middle">{{$application->location}}</td>
          <td style="vertical-align:middle">{{$application->fostername}}</td>
          <td style="vertical-align:middle">{{date('M d, Y', strtotime($application->created_at))}}</td>
          <td style="vertical-align:middle">{{$application->appstatus_name}}</td>
        </tr>
        @endforeach
      </table>
    </div>
  </div>
</div>
@endsection('content')
