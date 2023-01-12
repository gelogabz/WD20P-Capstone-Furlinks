@extends ('components.navbar')
@section('content')

<hr style="margin:0px 0px 5px 0px;padding:0px 0px 0px 0px;border-color:#ececec">
<div class="container-fluid d-flex justify-content-center" style="padding-left: 5%; padding-right: 5%; padding-top:0px;margin-bottom: 20px">
  <div class="row" style="width:100%;margin-top:5px;margin-bottom:20px">
    <a class="btn btn-outline-primary2" href="{{ url()->previous() }}" type="button" style="vertical-align: bottom; text-align: left; padding-left:10px; width:180px; margin-bottom:20px">
      <i class="fa fa-arrow-left" aria-hidden="true" style="font-size:medium;padding-right:10px;padding-top:4px"></i>Back to Dogs Rehomed</a>
       
    <div class="row" style="width:100%">          
        <h3 class="" style="font-family: Poppins; color:#413F42">Adoption Information</h3><br>
      </div>

      <div class="row mt-4" >
          <div class="col col-md-4" style="padding:0px; margin:0px">
            <img src="{{asset('Image/'. $adoptions->turnoverpic)}}" alt="dog" class="image" style="width:80%; display:block; border-radius:20px; margin:auto">
          </div>
          <div class="col col-md-8">
          <div class="row">
              <div class="col col-md-6 col-sm-12" style="padding: 0px 30px" >
              <div class="row" >
                  <div class="border" style="border-radius:15px;margin-right:0px;padding:20px 30px 0px 30px">
                      <div style="text-align:center;margin-bottom:20px"><h6>DOG REHOMED</h5></div>
                      <div class="card" style="flex-direction:row; height:auto; align-items:center;margin: 0px 10px">
                      <img src="{{asset('image/'.$adoptions->pic)}}" class="card-img-top" alt="picture" style="width:120px">
                      <div class="card-body" style="padding-left:20px">
                          <h5 class="card-title fw-bold" style="font-style:italic; font-family: Quicksand; color:#;">{{$adoptions->name}}</h5>
                          <h6 class="card-subtitle mb-2" style="font-family: Poppins;">{{($adoptions->gender=="1-Male")? "Male" : "Female" }}, {{$adoptions->age_yr}}y and {{$adoptions->age_month}}m</h6>
                          <h6 class="card-subtitle mb-2 text-muted" style="font-family: Lato; font-weight:10px">{{$adoptions->breed1_name}} , {{$adoptions->breed2_name}}</h6>
                      </div>
                  </div>
                  <input type="hidden" name="dogid" value="{{$adoptions->dog_id}}"/>
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
                        <td>{{$adoptions->size}}</td>
                      </tr>
                      <tr>
                        <th>Color</th>
                        <td>{{$adoptions->color}}</td>
                      </tr>
                      <tr>
                        <th>Birthdate:</th>
                        <td>{{date('M d, Y', strtotime($adoptions->birthdate))}}</td>
                      </tr>
                      <tr>
                        <th>Rescued?</th>
                        <td> <?php              
                          if ($adoptions->rescued == 0) {
                            echo "No";
                          }
                          else {echo "Yes";}
                          ?></td>
                      </tr>
                      <tr>
                        <th>Date Rescued:</th>
                        <td>{{date('M d, Y', strtotime($adoptions->rescuedate))}}</td>
                      </tr>
                      <tr>
                        <th>Neutered/Spayed?</th>
                        <td> <?php              
                          if ($adoptions->neutered == 0) {
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
                      <div class="card" style="flex-direction:row; height:auto; align-items:center;margin: 0px 10px">
                      <img src="{{asset('image/'.$adoptions->profile_pic)}}" alt="profilepic" class="card-img-top" style="width:120px; display:block;border-radius:50%;margin:auto"/>
                      <div class="card-body" style="padding-left:40px">
                          <h5 class="card-title fw-bold" style="font-style:italic; font-family: Quicksand; color:#;">{{$adoptions->username}}</h5>
                          <h6 class="card-subtitle mb-2" style="font-family: Poppins;">{{$adoptions->firstname}}{{' '.$adoptions->lastname}}</h6>
                          <h6 class="card-subtitle mb-2 text-muted" style="font-family: Lato; font-weight:10px">{{$adoptions->city}} , {{$adoptions->province}}</h6>
                      </div>
                  </div>
                  <input type="hidden" name="userid" value="{{$adoptions->user_id}}"/>
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
                          <td>{{$adoptions->username}}</td>
                      </tr>
                      <tr>
                          <th>Full Name</th>
                          <td>{{$adoptions->firstname}}{{' '.$adoptions->lastname}}</td>
                      </tr>
                      <tr>
                          <th>Email</th>
                          <td>{{$adoptions->email}}</td>
                      </tr>
                      <tr>
                          <th>Contact No.</th>
                          <td>{{$adoptions->mobile_no}}</td>
                      </tr>
                      <tr>
                          <th>Address</th>
                          <td>{{$adoptions->address1}}, {{$adoptions->address2}}</td>
                      </tr>
                      <tr>
                          <th>City</th>
                          <td>{{$adoptions->city}}</td>
                      </tr>
                      <tr>
                          <th>Province/Region</th>
                          <td>{{$adoptions->province}}</td>
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