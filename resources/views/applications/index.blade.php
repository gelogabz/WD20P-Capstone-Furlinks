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
  <div class="row" style="width:100%;margin-top:20px">
    <h3>Applications for Adoption</h3><br>

    <!--Dog profile pic and social media actions -->  
    {{-- <div class="col-lg-1 col-sm-6" style="margin-top:20px">       
      <img src="{{'image/'. $application->dog_pic}}" alt="dog" class="image" style="width:90%; display:block;border-radius:20px;margin:auto">
    </div>
    <!--Dog profile information --> --}}
  
    {{-- <div class="col-lg-10 col-sm-6" style="padding-left:20px;padding-top:15px;margin-bottom: 20px;"> --}}
        <table class="table" style="width:100%;margin-top:10px;vertical-align:middle">
        <tr style="border-bottom:0.3pt solid #e1e1e1;">
          <th> </th>          
          <th class="tableheader">Username</th>
          <th class="tableheader">First Name</th>
          <th class="tableheader">Last Name</th>
          <th class="tableheader">Location</th>
          <th class="tableheader">Phone</th>
          <th class="tableheader">Date Submitted</th>
          <th class="tableheader">Status</th>
          <th class="tableheader">Update</th>
        </tr>

        @foreach($applications as $application)
      
          <tr>
            <td><img src="{{asset('image/'.$application->profile_pic)}}" style="width:40px;border-radius:50%;display:block;margin:auto;"></td>
            <td style="vertical-align:middle">{{$application->username}}</td>
            <td style="vertical-align:middle">{{$application->firstname}}</td>
            <td style="vertical-align:middle">{{$application->lastname}}</td>
            <td style="vertical-align:middle">{{$application->location}}</td>
            <td style="vertical-align:middle">{{$application->mobile_no}}</td>
            <td style="vertical-align:middle">{{date('M d, Y', strtotime($application->created_at))}}</td>
            <td>
              <form action="{{route('applications.update', $application->id)}}" method="POST" enctype="multipart/form-data">
                {!! csrf_field() !!}
              @method('PATCH')
              <select class="form-select form-select-sm" name="appstatus" aria-label=".form-select-sm example" required>
                <option value="1" {{($application->appstatus=="1")? "selected" : "" }}>Submitted</option>
                <option value="2" {{($application->appstatus=="2")? "selected" : "" }}>Screening</option>
                <option value="3" {{($application->appstatus=="3")? "selected" : "" }}>For Interview</option>
                <option value="4" {{($application->appstatus=="4")? "selected" : "" }}>Waitlisted</option>
                <option value="5" {{($application->appstatus=="5")? "selected" : "" }}>Selected</option>
              </select>
            </td>
            <td class="tableheader"><input type="submit" name="submit" class="button btn-primary2" value="Update"></td>
          </tr>
        @endforeach
        </table>
  </div>
</div>
@endsection('content')
