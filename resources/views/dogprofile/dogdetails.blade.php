@extends ('components.navbar')
@section('content')

<hr style="margin:0px 0px 5px 0px;padding:0px 0px 0px 0px;border-color:#ececec">
<div class="container-fluid d-flex justify-content-center" style="padding-left: 5%; padding-right: 5%; padding-top:0px;margin-bottom: 20px">
  <div class="row" style="width:100%;margin-top:5px;margin-bottom:20px">
    <a class="btn btn-outline-primary2" href="{{ url()->previous() }}" type="button" style="vertical-align: bottom;text-align: left;padding-left:10px;width:180px;margin-bottom:20px">
      <i class="fa fa-arrow-left" aria-hidden="true" style="font-size:medium;padding-right:10px;padding-top:4px"></i>Back to Dogs Posted</a>

    <h3 style="font-family: Poppins; color:#413F42;">Dog Information</h3><br>
    
      <!--Dog profile pic and social media actions -->  
      <div class="col-lg-4 col-sm-6" style="margin-top:20px">       
        <img src="{{asset('image/'.$dogs->pic)}}" alt="dog" class="image" style="width:90%; display:block; border-radius:20px; margin:auto">
      </div>

      <!--Dog profile information -->
      <div class="col-lg-8 col-sm-6" style="padding-left:20px; padding-top:15px; margin-bottom: 20px;">
        <div class="row">
          <div class="col-lg-9 col-sm-12">
            <h5 style="color:#61482e;"> {{($dogs->gender=="1-Male")? "Male" : "Female" }},  {{$dogs->age_yr}}y and {{$dogs->age_month}} month/s old</h5>
            <h6 style="color:#C8A279;">
              <i class="fa-solid fa-paw" style="font-size:medium; color:#C8A279"></i><span style="color:#413f4e;" class="m-2">{{$dogs->breed1_name}} - {{$dogs->breed2_name}}  </span></h6>
              <span style="font-size: small;color: #413f4e">Date Posted: {{date('M d, Y', strtotime($dogs->created_at))}} </span><br></h6>
            
              <table style="width:90%; margin-top:10px; color:#413F42;">
                <colgroup>
                  <col span="1" style="width:50%">
                  <col span="1" style="width:50%">
                </colgroup>
                <tr style="border-bottom:0.3pt solid #e1e1e1;">
                  <th colspan="4" style="padding-left:0px; font-size:16px"><i>Basic Information</i></th>    
                </tr>   
                <tr>
                  <th>Size</th>
                  <td>{{$dogs->size}}</td>
                </tr>
                <tr>
                  <th>Color</th>
                  <td>{{$dogs->color}}</td>
                </tr>
                <tr>
                  <th>Foster Name:</th>
                  <td>{{$dogs->name}}</td>
                </tr>
                <tr>
                  <th>Birthdate:</th>
                  <td>{{date('M d, Y', strtotime($dogs->birthdate))}}</td>
                </tr>
                <tr>
                  <th>Rescued?</th>
                  <td>{{($dogs->rescued==0)? "No" : "Yes" }}</td> 
                </tr>
                <tr>
                  <th>Date Rescued:</th>
                  <td>{{date('M d, Y', strtotime($dogs->rescuedate))}}</td>
                </tr>
                <tr>
                  <th>Neutered/Spayed?</th>
                  <td>{{($dogs->neutered==0)? "No" : "Yes" }}</td> 
                </tr>
                <tr>
                  <th>Vaccinated?</th>
                  <td> Yes</td>
                </tr>
                <tr style="border-bottom:0.3pt solid #e1e1e1;">
                  <th colspan="4" style="padding-left:0px;font-size:16px; padding-top:15px"><i>Adoption Information</i></th>    
                </tr> 
                <tr>
                  <th>Location:</th>
                  <td>{{$dogs->location}}</td>
                </tr>
                <tr>
                  <th>Adoption Fee: </th>
                  <td>{{$dogs->fee}}</td>
                </tr>
                <tr>
                  <th>Reason for Fees: </th>
                  <td>{{$dogs->feenotes}}</td>
                </tr>  
              </table>
          </div>
          <div class="col-lg-3 col-sm-12" >
              <a class="btn edit_btn" href="/dogprofile/{{$dogs->id}}/edit" type="button" style="width:170px;font-family:Poppins; white-space:no-wrap;">
                  <i class="fa-regular fa-pen-to-square" style=""></i> EDIT</a>
              <br><br>
            <a class="btn viewapp_btn" href="/applications/{{$dogs->id}}" type="button" style="font-family:Poppins; white-space:no-wrap;">
              View Applications
            </a>
            <br><br>
            <a class="btn viewapp_btn" href="/adoptions/create/{{$dogs->id}}" type="button" style="font-family:Poppins; white-space:no-wrap;">
              Finalize Adoption
            </a>

          </div>
        </div>
        <div class="row">
       
        </div>  
      </div>
  </div>
</div>
<br><br>
@endsection