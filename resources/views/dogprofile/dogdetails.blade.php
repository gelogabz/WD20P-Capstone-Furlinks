@extends ('components.navbar')
@section('content')

<hr style="margin:0px 0px 5px 0px;padding:0px 0px 0px 0px;border-color:#ececec">
<div class="container-fluid d-flex justify-content-center" style="padding-left: 5%; padding-right: 5%; padding-top:0px;margin-bottom: 20px">
  <div class="row" style="width:100%;margin-top:5px;margin-bottom:20px">
    <a class="btn btn-outline-primary2" href="/dogsposted" type="button" style="vertical-align: bottom; text-align: left; padding-left:10px; width:180px; margin-bottom:20px">
      <i class="fa fa-arrow-left" aria-hidden="true" style="font-size:medium;padding-right:10px;padding-top:4px"></i>Back to Dogs Posted</a>

    <div class="row" style="width:100%">          
        <h3 class="" style="font-family: Poppins; color:#413F42">Dog Information</h3><br>
        <div class="row" style="margin-right:30px">
          <div class="col col-md-4 col-sm-12" style="padding: 25px 0px 30px 0px">           
            <img src="{{asset('Image/'. $dogs->pic)}}" alt="dog" class="image" style="width:80%; display:block; border-radius:20px; margin:auto">
            <div style="justify-content: center; text-align:center; margin-top:30px">
            
              @if ($dogs->status_id == 1)
              <a class="btn edit_btn" href="/dogprofile/{{$dogs->id}}/edit" type="button" style="width:200px; font-family:Poppins; white-space:no-wrap;">
                <i class="fa-regular fa-pen-to-square" style=""></i> 
                Edit Dog Profile
              </a>
              @elseif ($dogs->status_id == 2)
              <a class="btn edit_btn" href="/applications/{{$dogs->id}}" type="button" style="width:200px; font-family:Poppins; white-space:no-wrap;">
                View Applications
              </a>
              @else
              <a class="btn edit_btn" href="/adoptions/create/{{$dogs->id}}" type="button" style="width:200px; font-family:Poppins; white-space:no-wrap;">
                Finalize Adoption
              </a>
              @endif
            </div>
          </div>

          <div class="col col-md-8 col-sm-12" style="padding: 25px 20px 20px 20px;">
            <h5 style="color:#61482e; font-family:Poppins;"> {{($dogs->gender=="1-Male")? "Male" : "Female" }},  {{$dogs->age_yr}}y and {{$dogs->age_month}} month/s old<br>
            <h6 style="color:#c8a279; font-family:Poppins;"><i class="fa-solid fa-paw" style="font-size:medium; color:#c8a279"></i><span style="color:#413F42;" class="m-2">{{$dogs->breed1_name}} - {{$dogs->breed2_name}}</span></h6>
            <i class="fa-solid fa-timer" style="font-size:medium; color:#413F42"></i>
            <span style="font-size: small; color: #413F42">Date Posted: {{date('M d, Y', strtotime($dogs->created_at))}} </span><br></h4>
            <div class="row">  
              <div class="col col-md-6 col-sm-12" style="padding: 10px 20px 20px 20px;">
                <table class="table table-borderless" style="width:95%; margin-top:10px; color:#413F42;">
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
                    <th>Foster Name</th>
                    <td>{{$dogs->name}}</td>
                  </tr>
                  <tr>
                    <th>Birthdate</th>
                    <td>{{date('M d, Y', strtotime($dogs->birthdate))}}</td>
                  </tr>
                  <tr>
                    <th>Rescued?</th>
                    <td>{{($dogs->rescued==0)? "No" : "Yes" }}</td> 
                  </tr>
                  <tr>
                    <th>Date Rescued</th>
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
                </table>
              </div>

              <div class="col col-md-6 col-sm-12" style="padding: 10px 0px 20px 0px;">                
                <table class="table table-borderless" style="width:95%; margin-top:10px; color:#413F42;">
                  <colgroup>
                    <col span="1" style="width:50%">
                    <col span="1" style="width:50%">
                  </colgroup>
                  <tr style="border-bottom:0.3pt solid #e1e1e1;">
                    <th colspan="4" style="padding-left:0px;font-size:16px;"><i>Adoption Information</i></th>    
                  </tr> 
                  <tr>
                    <th>Location</th>
                    <td>{{$dogs->location}}</td>
                  </tr>
                  <tr>
                    <th>Adoption Fee</th>
                    <td>{{$dogs->fee}}</td>
                  </tr>
                  <tr>
                    <th>Reason for Fees</th>
                    <td>{{$dogs->feenotes}}</td>
                  </tr>  
                  <tr style="border-bottom:0.3pt solid #e1e1e1;">
                    <th colspan="4" style="padding-left:0px;font-size:16px; padding-top:30px"><i>Posting Information</i></th>    
                  </tr> 
                  <tr>
                    <th>Status</th>
                    <td>{{$dogs->status_name}}</td>
                  </tr>
                  <tr>
                    <th>Applciations received </th>
                    <td>{{$applications->count()}}</td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
        </div>  
      </div>
    </div>
  </div>
</div>
<br><br>
@endsection