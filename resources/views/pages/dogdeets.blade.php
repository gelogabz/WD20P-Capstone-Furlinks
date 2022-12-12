@extends ('components.navbar')

@section('dogdeets')
<hr style="margin:0px 0px 5px 0px;padding:0px 0px 0px 0px;border-color:#ececec">

<div class="container-fluid d-flex justify-content-center" style="padding-left: 5%; padding-right: 5%; padding-top:0px;margin-bottom: 20px">
    <div class="row" style="width:100%; margin-top:0px; margin-bottom: 20px;">

      <!--Dog profile pic and social media actions -->  
      <div class="col-lg-4 col-sm-6" style="margin-bottom:10px">
        <img src="{{asset('build/images/searchres/fem8.jpg') }}" alt="dog" class="image" style="width:100%;display:block;border-radius: 20px;margin-bottom:10px;margin-top:10px">
        <div style="text-align: center;">
          <button class="btn-outline-primary2" type="button" style="margin-top:10px"><i class="fa-regular fa-heart" style="font-size:medium;padding-right: 10px; ;"></i>13 Likes</button>
          <span style="padding:5px"></span>
          <button class="btn-outline-primary2" type="button" style="float:center;margin-top:10px"><i class="fa-regular fa-share-from-square" style="font-size:medium;padding-right: 10px;"></i>Share</button>
          <span style="padding:5px"></span>
          <button class="btn-primary3" id="myBtn4" type="button" style="float:center;margin-top:10px"><i class="fa-regular fa-pen-to-square" style="font-size:medium;padding-right: 10px"></i>ADOPT</button>
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

      <!--Foster profile information -->
      <div class="col-lg-3 col-sm-6" style="padding-top:10px;padding-right:20px;padding-left: 20px;">
        <div class="border" style="border-radius:20px;padding:20px 20px 10px 20px">
            <div class="row" style="padding-bottom:5px">
                <div class="col col-auto" style="margin-right:px">
                    <img style="width:55px; border-radius:50%; padding: 2px" src="{{asset('build/images/profilepic/chef.jpg') }}">
                </div>
                <div class="col">
                    <div class="row" style="padding-top: 5px;padding-bottom: 5px;font-size:medium"><a href="profile.html"> @chefarnold </a></div>
                    <div class="row" style="font-size: small;color:gray;vertical-align: bottom;padding-right: 2px;">5.0  
                    <span style="padding-left:2px" class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>(20 reviews)
                    </div>
                </div>
            </div>
            <p style="font-size:13px;line-height:1.6; padding-top:15px">I am a chef who loves to take care of dogs and cats. During my free time, I go around our town to feed stray dogs. Some of my dogs are retired K9 and some are stray dogs that we rescued and took home.</p>
            <p style="font-size:15px;color:#581542"><i>More dogs posted by @chefarnold</i></p> 
            <div class="row" style="margin-bottom:15px">
                <div class="col col-sm-6 col-xs-4" style="margin-bottom:20px;margin-right: 0px;margin-left: 0px;">
                    <div class="containerimg" style="width:100%">
                        <img src="{{asset('build/images/searchres/fem0.jpg') }}" alt="Avatar" class="image" style="width:100%">
                        <div class="middle">
                        <div class="text"><a href='dogdetail.html'>View</a></div>
                        </div>
                    </div>
                </div>
                <div class="col col-sm-6 col-xs-4" style="margin-bottom:20px;margin-right: 0px;margin-left: 0px;">
                    <div class="containerimg" style="width:100%">
                        <img src="{{asset('build/images/dog4.jpg') }}" alt="Avatar" class="image" style="width:100%">
                        <div class="middle">
                        <div class="text"><a href='dogdetail.html'>View</a></div>
                        </div>
                    </div>
                </div>
                <div class="col col-sm-6 col-xs-4" style="margin-bottom:5px">
                    <div class="containerimg" style="width:100%">
                        <img src="{{asset('build/images/dog1.jpg') }}" alt="Avatar" class="image" style="width:100%">
                        <div class="middle">
                        <div class="text"><a href='dogdetail.html'>View</a></div>
                        </div>
                    </div>
                </div>
                <div class="col col-sm-6 col-xs-4" style="margin-bottom:5px">
                    <div class="containerimg" style="width:100%">
                        <img src="{{asset('build/images/searchres/fem3.jpg') }}" alt="Avatar" class="image" style="width:100%">
                        <div class="middle">
                        <div class="text"><a href='dogdetail.html'>View</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
  
    </div>
</div>

@endsection