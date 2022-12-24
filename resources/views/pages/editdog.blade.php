@extends ('components.navbar')

@section('content')
<hr style="margin:0px 0px 5px 0px;padding:0px 0px 0px 0px;border-color:#ececec">

<div class="container-fluid d-flex justify-content-center" style="padding-left: 5%; padding-right: 5%; padding-top:0px;margin-bottom: 20px">
    <div class="row" style="width:100%; margin-top:0px; margin-bottom: 20px;">
      <!--Dog profile pic and social media actions -->  
      <div class="col-lg-4 col-sm-6" style="margin-bottom:10px">
        <img src="{{asset('build/images/searchres/fem8.jpg') }}" alt="dog" class="image" style="width:100%;display:block;border-radius: 20px;margin-bottom:10px;margin-top:10px">
        <div style="text-align: center;">
          <button class="btn-primary border rounded-1 px-3 pb-2" type="submit" >Remove Uploaded Image</i></button>
        </div>
      </div>
      <!--Dog profile information -->
      <div class="col-lg-5 col-sm-6" style="padding-left:20px;padding-top:15px;margin-bottom: 20px;">
        <h5>Female, 3 mo. old<br>
          <h6><i class="fa-solid fa-paw" style="font-size:medium;color:#811D60"></i><span style=color:#5d5d5d;"> Aspin - Spitz - Shih Tzu</span></h6>
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
            <td>Mika</td>
          </tr>
          <tr>
            <th>Location:</th>
            <td>Pandi, Bulacan</td>
          </tr>
          <tr>
            <th>Date born/rescued:</th>
            <td>21 May 2022</td>
          </tr>
          <tr>
            <th>Breed of Sire:</th>
            <td>Labrador - GSD</td>
          </tr>
          <tr>
            <th>Breed of Dam:</th>
            <td>Aspin</td>
          </tr>
          <tr>
            <th>Rescued Dog:</th>
            <td>No</td>
          </tr>
          <tr style="border-bottom:0.3pt solid #e1e1e1;">
            <td colspan="2" style="padding-top:20px;padding-left:0px;font-size:15px"><i>Medical History</th>          
          </tr>  
          <tr>
            <th>Vaccinated?</th>
            <td>Yes</td>
          </tr>
          <tr>
            <th>Anti-rabies?</th>
            <td>Yes</td>
          </tr>
          <tr>
            <th>Neutered/Spayed?</th>
            <td>No</td>
          </tr>
          <tr>
            <th>Medical issue/s:</th>
            <td>None</td>
          </tr>
          <tr>
            <th>Behavior:</th>
            <td>Playful</td>
          </tr>
          <tr>
            <th>Reason for posting:  </th>
            <td>Dam and sire (rescued dogs) are still unneutered</td>
          </tr>
          <tr>
            <th>Adoption Fee:  </th>
            <td>₱2,000 - vaccination and food costs</td>
          </tr>  
        </table>
      </div>
    </div>
</div>

@endsection