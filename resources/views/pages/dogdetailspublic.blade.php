@extends ('components.navbar')
@section('content')

<style>
  .btn-primary2,
  .btn-primary2:active,
  .btn-primary2:visited {
    width:150px;
    border-radius: 10px;
    background-color: #29468a;
    color:#FFF;
    border-color: #29468a;
    height: 30px;
    padding-top:2px !important;
  }
  .btn-primary2:hover {
    width:150px;
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
</style>

<hr style="margin:0px 0px 5px 0px;padding:0px 0px 0px 0px;border-color:#ececec">

<div class="container-fluid d-flex justify-content-center" style="padding-left: 5%; padding-right: 5%; padding-top:0px;margin-bottom: 20px">
  <div class="row" style="width:100%;margin-top:20px">
    <h3>Dog Information</h3><br>
    
      <!--Dog profile pic and social media actions -->  
      <div class="col-lg-4 col-sm-6" style="margin-top:20px">       
        <img src="{{asset('Image/'. $dogs->pic)}}" alt="dog" class="image" style="width:90%; display:block;border-radius:20px;margin:auto">
        <div style="text-align: center;">
          <a href="/dogprofile/{{$dogs->id}}/edit" class="btn btn-primary2" style="float:center; margin-top:10px;">
          <i class="fa-regular fa-pen-to-square" style="font-size:medium;padding-right: 10px"></i>ADOPT</a>
        </div>
      </div>

      <!--Dog profile information -->
    
      <div class="col-lg-5 col-sm-6" style="padding-left:20px;padding-top:15px;margin-bottom: 20px;">
        <h5 style="color:#811D60;"> {{$dogs->gender}},  {{$dogs->age_yr}}y and {{$dogs->age_month}}m old<br>
        <h6 style="color:#811D60;"><i class="fa-solid fa-paw" style="font-size:medium;color:#811D60"></i><span style="color:#5d5d5d;" class="m-2">{{$dogs->breed1_name}} - {{$dogs->breed2_name}}  </span></h6>
        <i class="fa-solid fa-timer" style="font-size:medium;color:#811D60"></i>
        <span style="font-size: small;color: #5d5d5d">Date Posted: {{date('M d, Y', strtotime($dogs->created_at))}} </span><br></h4>
          
        <table style="width:100%;margin-top:10px">
          <colgroup>
            <col span="1" style="width:50%">
            <col span="1" style="width:50%">
          </colgroup>
          <tr style="border-bottom:0.3pt solid #e1e1e1;">
            <th colspan="4" style="padding-left:0px;font-size:16px"><i>Basic Information</i></th>    
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
            <th colspan="4" style="padding-left:0px;font-size:16px;padding-top:20px"><i>Adoption Information</i></th>    
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

      <div class="col-lg-3 col-sm-6" style="padding-left:20px;padding-top:15px;margin-bottom: 20px;">
        {{-- FOSTER PROFILE PANEL HERE --}}
        <div class="border" style="border-radius:20px;padding:20px 20px 10px 20px">
          <div class="row" style="padding-bottom:5px">
            <div class="col col-auto" style="margin-right:px">
              <img style="width:55px; border-radius:50%; padding: 2px" src="{{asset('Image/'. $dogs->profile_pic)}}">
            </div>
            <div class="col">
              <div class="row" style="padding-top: 5px;padding-bottom: 5px;font-size:medium">
                <a href="#"><span>@</span>{{$dogs->users_name }}</a>
                <p style="font-size:13px;line-height:1.6;">{{$dogs->city}}, {{$dogs->province}}</p>
              </div>
            </div>
          </div>
          <p style="font-size:13px;line-height:1.6; padding-top:10px;padding-bottom:10px">{{$dogs->about }}</p>
          <p style="font-size:15px;color:#581542"><i>More dogs posted by <span>@</span>{{$dogs->users_name}}</i></p>
          <div class="row" style="margin-bottom:15px">
            @foreach($otherdogs as $otherdog)
            <div class="col col-sm-6 col-xs-4" style="margin-bottom:20px; margin-right: 0px; margin-left: 0px;">
              <div class="containerimg" style="width:100%">
                <img src="{{asset('Image/'.$otherdog->pic)}}" alt="Avatar" class="image" style="width:100%">
                <div class="middle">
                  <div class="text"><a href='{{$otherdog->id}}'>View</a></div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
  </div>
</div>


@endsection