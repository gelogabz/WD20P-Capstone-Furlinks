@extends('components.navbar')

@section('content')
<div class="container p-2">
    <div class="container-fluid d-flex justify-content-center" style="padding-left: 5%; padding-right: 5%; padding-top:0px;margin-bottom: 20px">
        <div class="row" style="width:100%;margin-top:20px">
            @if ($message = Session::get('success'))
            <div class="alert alert-success" style="height:50px">
                <p>{{ $message }}</p>
            </div>
            @endif
            <h2 class="" style="font-family: Poppins; color:#413F42"> My Profile</h2><br><br>
    
    <section class='container card bg-light p-4'>
       
        <div class="row justify-content-center">
            <div class=" card col-12 col-lg-4 text-center border mx-3 p-3 shadow firstcol">
                
                <style>
                    .propic{
                        width: 150px;
                        border-radius: 50%;
                        border-width: 1px;                     
                        height: 150px ;
                        object-fit: cover;
                    }
                    .firstcol{
                        background-color:#f4efe9 ;
                    }
                </style>
                    <div class=' mx-auto'>

                        <img class='propic' src="{{asset('image/'.$userprofiles->profile_pic)}}">
                        
                    </div>
                
                <h4 class='mt-3'>{{$userprofiles->firstname}} {{$userprofiles->lastname}}</h4>
                <h6 class='fst-italic fw-lighter'>"{{$userprofiles->about}}"</h6>
                <style>
                    .tab2,
                    .tab3,
                    .tab1{
                    background-color:#8eb3d9 !important;
                    margin:7px 7px 7px 7px;
                    border-radius: 10px;  
                }

                    .edit-btn{
                        color:#578fc6;
                        font-size:15px;
                        transition: all 0.1s;
                    }
                    .edit-btn:hover{
                        color:#3f79b4;
                        font-size:17px;
                    }
                </style>
                <div class="nav d-block justify-content-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link tab1 active" id="v-pills-myprofile-tab" data-bs-toggle="pill" data-bs-target="#myProfile" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true"><i class="bi bi-people-fill"></i>&nbsp; User Profile</a>
                    <a class="nav-link tab2" id="v-pills-personalinfo-tab" data-bs-toggle="pill" data-bs-target="#personalinfo" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false"><i class="bi bi-file-earmark-person-fill"></i>&nbsp;Personal Info</a>
                    <a class="nav-link tab3" id="v-pills-doghistory-tab" data-bs-toggle="pill" data-bs-target="#doghistory" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false"><i class="bi bi-hourglass-bottom"></i>&nbsp; Dog History</a>
                </div>

                <div class="mt-3">
                    <a class="btn edit_btn" href="/userprofile/{{$userprofiles->id}}/edit">Edit Profile</a>
                </div>
                
            </div>

                <br>

            <div class="  card col-12 col-lg-7 border mx-3 p-3 shadow firstcol">
                <div class="tab-content p-3 showcolor" id="v-pills-tabContent">
            
                    <style>
                    .showcolor{
                        background-color: #f4efe9 ;
                    }
                    </style>
                    {{-- My Profile --}}
                    <div class="tab-pane fade show active " id="myProfile" role="tabpanel" aria-labelledby="v-pills-myprofile-tab" tabindex="0">
                        <h3>Profile Information</h3>
                        <div class='row'>
                            <div class='col-12 col-md-6'>
                                <label for="firstname" class="col-sm-4 col-form-label fw-bold" style="font-family: 'Lato', sans-serif;">First Name</label>
                                
                                <input type="text" name="firstname" class="form-control form-control-sm" value="{{$userprofiles->firstname}}" disabled>
                            </div>


                            <div class='col-12 col-md-6 '>
                                <label for="lastname" class="col-sm-4 col-form-label fw-bold" style="font-family: 'Lato', sans-serif;">Last Name</label>
                                <input type="text" name="lastname" class="form-control form-control-sm" value="{{$userprofiles->lastname}}" disabled>
                               
                            </div>
                        </div>
                        <div class='row mt-2'>
                            <div class='col-12 '>
                                <label class='fw-bold' style="font-family: 'Lato', sans-serif;">About</label>
                                <textarea type="text" value="{{$userprofiles->about}}" name="about" class="form-control form-control-sm" rows='15' cols='15' disabled>{{$userprofiles->about}}</textarea>
                            </div>
                        </div>
                    </div>


                     {{-- Personal Info --}}
                     <div class="tab-pane fade show  " id="personalinfo" role="tabpanel" aria-labelledby="v-pills-myprofile-tab" tabindex="0">
                        <h3>Personal Information</h3>
                        <div class='row'>
                            <div class='col-12 col-md-6 mt-4'>
                                <label class='col-sm-4 col-form-label'>Address: 1</label>
                                <input type="text" name="address1" class="form-control" value="{{$userprofiles->address1}}" disabled aria-label="Address">
                            </div>
                            
                            <div class='col-12 col-md-6 mt-4'>
                                <label class='col-sm-4 col-form-label'>Address: 2</label>
                                <input type="text" name="address2" class="form-control" value="{{$userprofiles->address2}}" disabled aria-label="Address">
                            </div>
                        </div>

                        <div class='row'>
                            <div class='col-12 col-md-6 mt-4'>
                                <label for="city" class='col-sm-4 col-form-label'>City</label>
                                <input type="text" name="city" class="form-control" value="{{$userprofiles->city}}" disabled>
                            </div>

                            <div class='col-12 col-md-6 mt-4'>
                              <label for="province" class='col-sm-4 col-form-label'>Province</label>
                              <input type="text" name="province" class="form-control" value="{{$userprofiles->province}}" disabled>
                            </div>
                        </div>
        
                        <div class='row'>
                                <div class='col-12 col-md-6 mt-4'>
                                    <label for="mobile_no" class='col-sm-4 col-form-label'>Mobile No</label>
                                    <input type="text" name="mobile_no" class="form-control" value="{{$userprofiles->mobile_no}}" disabled>
                                </div>

                                <div class='col-12 col-md-6 mt-4'>
                                    <label for='gender' class='col-sm-4 col-form-label' >Gender</label>
                                    <input type="text" name="gender" class="form-control" value="{{$userprofiles->gender}}" disabled>
                                 </div>
                        </div>

                        <div class='row mt-2'>
                            <div class='col-12 col-md-6 mt-4'>
                                <label for="hometype" class='col-12 col-md-6 col-form-label'>Type of home</label>
                                <input type="text" name="hometype" class="form-control" value="{{$userprofiles->hometype}}" disabled>
                            </div>

                            <div class='col-12 col-md-6 mt-4'>
                                <label for='allowed' class='col-12 col-md-12 col-form-label' >Are pets allowed in your home ?</label>
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckCheckedDisabled" checked disabled>
                                <label class="form-check-label">{{($userprofiles->allowed==0)? "No" : "Yes" }}</label>
                            </div>

                            <div class='col-12 col-md-12 mt-3'>
                                <label for="funds" class='col-sm-4 col-form-label'>Source of funds</label>
                                <input type="text" name="funds" class="form-control" value="{{$userprofiles->funds}}" disabled aria-label="funds">
                            </div>
                        </div>

                    </div>
                     {{-- Dog Historys --}}
                    <div class="tab-pane fade show  " id="doghistory" role="tabpanel" aria-labelledby="v-pills-myprofile-tab" tabindex="0">    
                        <h3>Dog History</h3>

                        <div class="row">
                            <div class='col-12 col-md-6 mt-4'>
                                <label for='withpets' class='col-12 col-md-12 col-form-label' >Do you currently have pets?</label>
                                <input name='withpets'class="form-check-input" type="checkbox" value="" id="flexCheckCheckedDisabled" checked disabled>
                                <label class="form-check-label">{{($userprofiles->withpets==0)? "No" : "Yes" }}</label>
                            </div>

                            <div class='col-12 col-md-3 mt-4'>
                                <label for="dogs" class=' col-form-label'>If yes, how many dogs ?</label>
                                <input type="text" name="dogs" class="form-control" value="{{$userprofiles->dogs}}" style="width:80px;" disabled>
                            </div>

                            <div class='col-12 col-md-3 mt-4'>
                                <label for="cats" class=' col-form-label'>If yes, how many cats ?</label>
                                <input type="text" name="cats" class="form-control" value="{{$userprofiles->cats}}" style="width:80px;" disabled>
                            </div>
                       </div>

                       <div class="row">
                            <div class='col-12 col-md-6 mt-4'>
                                <label for='allergy' class=' col-form-label' >Does any member of your household have any known allergies to animals ?</label>
                                <input name='allergy'class="form-check-input" type="checkbox" value="" id="flexCheckCheckedDisabled" checked disabled>
                                <label class="form-check-label">{{($userprofiles->allergy==0)? "No" : "Yes" }}</label>
                            </div>

                            <div class='col-12 col-md-6 mt-4'>
                                <label for='allvaxed' class='col-12 col-form-label' >If you have  pets, have they all been vaccinated ?</label>
                                <input name='allvaxed'class="form-check-input" type="checkbox" value="" id="flexCheckCheckedDisabled" checked disabled>
                                <label class="form-check-label">{{($userprofiles->allvaxed==0)? "No" : "Yes" }}</label>
                            </div>
                
                        </div>

                        <div class="row">
                            <div class='col-12 col-md-6 mt-4'>
                                <label for='allneut' class='col-12 col-form-label' >If you have pets, are they all spayed/neutered ?</label>
                                <input name='allneut'class="form-check-input" type="checkbox" value="" id="flexCheckCheckedDisabled" checked disabled>
                                <label class="form-check-label">{{($userprofiles->allneut==0)? "No" : "Yes" }}</label>
                            </div>

                            <div class='col-12 col-md-6 mt-4'>
                                <label for='euthanized' class='col-12 col-form-label' >Have you ever had a pet euthanized ?</label>
                                <input name='euthanized'class="form-check-input" type="checkbox" value="" id="flexCheckCheckedDisabled" checked disabled>
                                <label class="form-check-label">{{($userprofiles->euthanized==0)? "No" : "Yes" }}</label>
                            </div>
                
                        </div>

                        <div class="row">
                            <div class='col-12 col-md-6 mt-4'>
                                <label for='lostpet' class='col-12 col-form-label' >Have you ever lost pet?</label>
                                <input name='lostpet'class="form-check-input" type="checkbox" value="" id="flexCheckCheckedDisabled" checked disabled>
                                <label class="form-check-label">{{($userprofiles->lostpet==0)? "No" : "Yes" }}</label>
                            </div>

                            <div class='col-12 col-md-6 mt-4'>
                                <label for="priresp" class='col-12 col-form-label'>Who will have primary responsibility of the dog's care?</label>
                                <input type="text" name="priresp" class="form-control" value="{{$userprofiles->priresp}}" disabled>
                            </div>
                
                        </div>

                        <div class="row">
                            <div class='col-12 col-md-6 mt-4'>
                                <label for="finresp" class='col-12 col-form-label'>Who will have financial responsibility of the dog?</label>
                                <input type="text" name="finresp" class="form-control" value="{{$userprofiles->finresp}}" disabled>
                            </div>

                            <div class='col-12 col-md-6 mt-4'>
                                <label for='lefthome' class='col-12 col-form-label' >Will your dog be alone at home?</label>
                                <input name='lefthome'class="form-check-input" type="checkbox" value="" id="flexCheckCheckedDisabled" checked disabled>
                                <label class="form-check-label">{{($userprofiles->lefthome==0)? "No" : "Yes" }}</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class='col-12 mt-4'>
                                <label for="hours" class=' col-form-label'>If yes, for how long ?</label>
                                <input type="text" name="hours" class="form-control" value="{{$userprofiles->hours}}" style="width:80px;" disabled>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </section>
    </div>
</div>

   
</div>


@endsection