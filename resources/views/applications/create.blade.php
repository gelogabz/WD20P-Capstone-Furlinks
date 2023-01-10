@extends ('components.navbar')
@section('content')

<hr style="margin:0px 0px 5px 0px;padding:0px 0px 0px 0px;border-color:#ececec">

<div class="container-fluid d-flex justify-content-center" style="padding-left: 5%; padding-right: 5%; padding-top:0px;margin-bottom:30px">
  <div class="row" style="width:100%;margin-top:5px;margin-bottom:20px">
    <a class="btn btn-outline-primary2" href="{{ url()->previous() }}" type="button" style="vertical-align: bottom;text-align: left;padding-left:10px;width:180px;margin-bottom:20px">
    <i class="fa fa-arrow-left" aria-hidden="true" style="font-size:medium;padding-right:10px;padding-top:4px"></i>Back to Dog Profile</a>

    <div class="row" style="width:100%">          
      <div class="col-md-8 col-sm-12">    
        <h3 class="" style="font-family: Poppins; color:#413F42">Application for Adoption</h3><br>
        <div class="row" style="margin-right:30px">
          <div class="col-lg-5 col-sm-12">          
            <img src="{{asset('Image/'. $dogs->pic)}}" alt="dog" class="image" style="width:80%; display:block; border-radius:20px; margin:auto">
          </div>

          <div class="col-lg-7 col-sm-12" style="padding: 15px 20px 0px 0px;margin-bottom: 20px;">
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
      <div class="col-md-4 col-sm-12" style="padding:0px 0px ">
        <div class="border" style="border-radius:10px;margin:0px 0px;padding:20px 20px">
          <h5 style="text-align:center">Confirm submission of application</h5>
          <form action="{{ route('applications.store') }}" method="POST" enctype="multipart/form-data" target="{{ url()->previous() }}">
            {!! csrf_field() !!} 
            <table style="padding-left: 20px;margin-right:15px;margin-bottom:10px;margin-top:20px;text-align:left;">
              <colgroup>
                  <col span="1" style="width:6%">
                  <col span="1" style="width:94%">
              </colgroup>
              <tr>
                  <td>
                      <div class="custom-control custom-checkbox">
                      <input class="form-check-input" type="checkbox" value="true" id="agree" style="height:15px;text-align: left;" required></input></div>
                  </td>
                  <td class="fineprint">
                      I acknowledge that by submitting this application, I agree to the screening process required to ensure I am qualified to adopt the dog.<br><br>
                  </td>
              </tr>
              <tr>
                  <td>
                      <div class="custom-control custom-checkbox">
                      <input class="form-check-input" type="checkbox" value="true" id="occular" style="height:15px;text-align: left;" required></input></div>
                  </td>
                  <td class="fineprint">
                      I allow the rescuer/poster to conduct an occular inspection of my residence to ensure the safety of the dog to be adopted.<br><br>
                  </td>
              </tr>
              <tr>
                  <td>
                      <div class="custom-control custom-checkbox">
                      <input class="form-check-input" type="checkbox" value="true" id="fullresp" style="height:15px;text-align: left;" required></input></div>
                  </td>
                  <td class="fineprint">
                      I am committed to taking full responsibility for the dog's health and welfare for the rest of its life, which could be 10 years or more.<br><br>
                  </td>
              </tr>
              <tr>
                  <td>
                      <div class="custom-control custom-checkbox">
                      <input class="form-check-input" type="checkbox" value="true" id="fees" style="height:15px;text-align: left;" required></input></div>
                  </td>
                  <td class="fineprint">
                      I fully understand and agree to pay the Adoption Fees to the rescuer/poster upon custody transfer of the dog.  <br><br>
              </td>
              </tr>
              <tr>
                  <td>
                      <div class="custom-control custom-checkbox">
                      <input class="form-check-input" type="checkbox" value="true" id="rights" style="height:15px;text-align: left;" required></input></div>
                  </td>
                  <td class="fineprint">
                  I consent to visiting rights of rescuer/poster should this application result to an adoption, to ensure the terms of the adoption agreement are being
                      followed. 
                          </td>
              </tr>
          </table>
            <div class="row justify-content-center" >
              <input type="hidden" value="{{$dogs->id}}" class="hidden" name="dog_id"/>
              <input type="submit" name="submit" class="btn adopt_btn" value="Submit">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection