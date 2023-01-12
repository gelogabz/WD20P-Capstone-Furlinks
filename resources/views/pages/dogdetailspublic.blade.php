@extends ('components.navbar')
@section('content')

<hr style="margin:0px 0px 5px 0px;padding:0px 0px 0px 0px;border-color:#ececec">

<div class="container-fluid d-flex justify-content-center" style="padding-left: 5%; padding-right: 5%; padding-top:0px;margin-bottom:30px">
  <div class="row" style="width:100%;margin-top:5px;margin-bottom:20px">
    <a class="btn btn-outline-primary2" href="{{ url()->previous() }}" type="button" style="vertical-align: bottom;text-align: left;padding-left:10px;width:180px;margin-bottom:20px">
    <i class="fa fa-arrow-left" aria-hidden="true" style="font-size:medium;padding-right:10px;padding-top:4px"></i>Back to Dogs Posted</a>
  
    <div class="row" style="width:100%">          
      <div class="col-md-9 col-sm-12">   
        <h3 class="" style="font-family: Poppins; color:#413F42">Dog Information</h3><br>
        <div class="row">
          <div class="col-lg-5 col-sm-12" style="padding: 0px 0px 30px 0px">           
            <img src="{{asset('Image/'. $dogs->pic)}}" alt="dog" class="image" style="width:85%; display:block; border-radius:20px; margin:auto">
            <div style="justify-content: center; text-align:center; margin-top:20px">
              @if(Auth::check())
                  @if ($ownership == 'yes' )
                      {{-- if user logged in is the owner of the dog --}}
                      @if ($dogs->status_id == 1)
                        <a class="btn adopt_btn" href="/dogprofile/{{$dogs->id}}/edit" type="button" style="width:200px; font-family:Poppins; white-space:no-wrap; margin-top:10px;">
                          <i class="fa-regular fa-pen-to-square" style=""></i> 
                          Edit Dog Profile
                        </a>
                      @elseif ($dogs->status_id == 2)
                        <a class="btn adopt_btn" href="/applications/{{$dogs->id}}" type="button" style="width:200px; font-family:Poppins; white-space:no-wrap; margin-top:10px;">
                          View Applications
                        </a>
                      @else
                        <a class="btn adopt_btn" href="/adoptions/create/{{$dogs->id}}" type="button" style="width:200px; font-family:Poppins; white-space:no-wrap; margin-top:10px;">
                          Finalize Adoption
                        </a>
                      @endif
                  @else
                    {{-- if user logged in is not the owner CAN APPLY --}}
                      @if ($applicationstatus == "existing")
                          <div class="alert" style="background-color:#f0e8dc; margin:auto; text-align:center; width: 320px; height:130px; vertical-align-align:center">
                            <p style="font-weight:700;font-size:medium">You have an ongoing application <br>to adopt this dog.<br> 
                            <p style="font-weight:400;font-size:15px;"> <a href=/applications style="color:#885b2a; text-decoration: none;font-weight:700" >Click here </a> to check the status.</p>
                          </div>                      
                      @else
                       {{-- if user has never applied to adopt this dog --}}
                          @if ($withprofile == "complete")
                              <a href="/applications/create/{{$dogs->id}}" class="btn adopt_btn" style="width:170px;float:center; margin-top:10px;">
                              <i class="fa-regular fa-pen-to-square" style="font-size:medium; padding-right:10px;"></i>ADOPT</a>      
                          @else
                              <div class="alert alert-warning" style="margin:auto; text-align:center; width: 320px;height:120px">
                                <p style="font-weight:800;font-size:medium"> Want to adopt this dog? <br> 
                                <p style="font-weight:400;font-size:15px;"> A complete user profile is required. <br><a href="/userprofile/{{Auth::user()->id}}" style="color:#885b2a; text-decoration: none;font-weight:700">Click here</a> to complete your profile.</span>    
                              </div>
                          @endif
                      @endif
                  @endif
              @else 
                <div class="alert alert-warning" style="margin:auto; text-align:center; width: 320px;height:120px">
                  <p style="font-weight:800;font-size:medium"> Want to adopt this dog? <br> 
                  <p style="font-weight:400;font-size:15px;"> Please login by <a href="{{ route('login') }}"  style="color:#885b2a; text-decoration: none;font-weight:700"> clicking here</a><br> or if you are a new user, <a href="{{ route('login') }}"  style="color:#885b2a; text-decoration: none;font-weight:700"> register here.</a></span>    
                </div>
              @endif  
            </div>
          </div>

          <div class="col-lg-7 col-sm-12" style="padding: 0px 20px 20px 20px;">
            <h5 style="color:#61482e; font-family:Poppins;"> {{($dogs->gender=="1-Male")? "Male" : "Female" }},  {{$dogs->age_yr}}y and {{$dogs->age_month}} month/s old<br>
            <h6 style="color:#c8a279; font-family:Poppins;"><i class="fa-solid fa-paw" style="font-size:medium; color:#c8a279"></i><span style="color:#413F42;" class="m-2">{{$dogs->breed1_name}} - {{$dogs->breed2_name}}</span></h6>
            <i class="fa-solid fa-timer" style="font-size:medium; color:#413F42"></i>
            <span style="font-size: small; color: #413F42">Date Posted: {{date('M d, Y', strtotime($dogs->created_at))}} </span><br></h4>
              
            <table style="width:100%; margin-top:10px; color:#413F42;">
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
                <td> <?php              
                  if ($dogs->rescued == 0) {
                    echo "No";
                  }
                  else {echo "Yes";}
                  ?></td>
              </tr>
              <tr>
                <th>Date Rescued:</th>
                <td>{{date('M d, Y', strtotime($dogs->rescuedate))}}</td>
              </tr>
              <tr>
                <th>Neutered/Spayed?</th>
                <td> <?php              
                  if ($dogs->neutered == 0) {
                    echo "No";
                  }
                  else {echo "Yes";}
                  ?></td>
              </tr>
              <tr>
                <th>Vaccinated?</th>
                <td> Yes</td>
              </tr>
              <tr style="border-bottom:0.3pt solid #e1e1e1;">
                <th colspan="4" style="padding-left:0px; font-size:16px; padding-top:15px"><i>Adoption Information</i></th>    
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
        </div>
      </div>
      <div class="col-md-3 col-sm-12" style="padding:0px 0px ">
        <div class="border" style="border-radius:10px;margin:0px 0px;padding:20px 20px">
          <div class="row" style="padding-bottom:5px;">
            <div class="col col-auto" style="">
              <img style="width:55px; border-radius:50%; padding:2px;" src="{{asset('Image/'. $dogs->profile_pic)}}">
            </div>
            <div class="col">
              <div class="row" style="padding-top: 5px; padding-bottom: 5px; font-size:medium">
                <a href="/" style="color:#B78550;"><span>@</span>{{$dogs->users_name}}</a>
                <p style="font-size:13px; line-height:1.6; color:#413F42;">{{$dogs->city}}, {{$dogs->province}}</p>
              </div>
            </div>
          </div>
          <p style="font-size:13px; line-height:1.6; padding-top:10px; padding-bottom:10px; color:#413F42;">{{$dogs->about }}</p>
          <p style="font-size:15px; color:#413F42;"><i>More dogs posted by <span>@</span>{{$dogs->users_name}}</i></p>
          <div class="row" style="margin-bottom:15px">
            @foreach($otherdogs as $otherdog)
            <div class="col col-sm-6 col-xs-4" style="padding:10px;">
              <div class="containerimg1" style="width:100%">
                <img src="{{asset('Image/'.$otherdog->pic)}}" alt="Avatar" class="image1" style="width:100%">
                <div class="middle1">
                  <div><a class="text1" href='{{$otherdog->id}}'>View</a></div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection