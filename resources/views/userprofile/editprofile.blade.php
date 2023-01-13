@extends('components.navbar')

@section('content')
<style>
    .file-upload-input {
        position: absolute;
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;
        outline: none;
        opacity: 0;
        cursor: pointer;
        }
    .image-upload-wrap {
        margin-top: 0px;
        border: 4px dashed #5082B7 !important ;
        position: relative;
        text-align: center;
        display:none;
        margin: auto;
        }
    .image-dropping,
    .image-upload-wrap:hover {
        background-color:#cfe5fd !important ;
        }
    .image-title-wrap {
        padding: 15px 15px 15px 15px;
        text-align: center;
        }
    .drag-text {
        text-align: center;
        }
    .drag-text h3 {
        font-weight: 100;
        color: #5082B7 !important ;
        padding: 60px 0;
        }
    .file-upload-image {
        max-height: 200px;
        max-width: 200px;
        margin: 0px;
        text-align: center;
        display:block;
        margin: auto;
        border: 4px #5082B7 !important ;
        }
    .remove-image {
        height: 40px;
        width: 150px;
        border-radius: 12px;
        background-color: #799FC8 ;
        border-color:#5082B7 !important ;
        color:#F9F9F9;
        text-decoration: none;
        font-family: 'Lato', sans-serif;
        margin:5px;
        vertical-align: middle;
        }
    .remove-btn,
    .file-upload-none{
        display: show;
    }
    .remove-image:hover {
        background-color:#6388af !important ;
        transition: all .5s ease;
        -webkit-transition: all .5s ease;
        -moz-transition: all .5s ease;
        -o-transition: all .5s ease;
        -ms-transition: all .5s ease;
        }
    .remove-image:active {
        border: 0;
        transition: all .2s ease;
        }
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

<div class="container p-2">
    <div class="container-fluid d-flex justify-content-center" style="padding-left: 5%; padding-right: 5%; padding-top:0px;margin-bottom: 20px">
        <div class="row" style="width:100%;margin-top:20px">
            @if ($message = Session::get('success'))
            <div class="alert alert-success" style="height:50px">
                <p>{{ $message }}</p>
            </div>
            @endif
            <h2 style="font-family: 'Poppins', sans-serif;">Edit Profile</h2><br><br>
    
    <section class='container card bg-light p-4'>
        <form action="{{route('userprofile.update', $userprofiles->id)}}" method="POST" enctype="multipart/form-data">
            {!! csrf_field() !!}
            @method('PATCH')

        <div class="row justify-content-center">
            <div class=" card col-12 col-lg-4 text-center border mx-3 p-3 shadow firstcol">
               
                    {{-- <div class=' mx-auto'>

                        <img class='propic' src="{{asset('image/'.$userprofiles->profile_pic)}}">

                        <div class="input-group mt-4">
                            <input type="file" class="form-control form-sm-control" id="profile_pic" name="profile_pic" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                          </div>
                    </div> --}}

                    <div class="form-group mb-2" style="padding-top:30px;padding-bottom:3px">
                        <div class="image-upload-wrap justify-content-center" style="height:200px;width:200px">
                            <input class="file-upload-input propic" type='file' onchange = "readURL(this);" accept="image/*" id="profile_pic" name="profile_pic" required/>
                            <div class="drag-text" style="padding-top:30%">
                            <i class="fa-solid fa-photo-film" style="font-size:50px;color:#5082B7;"></i><br><br><h6>Drag and drop a file <br>or click to browse</h5>
                            </div>
                        </div>
            
                        <div class="file-upload-content">
                            <img class="propic" id="imgdisplay" src="{{asset('image/'.$userprofiles->profile_pic)}}" alt="your image" />
                            <div class="container justify-content-center">
                              <div class="image-title-wrap justify-content-center"></div>
                              <center>
                                  <button id="rembutton" type="button" onclick="removeUpload()" class="remove-image" style="text-align:center;width:250px">Remove selected image</button>
                                </div>
                        </div>
                    </div>
                
                <h4 class='mt-3'>{{$userprofiles->firstname}} {{$userprofiles->lastname}}</h4>

                <h6 class='mt-2 fst-italic fw-lighter'>"{{$userprofiles->about}}"</h6>
                <style>
                    .tab2,
                    .tab3,
                    .tab1{
                    background-color:#8eb3d9 !important;
                    margin:7px 7px 7px 7px;
                    border-radius: 10px;  
                }
                .confirmchanges{
                    background-color:#799FC8;
                    border-radius:10px;
                    border:none;
                    padding:7px 10px 7px 10px;
                    font-family: 'Lato', sans-serif;
                    transition: all 0.2s;
                }
                .confirmchanges:hover{
                    background-color:#edf1f6;
                    border-color:#799FC8;
                    border-style: solid;
                    border-width: 1px;
                    padding:7px 15px 7px 15px;
                    color:#4d82bb;
                    font-weight: bold;
                    font-size:15px;
                }
                </style>
                <div class=" mt-4 nav d-block justify-content-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link tab1 active" id="v-pills-myprofile-tab" data-bs-toggle="pill" data-bs-target="#myProfile" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true"><i class="bi bi-people-fill"></i>&nbsp; User Profile</a>
                    <a class="nav-link tab2" id="v-pills-personalinfo-tab" data-bs-toggle="pill" data-bs-target="#personalinfo" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false"><i class="bi bi-file-earmark-person-fill"></i>&nbsp;Personal Info</a>
                    <a class="nav-link tab3" id="v-pills-doghistory-tab" data-bs-toggle="pill" data-bs-target="#doghistory" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false"><i class="bi bi-hourglass-bottom"></i>&nbsp; Dog History</a>
                </div>

                <div class="mt-3">
                    {{-- <a href="/userprofile/{{$userprofiles->user_id}}/edit">Edit Profile</a> --}}
                    
                <input type="submit" class="confirmchanges" value="Confirm Changes">
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
                                
                                <input type="text" name="firstname" class="form-control form-control-sm" value="{{$userprofiles->firstname}}" >
                            </div>


                            <div class='col-12 col-md-6 '>
                                <label for="lastname" class="col-sm-4 col-form-label fw-bold" style="font-family: 'Lato', sans-serif;">Last Name</label>
                                <input type="text" name="lastname" class="form-control form-control-sm" value="{{$userprofiles->lastname}}" >
                               
                            </div>
                        </div>
                        <div class='row mt-2'>
                            <div class='col-12 '>
                                <label class='fw-bold' style="font-family: 'Lato', sans-serif;">About</label>
                                <textarea type="text" value="{{$userprofiles->about}}" name="about" class="form-control form-control-sm" rows='15' cols='15' >{{$userprofiles->about}}</textarea>
                            </div>
                        </div>
                    </div>


                     {{-- Personal Info --}}
                     <div class="tab-pane fade show  " id="personalinfo" role="tabpanel" aria-labelledby="v-pills-myprofile-tab" tabindex="0">
                        <h3>Personal Information</h3>
                        <div class='row'>
                            <div class='col-12 col-md-6 mt-4'>
                                <label class='col-sm-4 col-form-label'>Address: 1</label>
                                <input type="text" name="address1" class="form-control" value="{{$userprofiles->address1}}"  aria-label="Address">
                            </div>
                            
                            <div class='col-12 col-md-6 mt-4'>
                                <label class='col-sm-4 col-form-label'>Address: 2</label>
                                <input type="text" name="address2" class="form-control" value="{{$userprofiles->address2}}"  aria-label="Address">
                            </div>
                        </div>

                        <div class='row'>
                            <div class='col-12 col-md-6 mt-4'>
                                <label for="city" class='col-sm-4 col-form-label'>City</label>
                                <input type="text" name="city" class="form-control" value="{{$userprofiles->city}}" >
                            </div>

                            <div class='col-12 col-md-6 mt-4'>
                              <label for="province" class='col-sm-4 col-form-label'>Province</label>
                              <input type="text" name="province" class="form-control" value="{{$userprofiles->province}}" >
                            </div>
                        </div>
        
                        <div class='row'>
                                <div class='col-12 col-md-6 mt-4'>
                                    <label for="mobile_no" class='col-sm-4 col-form-label'>Mobile No</label>
                                    <input type="text" name="mobile_no" class="form-control" value="{{$userprofiles->mobile_no}}" >
                                </div>

                                {{-- <div class='col-12 col-md-6 mt-4'>
                                    <label for='gender' class='col-sm-4 col-form-label' >Gender</label>
                                    <input type="text" name="gender" class="form-control" value="{{$userprofiles->gender}}" >
                                 </div> --}}

                                 <div class='col-12 col-md-6 mt-4'>
                                    <label for='gender' class='col-sm-4 col-form-label'>Gender</label>
                                    <select name='gender' class="form-select " aria-label=".form-select-sm example" required>
                                        
                                        <option value="1-Male" {{($userprofiles->gender=="1-Male")? "selected" : "" }}>Male</option>
                                        <option value="2-Female" {{($userprofiles->gender=="2-Female")? "selected" : "" }}>Female</option>
                                    </select>
                                </div>
                        </div>

                        <div class='row mt-2'>
                            {{-- <div class='col-12 col-md-6 mt-4'>
                                <label for="hometype" class='col-12 col-md-6 col-form-label'>Type of home</label>
                                <input type="text" name="hometype" class="form-control" value="{{$userprofiles->hometype}}" required >
                            </div> --}}

                            <div class='col-12 col-md-6 mt-4'>
                                <label for="hometype" class='col-12 col-md-6 col-form-label'>Type of Home</label>
                                <select name="hometype" class="form-select " aria-label=".form-select-sm example" required>
                                    <option value="House"{{($userprofiles->hometype=="House")? "selected" : "" }}>House</option>
                                    <option value="Condo"{{($userprofiles->hometype=="Condo")? "selected" : "" }}>Condo</option>
                                    <option value="Apartment"{{($userprofiles->hometype=="Apartment")? "selected" : "" }}>Apartment</option>
                                   
                                </select>
                            </div>

                            <div class='col-12 col-md-6 mt-4'>
                                {{-- <label for='allowed' class='col-12 col-md-12 col-form-label' >Are pets allowed in your home ?</label>
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked >
                                <label class="form-check-label">{{($userprofiles->allowed==0)? "No" : "Yes" }}</label> --}}
                                    <label for="allowed" class='mt-4 mb-2'>Are pets allowed in your home ?</label>
                                    <div class="row">
                                        <div class="col-3 form-check d-flex justify-content-center ms-3 ">
                                            <input id="gridCheck1" value='1' {{($userprofiles->allowed=="1")? "checked" : "" }} name='allowed' class="form-check-input custom-control" type="radio">
                                            <label class="form-check-label" for="gridCheck1">&nbsp; Yes</label>                       
                                        </div>

                                        <div class="col-3 form-check d-flex justify-content-center ms-3 ">
                                            <input id="gridCheck2" value='0' {{($userprofiles->allowed=="0")? "checked" : "" }} name='allowed' class="form-check-input custom-control" type="radio">
                                            <label class="form-check-label" for="gridCheck2"> &nbsp; No</label>
                                        </div>
                                    </div>
                            </div>

                            {{-- <div class='col-12 col-md-12 mt-3'>
                                <label for="funds" class='col-sm-4 col-form-label'>Source of funds</label>
                                <input type="text" name="funds" class="form-control" value="{{$userprofiles->funds}}"  aria-label="funds">
                            </div> --}}

                            <div class='col-12 col-md-12 mt-3'>
                                <label for="funds" class='col-sm-4 col-form-label'>Source of Funds</label>
                                <select name="funds" class="form-select " aria-label=".form-select-sm example">
                                    <option value="Employment"{{($userprofiles->funds=="Employment")? "selected" : "" }}>Employment</option>
                                    <option value="Business"{{($userprofiles->funds=="Business")? "selected" : "" }}>Business</option>
                                    <option value="Freelance"{{($userprofiles->funds=="Freelance")? "selected" : "" }}>Freelance</option>
                                    <option value="Family Income"{{($userprofiles->funds=="Family Income")? "selected" : "" }}>Family Income</option>
                                    <option value="Others"{{($userprofiles->funds=="Others")? "selected" : "" }}>Others</option>
                                </select>
                            </div>

                        </div>

                    </div>
                     {{-- Dog Historys --}}
                    <div class="tab-pane fade show  " id="doghistory" role="tabpanel" aria-labelledby="v-pills-myprofile-tab" tabindex="0">    
                        <h3>Dog History</h3>
                        {{-- Question number 1 --}}
                        <div class="row">
                            {{-- <div class='col-12 col-md-6 mt-4'>
                                <label for='withpets' class='col-12 col-md-12 col-form-label' >Do you currently have pets?</label>
                                <input name='withpets'class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked >
                                <label class="form-check-label">{{($userprofiles->withpets==0)? "No" : "Yes" }}</label>
                            </div> --}}
                            <div class='col-12 col-md-6 mt-4'>
                                <div class="row">
                                    <label for='withpets' class='col-12 col-md-12 col-form-label' >Do you currently have pets?</label>
                                    <div class="col-12 form-check  ms-3 ">
                                        <input id="gridCheck1" value='1' {{($userprofiles->withpets=="1")? "checked" : "" }} name='withpets' class="form-check-input custom-control" type="radio">
                                            <label class="form-check-label" for="gridCheck1">&nbsp; Yes</label>           
                                    </div>

                                    <div class="col-12 form-check  ms-3 ">
                                        <input id="gridCheck2" value='0' {{($userprofiles->withpets=="0")? "checked" : "" }} name='withpets' class="form-check-input custom-control" type="radio">
                                            <label class="form-check-label" for="gridCheck2">&nbsp; No</label>    
                                    </div>
                                </div>
                            </div> 

                            <div class='col-12 col-md-3 mt-4'>
                                <label for="dogs" class=' col-form-label'>If yes, how many dogs ?</label>
                                <input type="number" name="dogs" class="form-control" value="{{$userprofiles->dogs}}" style="width:80px;" >
                            </div>

                            <div class='col-12 col-md-3 mt-4'>
                                <label for="cats" class=' col-form-label'>If yes, how many cats ?</label>
                                <input type="number" name="cats" class="form-control" value="{{$userprofiles->cats}}" style="width:80px;" >
                            </div>
                       </div>
                        {{-- Question number 2 --}}
                       <div class="row">
                            <div class='col-12 col-md-6 mt-4'>
                                {{-- <label for='allergy' class=' col-form-label' >Does any member of your household have any known allergies to animals ?</label>
                                <input name='allergy'class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked >
                                <label class="form-check-label">{{($userprofiles->allergy==0)? "No" : "Yes" }}</label> --}}
                                <label for='allergy' class='col-12 col-md-12 col-form-label' >Does any member of your household have any known allergies to animals ?</label>
                                <div class="col-12 form-check  ms-3 ">
                                    <input id="gridCheck1" value='1' {{($userprofiles->allergy=="1")? "checked" : "" }} name='allergy' class="form-check-input custom-control" type="radio">
                                        <label class="form-check-label" for="gridCheck1">&nbsp; Yes</label>           
                                </div>

                                <div class="col-12 form-check  ms-3 ">
                                    <input id="gridCheck2" value='0' {{($userprofiles->allergy=="0")? "checked" : "" }} name='allergy' class="form-check-input custom-control" type="radio">
                                        <label class="form-check-label" for="gridCheck2">&nbsp; No</label>    
                                </div>
                            </div>
                         {{-- Question number 3 --}}
                            <div class='col-12 col-md-6 mt-4'>
                                {{-- <label for='allvaxed' class='col-12 col-form-label' >If you have  pets, have they all been vaccinated ?</label>
                                <input name='allvaxed'class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked >
                                <label class="form-check-label">{{($userprofiles->allvaxed==0)? "No" : "Yes" }}</label> --}}
                                <label for='allvaxed' class='col-12 col-md-12 col-form-label' >If you have  pets, have they all been vaccinated ?</label>
                                <div class="col-12 form-check  ms-3 ">
                                    <input id="gridCheck1" value='1' {{($userprofiles->allvaxed=="1")? "checked" : "" }} name='allvaxed' class="form-check-input custom-control" type="radio">
                                        <label class="form-check-label" for="gridCheck1">&nbsp; Yes</label>           
                                </div>

                                <div class="col-12 form-check  ms-3 ">
                                    <input id="gridCheck2" value='0' {{($userprofiles->allvaxed=="0")? "checked" : "" }} name='allvaxed' class="form-check-input custom-control" type="radio">
                                        <label class="form-check-label" for="gridCheck2">&nbsp; No</label>    
                                </div>
                            </div>
                
                        </div>
                        {{-- Question number 4 --}}
                        <div class="row">
                            <div class='col-12 col-md-6 mt-4'>
                                {{-- <label for='allneut' class='col-12 col-form-label' >If you have pets, are they all spayed/neutered ?</label>
                                <input name='allneut'class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked >
                                <label class="form-check-label">{{($userprofiles->allneut==0)? "No" : "Yes" }}</label> --}}
                                <label for='allneut' class='col-12 col-md-12 col-form-label' >If you have pets, are they all spayed/neutered ?</label>
                                <div class="col-12 form-check  ms-3 ">
                                    <input id="gridCheck1" value='1' {{($userprofiles->allneut=="1")? "checked" : "" }} name='allneut' class="form-check-input custom-control" type="radio">
                                        <label class="form-check-label" for="gridCheck1">&nbsp; Yes</label>           
                                </div>

                                <div class="col-12 form-check  ms-3 ">
                                    <input id="gridCheck2" value='0' {{($userprofiles->allneut=="0")? "checked" : "" }} name='allneut' class="form-check-input custom-control" type="radio">
                                        <label class="form-check-label" for="gridCheck2">&nbsp; No</label>    
                                </div>
                            </div>
                        {{-- Question number 5 --}}
                            <div class='col-12 col-md-6 mt-4'>
                                {{-- <label for='euthanized' class='col-12 col-form-label' >Have you ever had a pet euthanized ?</label>
                                <input name='euthanized'class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked >
                                <label class="form-check-label">{{($userprofiles->euthanized==0)? "No" : "Yes" }}</label> --}}
                                <label for='euthanized' class='col-12 col-md-12 col-form-label'>Have you ever had a pet euthanized ?</label>
                                <div class="col-12 form-check  ms-3 ">
                                    <input id="gridCheck1" value='1' {{($userprofiles->euthanized=="1")? "checked" : "" }} name='euthanized' class="form-check-input custom-control" type="radio">
                                        <label class="form-check-label" for="gridCheck1">&nbsp; Yes</label>           
                                </div>

                                <div class="col-12 form-check  ms-3 ">
                                    <input id="gridCheck2" value='0' {{($userprofiles->euthanized=="0")? "checked" : "" }} name='euthanized' class="form-check-input custom-control" type="radio">
                                        <label class="form-check-label" for="gridCheck2">&nbsp; No</label>    
                                </div>
                            </div>
                
                        </div>
                        {{-- Question number 6 --}}
                        <div class="row">
                            <div class='col-12 col-md-6 mt-4'>
                                {{-- <label for='lostpet' class='col-12 col-form-label' >Have you ever lost pet?</label>
                                <input name='lostpet'class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked >
                                <label class="form-check-label">{{($userprofiles->lostpet==0)? "No" : "Yes" }}</label> --}}
                                <label for='lostpet' class='col-12 col-md-12 col-form-label'>Have you ever lost pet?</label>
                                <div class="col-12 form-check  ms-3 ">
                                    <input id="gridCheck1" value='1' {{($userprofiles->lostpet=="1")? "checked" : "" }} name='lostpet' class="form-check-input custom-control" type="radio">
                                        <label class="form-check-label" for="gridCheck1">&nbsp; Yes</label>           
                                </div>

                                <div class="col-12 form-check  ms-3 ">
                                    <input id="gridCheck2" value='0' {{($userprofiles->lostpet=="0")? "checked" : "" }} name='lostpet' class="form-check-input custom-control" type="radio">
                                        <label class="form-check-label" for="gridCheck2">&nbsp; No</label>    
                                </div>
                            </div>

                            <div class='col-12 col-md-6 mt-4'>
                                <label for="priresp" class='col-12 col-form-label'>Who will have primary responsibility of the dog's care?</label>
                                <select name="priresp" class="form-select " aria-label=".form-select-sm example">
                                    <option value="Myself" {{($userprofiles->priresp=="Myself")? "selected" : "" }}>Myself</option>
                                    <option value="Myspouse/partner" {{($userprofiles->priresp=="Myspouse/partner")? "selected" : "" }}>My spouse/partner</option>
                                    <option value="AnotherFamilymember" {{($userprofiles->priresp=="AnotherFamilymember")? "selected" : "" }}>Another Family member</option>
                                    <option value="Househelp" {{($userprofiles->priresp=="Househelp")? "selected" : "" }}>Househelp</option>
                                    <option value="Others" {{($userprofiles->priresp=="Others")? "selected" : "" }}>Others</option>
                                </select>
                            </div>
                
                        </div>

                        <div class="row">
                            <div class='col-12 col-md-6 mt-4'>
                                <label for="finresp" class='col-12 col-form-label'>Who will have financial responsibility of the dog?</label>
                                <select name="finresp" class="form-select " aria-label=".form-select-sm example">
                                    <option value="Myself" {{($userprofiles->finresp=="Myself")? "selected" : "" }}>Myself</option>
                                    <option value="My spouse/partner" {{($userprofiles->finresp=="My spouse/partner")? "selected" : "" }}>My spouse/partner</option>
                                    <option value="Another Famil ymember" {{($userprofiles->finresp=="Another Famil ymember")? "selected" : "" }}>Another Family member</option>
                                    <option value="Househelp" {{($userprofiles->finresp=="Househelp")? "selected" : "" }}>Househelp</option>
                                    <option value="Others" {{($userprofiles->finresp=="Others")? "selected" : "" }}>Others</option>
                                </select>
                            </div>

                            <div class='col-12 col-md-6 mt-4'>
                                <label for='lefthome' class='col-12 col-form-label' >Will your dog be alone at home?</label>
                                <div class="col-12 form-check  ms-3 ">
                                    <input id="gridCheck1" value='1' {{($userprofiles->lefthome=="1")? "checked" : "" }} name='lefthome' class="form-check-input custom-control" type="radio">
                                        <label class="form-check-label" for="gridCheck1">&nbsp; Yes</label>           
                                </div>

                                <div class="col-12 form-check  ms-3 ">
                                    <input id="gridCheck2" value='0' {{($userprofiles->lefthome=="0")? "checked" : "" }} name='lefthome' class="form-check-input custom-control" type="radio">
                                        <label class="form-check-label" for="gridCheck2">&nbsp; No</label>    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class='col-12 mt-4'>
                                <label for="hours" class=' col-form-label'>If yes, for how long ?</label>
                                <input type="text" name="hours" class="form-control" value="{{$userprofiles->hours}}" style="width:80px;" >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
    </div>
</div>
</div>

<!--SCRIPT for drag and drop of images -->
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            let reader = new FileReader();
            reader.onload = function(e) {
            document.getElementById("imgdisplay").className = "file-upload-image";
            $('.image-upload-wrap').hide();
            $('.file-upload-image').attr('src', e.target.result);
            $('.file-upload-content').show();
            $('.image-title-wrap').html(input.files[0].name);
            document.getElementById("rembutton").className = "remove-image";
            sessionStorage.setItem("img", reader.result);
            };

            reader.readAsDataURL(input.files[0]);
            saveImage();
        } else {
            removeUpload();
        }
        }

    function removeUpload() {
        $('.file-upload-input').replaceWith($('.file-upload-input').clone());
        $('.file-upload-content').hide();
        $('.image-upload-wrap').show();
        document.getElementById("profile_pic").value = "";
        $('.image-title-wrap').html("");
        
        }
        $('.image-upload-wrap').bind('dragover', function () {
            $('.image-upload-wrap').addClass('image-dropping');
        });
        $('.image-upload-wrap').bind('dragleave', function () {
            $('.image-upload-wrap').removeClass('image-dropping');
        });
</script>


@endsection