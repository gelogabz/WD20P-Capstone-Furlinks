@extends ('components.navbar')
@section('content')

<hr style="margin:0px 0px 5px 0px;padding:0px 0px 0px 0px;border-color:#ececec">
<div class="container-fluid d-flex justify-content-center" style="padding-left: 5%; padding-right: 5%; padding-top:0px;margin-bottom: 20px">
  <div class="row" style="width:100%;margin-top:5px;margin-bottom:20px">
    <a class="btn btn-outline-primary2" href="/dogsrehomed" type="button" style="vertical-align: bottom; text-align: left; padding-left:10px; width:180px; margin-bottom:20px">
      <i class="fa fa-arrow-left" aria-hidden="true" style="font-size:medium;padding-right:10px;padding-top:4px"></i>Back to Dogs Rehomed</a>
       
    <div class="row" style="width:100%">          
        <h3 class="" style="font-family: Poppins; color:#413F42">Adoption Information</h3><br>
      </div>

      <div class="row mt-4" >
          <div class="col col-md-4" style="padding:0px; margin:0px">
            <img src="{{asset('Image/'. $applications->turnoverpic)}}" alt="dog" class="image" style="width:80%; display:block; border-radius:20px; margin:auto">
          </div>
          <div class="col col-md-8">
          <div class="row">
              <div class="col col-md-6 col-sm-12" style="padding: 0px 30px" >
              <div class="row" >
                  <div class="border" style="border-radius:15px;margin-right:0px;padding:20px 30px 0px 30px">
                      <div style="text-align:center;margin-bottom:20px"><h6>DOG REHOMED</h5></div>
                      <div class="card" style="flex-direction:row; height:auto; align-items:center;margin: 0px 20px">
                      <img src="{{asset('image/'.$dogs->pic)}}" class="card-img-top" alt="picture" style="width:120px">
                      <div class="card-body" style="padding-left:20px">
                          <h5 class="card-title fw-bold" style="font-style:italic; font-family: Quicksand; color:#;">{{$dogs->name}}</h5>
                          <h6 class="card-subtitle mb-2" style="font-family: Poppins;">{{($dogs->gender=="1-Male")? "Male" : "Female" }}, {{$dogs->age_yr}}y and {{$dogs->age_month}}m</h6>
                          <h6 class="card-subtitle mb-2 text-muted" style="font-family: Lato; font-weight:10px">{{$dogs->breed1_name}} , {{$dogs->breed2_name}}</h6>
                      </div>
                  </div>
                  <input type="hidden" name="dogid" value="{{$applications->dog_id}}"/>
                  <table class="table table-borderless" style="width:100%; margin-top:10px; color:#413F42;">
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
                  </table>
                  </div> 
              </div>
              </div>

              <div class="col col-md-6 col-sm-12" style="padding: 0px 30px">
              <div class="row">
                  <div class="border" style="border-radius:15px;margin-right:0px;padding:20px 30px 0px 30px">
                      <div style="text-align:center;margin-bottom:20px"><h6>ADOPTER</h5></div>
                      <div class="card" style="flex-direction:row; height:auto; align-items:center;margin: 0px 20px">
                      <img src="{{asset('image/'.$applications->profile_pic)}}" alt="profilepic" class="card-img-top" style="width:120px; display:block;border-radius:50%;margin:auto"/>
                      <div class="card-body" style="padding-left:40px">
                          <h5 class="card-title fw-bold" style="font-style:italic; font-family: Quicksand; color:#;">{{$applications->username}}</h5>
                          <h6 class="card-subtitle mb-2" style="font-family: Poppins;">{{$applications->firstname}}{{' '.$applications->lastname}}</h6>
                          <h6 class="card-subtitle mb-2 text-muted" style="font-family: Lato; font-weight:10px">{{$applications->city}} , {{$applications->province}}</h6>
                      </div>
                  </div>
                  <input type="hidden" name="userid" value="{{$applications->user_id}}"/>
                  <table class="table table-borderless" style="margin-top:10px;vertical-align:middle">
                      <colgroup>
                          <col span="1" style="width:55%">
                          <col span="1" style="width:45%">
                      </colgroup>
                      <tr>
                      <tr style="border-bottom:0.3pt solid #e1e1e1;">
                          <th colspan="4" style="padding-left:0px;font-size:16px"><i>Contact Information</i></th>    
                      </tr>   
                      <tr>
                          <th>Username</th>
                          <td>{{$applications->username}}</td>
                      </tr>
                      <tr>
                          <th>Full Name</th>
                          <td>{{$applications->firstname}}{{' '.$applications->lastname}}</td>
                      </tr>
                      <tr>
                          <th>Email</th>
                          <td>{{$applications->email}}</td>
                      </tr>
                      <tr>
                          <th>Contact No.</th>
                          <td>{{$applications->mobile_no}}</td>
                      </tr>
                      <tr>
                          <th>Address</th>
                          <td>{{$applications->address1}}, {{$applications->address2}}</td>
                      </tr>
                      <tr>
                          <th>City</th>
                          <td>{{$applications->city}}</td>
                      </tr>
                      <tr>
                          <th>Province/Region</th>
                          <td>{{$applications->province}}</td>
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
          </div>
        </div>  
      </div>
    </div>
  </div>
</div>
<br><br>
@endsection