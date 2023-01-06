@extends ('components.navbar')
@section('content')

<hr style="margin:0px 0px 5px 0px;padding:0px 0px 0px 0px;border-color:#ececec">

<div class="container-fluid d-flex justify-content-center" style="padding-left: 5%; padding-right: 5%; padding-top:0px;margin-bottom: 20px">
    <div class="row" style="width:100%; margin-top:0px; margin-bottom: 20px;">

      <!--Dog profile pic and social media actions -->  
      <div class="col-lg-4 col-sm-6" style="margin-bottom:10px">
        
        <img src="{{asset('image/'.$dogs->pic)}}" alt="dog" class="image" style="width:100%;display:block;border-radius: 20px;margin-bottom:10px;margin-top:10px">
        <div style="text-align: center;">
      
       <a href="/dogprofile/{{$dogs->id}}/edit" class="btn btn-primary3" style="float:center;margin-top:10px"><i class="fa-regular fa-pen-to-square" style="font-size:medium;padding-right: 10px"></i>EDIT</a>
       
       <br>
       <a href="#" class="btn btn-primary3" style="float:center;margin-top:10px">View Applications</a>
      </div>
      </div>

      <!--Dog profile information -->
    
      <div class="col-lg-5 col-sm-6" style="padding-left:20px;padding-top:15px;margin-bottom: 20px;">
        <h5 class="text-primary"> {{$dogs->gender}},  {{$dogs->age_yr}} yrs old<br>
          <h6 ><i class="fa-solid fa-paw" style="font-size:medium;color:#811D60"></i><span style="color:#5d5d5d;" class="text-primary m-2">{{$dogs->breed1_name}} - {{$dogs->breed2_name}}  </span></h6>
          <i class="fa-solid fa-timer" style="font-size:medium;color:#811D60"></i><span style="font-size: small;color: #5d5d5d">Posted 10d ago</span><br></h4>
        <table style="width:100%;color:#581542;margin-top:10px">
          <colgroup>
            <col span="1" style="width:40%">
            <col span="1" style="width:60%">
          </colgroup>
          <tr style="border-bottom:0.3pt solid #e1e1e1;">
            <td colspan="2" style="padding-left:0px;font-size:15px"><i>About the dog</i></th>    
          </tr>         
          <tr>
            <th>Foster Name:</th>
            <td>{{$dogs->name}}</td>
          </tr>
          <tr>
            <th>Location:</th>
            <td>{{$dogs->location}}</td>
          </tr>
          <tr>
            <th>Birthdate:</th>
            <td>{{$dogs->birthdate}}</td>
          </tr>
          <tr>
            <th>Primary Breed:</th>
            <td>{{$dogs->breed1_name}}</td>
          </tr>
          <tr>
            <th>Primary Breed:</th>
            <td>{{$dogs->breed2_name}}</td>
          </tr>
          <tr>
            <th>Rescued Dog:</th>
            <td class="text-primary">{{$dogs->rescued}}</td>
          </tr>
          <tr>
            <th>Date Rescued:</th>
            <td>{{$dogs->rescuedate}}</td>
          </tr>
          <tr style="border-bottom:0.3pt solid #e1e1e1;">
            <td colspan="2" style="padding-top:20px;padding-left:0px;font-size:15px"><i>Medical History</th>          
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
            <th>Neutered/Spayed?</th>
            <td>{{$dogs->neutered}}</td>
          </tr>
          <tr>
            <th>Reason for Fee </th>
            <td>{{$dogs->fee}}</td>
          </tr>
          <tr>
            <th>Adoption Fee: </th>
            <td>{{$dogs->feenotes}}</td>
          </tr>  
        
        </table>
        <div>
       
        </div>
      </div>
    </div>
</div>

@endsection