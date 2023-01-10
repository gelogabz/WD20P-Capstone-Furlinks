@extends ('components.navbar')
@section('content')

<hr style="margin:0px 0px 5px 0px;padding:0px 0px 0px 0px;border-color:#ececec">

<div class="container-fluid d-flex justify-content-center" style="padding-left: 5%; padding-right: 5%; padding-top:0px;margin-bottom:30px">
  <div class="row" style="width:100%;margin-top:5px;margin-bottom:20px">
    <a class="btn btn-outline-primary2" href="{{ url()->previous() }}" type="button" style="vertical-align: bottom;text-align: left;padding-left:10px;width:180px;margin-bottom:20px">
    <i class="fa fa-arrow-left" aria-hidden="true" style="font-size:medium;padding-right:10px;padding-top:4px"></i>Back to Dog Profile</a>

    <div class="row" style="width:100%">          
      <div class="col-md-8 col-sm-12">    
        <h3 class="" style="font-family: Poppins; color:#413F42">Finalize Adoption</h3><br>
        <div class="row" style="margin-right:30px">
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
            <div class="col col-md-5 col-sm-8" style="padding-left:20px;padding-right:20px;margin-bottom: 20px;">                  
                <table class="table table-borderless" style="margin-top:10px;vertical-align:middle">
                    <colgroup>
                        <col span="1" style="width:55%">
                        <col span="1" style="width:45%">
                    </colgroup>
                    <tr>
                    <tr style="border-bottom:0.3pt solid #e1e1e1;">
                        <th colspan="4" style="padding-left:0px;font-size:16px"><i>Adopter Information</i></th>    
                    </tr>   
                    <tr>
                        <th>Username</th>
                        {{-- <td>{{$applications->username}}</td> --}}
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
                        <td>{{$applications->address1}}</td>
                    </tr>
                    <tr>
                        <th></th>
                        <td>{{$applications->address2}}</td>
                    </tr>
                    <tr>
                        <th>City</th>
                        <td>{{$applications->city}}</td>
                    </tr>
                    <tr>
                        <th>Province/Region</th>
                        <td>{{$applications->province}}</td>
                    </tr>                            
                    <tr>
                        <th>Profile Pic</th>
                        <td><img src="{{asset('image/'.$applications->profile_pic)}}" alt="profilepic" class="image" style="width:120px; display:block;border-radius:50%;"/>                
                        </td>
                    </tr>
                </table>
            </div>   

        </div>
      </div>
    
            <div class="row justify-content-center" >
              <input type="submit" name="submit" class="btn adopt_btn" value="Submit">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection