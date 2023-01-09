@extends('components.navbar')

@section('content')
<div class='container p-5'>
    
            <div class="nav me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active tab1" id="v-pills-myprofile-tab" data-bs-toggle="pill" data-bs-target="#myProfile" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">My Profile</a>
                    <a class="nav-link tab2" id="v-pills-personalinfo-tab" data-bs-toggle="pill" data-bs-target="#personalinfo" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Personal Info</a>
                    <a class="nav-link tab3" id="v-pills-doghistory-tab" data-bs-toggle="pill" data-bs-target="#doghistory" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Dog History</a>
            </div>
    
    <br>
       <div class="tab-content p-3" id="v-pills-tabContent">
              {{-- My Profile --}}
          <div class="tab-pane fade show active " id="myProfile" role="tabpanel" aria-labelledby="v-pills-myprofile-tab" tabindex="0">
            <div class='container'>
            {{-- Style --}}
            <style>
                .tab2,
                .tab3,
                .tab1{
                    background-color:#8eb3d9 !important;
                    margin: 2px 2px 2px 2px;
                    border-radius: 10px;  
                }
                .tab-pane{
                    background-color: #94b5d86c;
                    border-radius: 10px;
                    padding: 18px 18px 18px 18px; 
                }
            
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
                  display:block;
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
                  max-height: 150px;
                  max-width: 150px;
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
                  display: none;
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
            
            </style>
               <form action="{{ route('createprofile.store') }}" method="POST" enctype="multipart/form-data">
        
                <div class="row">
                  <H1>Public Profile</H1><br>
                  
                <h5 class='mb-2'>People visiting your profile will see the following info:
                </h5>
                  
                  <div class="alert alert-warning" role="alert">
                  <p class='mb-0'>Note : Please fill up the form below</p>
                  </div>
                  <div class="row" style="width:100%">
                  <!--Dog profile pic and social media actions -->  
                  <div class="col-lg-4 col-sm-6" style="margin-bottom:10px">
                    <div class="form-group mb-2" style="padding-top:30px;padding-bottom:3px">
                      <div class="image-upload-wrap justify-content-center" style="height:160px;width:150px">
                          <input class="file-upload-input" type='file' onchange = "readURL(this);" accept="image/*" id="profile_pic" name="profile_pic" required/>
                          <div class="drag-text" style="padding-top:30%">
                          <i class="fa-solid fa-photo-film" style="font-size:50px;color:#5082B7;;"></i><br><br><h6>Drag and drop a file <br>or click to browse</h5>
                          </div>
                      </div>
                      <div class="file-upload-content">
                          <img class="file-upload-none" id="imgdisplay" src="#" alt="your image" />
                              <div class="container justify-content-center">
                                <div class="image-title-wrap justify-content-center"></div>
                                <center>
                                  <button id="rembutton" type="button" onclick="removeUpload()" class="remove-btn" style="text-align:center;width:170px">Remove selected image</button>
                          </div>
                      </div>
                    </div>
                  </div>
                  <!--Dog profile information -->
                  <div class="col-lg-6 col-sm-6" style="padding-left:20px;padding-top:15px;margin-bottom: 20px;">
                      @if ($errors->any())
                      <div class="alert alert-danger">
                          <strong>Whoops!</strong> There were some problems with your input.<br><br>
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                      @endif
                    <div class="container">
                     
                            {!! csrf_field() !!}
                        {{-- PATCH- specific part PUT - whole resource --}}
                        {{-- FIRSTNAME --}}
                        <div class="mb-2 row">
                          <label for="firstname" class="col-sm-4 col-form-label fw-bold" style="font-family: 'Lato', sans-serif;">First Name :</label>
                          <div class="col-lg-8">
                            <input type="text" name="firstname" class="form-control form-control-sm">
                          </div>
                        </div>
                        {{-- LASTNAME --}}
                        <div class="mb-2 row">
                          <label for="lastname" class="col-sm-4 col-form-label fw-bold" style="font-family: 'Lato', sans-serif;">Last Name :</label>
                          <div class="col-lg-8">
                            <input type="text" name="lastname" class="form-control form-control-sm">
                          </div>
                        </div>
                        {{-- ABOUT --}}
                        <div class="mb-2 row">
                          <label for="about" class="col-sm-4 col-form-label fw-bold" style="font-family: 'Lato', sans-serif;">About :
                            <span id="lochelp" class="text-muted" style="font-size:.8rem; font-style:italic">
                            </span></label>
                          <div class="col-sm-8">
                            <textarea class="form-control" name="about" style="resize:none;" id="exampleFormControlTextarea1" rows="3"></textarea>
                          </div>
                        </div>
                      </div>
                      
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
                    document.getElementById("pic").value = "";
                    $('.image-title-wrap').html("");
                    
                    }
                    $('.image-upload-wrap').bind('dragover', function () {
                        $('.image-upload-wrap').addClass('image-dropping');
                    });
                    $('.image-upload-wrap').bind('dragleave', function () {
                        $('.image-upload-wrap').removeClass('image-dropping');
                    });
            </script>
            </div>
          </div>
          {{-- Personal Info --}}
          
        <style>
            label{
               font-weight: bold; 
            }
        </style>
        <div class="tab-pane fade" id="personalinfo" role="tabpanel" aria-labelledby="v-pills-personalinfo-tab" tabindex="0">
            <div class='container'>
              <H1>Personal Information</H1>
              <div class="alert alert-warning" role="alert">
              <p class='mb-0'>Edit your basic personal info to improve recommendations. This information is private and won't show up in your public profile.</p>
              </div>
                <div class='row'>
                    <div class='col-12 col-md-6 mt-4'>
                        <label class='col-sm-4 col-form-label'>Address: 1</label>
                        <input type="text" name="address1" class="form-control" placeholder="Address" aria-label="Address">
                    </div>
                    
                    <div class='col-12 col-md-6 mt-4'>
                        <label class='col-sm-4 col-form-label'>Address: 2</label>
                        <input type="text" name="address2" class="form-control" placeholder="Address" aria-label="Address">
                    </div>
                </div>

                <div class='row'>
                    <div class='col-sm-4 mt-4'>
                        <label for="city" class='col-sm-4 col-form-label'>City</label>
                        <input type="text" name="city" class="form-control" placeholder="City">
                    </div>
                    <div class='col-sm-4 mt-4'>
                      <label for="province" class='col-sm-4 col-form-label'>Province</label>
                      <input type="text" name="province" class="form-control" placeholder="Province">
                    </div>
                    <div class='col-sm-4 mt-4'>
                        <label for="mobile_no" class='col-sm-4 col-form-label'>Mobile No</label>
                        <input type="text" name="mobile_no" class="form-control" placeholder="09xxxxxxxxx">
                    </div>

                    <div class='col-12 col-md-4 mt-4'>
                        <label class='mb-2'>Gender</label>
                        <select class="form-select " aria-label=".form-select-sm example">
                            <option selected>Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                </div>

                <div class='row'>
                    <div class='col-12 col-md-6 mt-2'>
                        <div class='row'>
                            <label class='mt-4 mb-2'>Home:</label>
                            <div class="col-12 col-lg-3 ms-3 form-check ">
                                <input class="form-check-input" type="radio" name="flexRadioDefault1" id="flexRadioDefault11">
                                <label class="form-check-label" for="flexRadioDefault11">
                                &nbsp;House
                                </label>
                            </div>
                            
                            <div class="col-12 col-lg-3 ms-3 form-check ">
                                <input class="form-check-input" type="radio" name="flexRadioDefault1" id="flexRadioDefault111">
                                <label class="form-check-label" for="flexRadioDefault111">
                                &nbsp;Condo
                                </label>
                            </div>
            
                            <div class="col-12 col-lg-3 ms-3 form-check ">
                                <input class="form-check-input" type="radio" name="flexRadioDefault1" id="flexRadioDefault111">
                                <label class="form-check-label" for="flexRadioDefault111">
                                &nbsp;Apartment
                                </label>
                            </div>
                        </div>
                    </div>
            
                    <div class='col-12 col-md-6 mt-2 d-flex justify-content-center align-items-center'>
                        <div class='row justfiy-content-center'>
                            <label class='mt-4 mb-2'>Are pets allowed in your home ?</label>
                            <div class="col-3 form-check d-flex justify-content-center ms-3 ">
                                <input class="form-check-input" name="yes" type="checkbox" id="gridCheck">
                                <label class="form-check-label" for="gridCheck">
                                    &nbsp; Yes
                                </label>
                            </div>
                            <div class="col-3 form-check d-flex justify-content-center ms-3 ">
                                <input class="form-check-input" name="no" type="checkbox" id="gridCheck">
                                <label class="form-check-label" for="gridCheck">
                                    &nbsp; No
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class='row mt-3'>
                    <div class='col-12 col-lg-6'>
                        <div class='row justfiy-content-center'>
                            <label class='mt-2 mb-2'>Type:</label>
                            <div class="col-12 col-lg-3 form-check ms-3 ">
                                <input class="form-check-input" type="radio" name="flexRadioDefault2" id="flexRadioDefault111">
                                <label class="form-check-label" for="flexRadioDefault11">
                                &nbsp;Own
                                </label>
                            </div>
                            
                            <div class="col-12 col-lg-3 form-check ms-3 ">
                                <input class="form-check-input" type="radio" name="flexRadioDefault2" id="flexRadioDefault1112">
                                <label class="form-check-label" for="flexRadioDefault111">
                                &nbsp;Rented
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class='col-12 col-lg-6'>
                        <label class='mt-2'>Source of Funds</label>
                        <select class="form-select " aria-label=".form-select-sm example">
                            <option selected>Select Option</option>
                            <option value="Male">Employment</option>
                            <option value="Male">Business</option>
                            <option value="Male">Freelance</option>
                            <option value="Male">Family Income</option>
                            <option value="Male">Others</option>
                        </select>
                    </div>
                </div>

            </div>
        </div>

          {{-- DogHistory --}}
        <div class="tab-pane fade" id="doghistory" role="tabpanel" aria-labelledby="v-pills-doghistory-tab" tabindex="0">
            <div class='container'>
                <H1 class='mb-3'>Dog History</H1>   
                <div class="alert alert-warning" role="alert">
                    <p class='mb-0'>Note : Answer the following question below:</p>
                </div>

                <div class='row'>
                    {{-- Question number 1 --}}
                    <div class='col-12 col-md-6'>
                        <label class=''>Do you currently have pets ? </label>
                    </div>
                        
                    <div class="col-12 col-md-2 form-check d-flex justify-content-center ">
                        <input class="form-check-input" type="radio" name="flexRadioDefault1" id="flexRadioDefault111">
                        <label class="form-check-label" for="flexRadioDefault11">
                        &nbsp;Yes
                        </label>
                    </div>
                        
                    <div class="col-12 col-md-2 form-check d-flex justify-content-center ">
                        <input class="form-check-input" type="radio" name="flexRadioDefault1" id="flexRadioDefault1112">
                        <label class="form-check-label" for="flexRadioDefault111">
                        &nbsp;No
                        </label>
                    </div>
                </div>

                <br>

                <div class='row'>
                    <div class="col-12 col-md-6 form-check justify-content-center">
                        <label class="">If yes, how many dogs? </label>
                        <input class="form-control form-control-sm" type="text" style="height:40px; width:50px;">
                    </div>

                    <div class="col-12 col-md-6 form-check justify-content-center ">
                        <label class="">If yes, how many Cats?</label>
                        <input class="form-control form-control-sm text-center" type="text" style="height:40px; width:50px;">
                    </div>
                </div>

                <br><br>

                <div class='row'>
                    {{-- Question number 2 --}}
                    <div class='col-12 col-md-6'>
                        <label class=''>Does any member of your household have any known allergies to animals ? </label>
                    </div>
                        
                    <div class="col-12 col-md-2 form-check d-flex justify-content-center ">
                        <input class="form-check-input" type="radio" name="flexRadioDefault1" id="flexRadioDefault111">
                        <label class="form-check-label" for="flexRadioDefault11">
                        &nbsp;Yes
                        </label>
                    </div>
                        
                    <div class="col-12 col-md-2 form-check d-flex justify-content-center ">
                        <input class="form-check-input" type="radio" name="flexRadioDefault1" id="flexRadioDefault1112">
                        <label class="form-check-label" for="flexRadioDefault111">
                        &nbsp;No
                        </label>
                    </div>
                
                </div>

                <br><br>

                <div class='row'>
                    {{-- Question number 3 --}}
                    <div class='col-12 col-md-6'>
                        <label class=''>If you have  pets, have they all been vaccinated ? </label>
                    </div>
                        
                    <div class="col-12 col-md-2 form-check d-flex justify-content-center ">
                        <input class="form-check-input" type="radio" name="flexRadioDefault1" id="flexRadioDefault111">
                        <label class="form-check-label" for="flexRadioDefault11">
                        &nbsp;Yes
                        </label>
                    </div>
                        
                    <div class="col-12 col-md-2 form-check d-flex justify-content-center ">
                        <input class="form-check-input" type="radio" name="flexRadioDefault1" id="flexRadioDefault1112">
                        <label class="form-check-label" for="flexRadioDefault111">
                        &nbsp;No
                        </label>
                    </div>
                
                </div>

                <br><br>

                <div class='row'>
                    {{-- Question number 4 --}}
                    <div class='col-12 col-md-6'>
                        <label class=''>If you have pets, are they all spayed/neutered ? </label>
                    </div>
                        
                    <div class="col-12 col-md-2 form-check d-flex justify-content-center ">
                        <input class="form-check-input" type="radio" name="flexRadioDefault1" id="flexRadioDefault111">
                        <label class="form-check-label" for="flexRadioDefault11">
                        &nbsp;Yes
                        </label>
                    </div>
                        
                    <div class="col-12 col-md-2 form-check d-flex justify-content-center ">
                        <input class="form-check-input" type="radio" name="flexRadioDefault1" id="flexRadioDefault1112">
                        <label class="form-check-label" for="flexRadioDefault111">
                        &nbsp;No
                        </label>
                    </div>
                
                </div>

                <br><br>

                <div class='row'>
                    {{-- Question number 5 --}}
                    <div class='col-12 col-md-6'>
                        <label class=''>Have you ever had a pet euthanized ? </label>
                    </div>
                        
                    <div class="col-12 col-md-2 form-check d-flex justify-content-center ">
                        <input class="form-check-input" type="radio" name="flexRadioDefault1" id="flexRadioDefault111">
                        <label class="form-check-label" for="flexRadioDefault11">
                        &nbsp;Yes
                        </label>
                    </div>
                        
                    <div class="col-12 col-md-2 form-check d-flex justify-content-center ">
                        <input class="form-check-input" type="radio" name="flexRadioDefault1" id="flexRadioDefault1112">
                        <label class="form-check-label" for="flexRadioDefault111">
                        &nbsp;No
                        </label>
                    </div>
                
                </div>

                <br><br>

                <div class='row'>
                    {{-- Question number 6 --}}
                    <div class='col-12 col-md-6'>
                        <label class=''>Have you ever lost pet? </label>
                    </div>
                        
                    <div class="col-12 col-md-2 form-check d-flex justify-content-center ">
                        <input class="form-check-input" type="radio" name="flexRadioDefault1" id="flexRadioDefault111">
                        <label class="form-check-label" for="flexRadioDefault11">
                        &nbsp;Yes
                        </label>
                    </div>
                        
                    <div class="col-12 col-md-2 form-check d-flex justify-content-center ">
                        <input class="form-check-input" type="radio" name="flexRadioDefault1" id="flexRadioDefault1112">
                        <label class="form-check-label" for="flexRadioDefault111">
                        &nbsp;No
                        </label>
                    </div>
                
                </div>

                <br><br>

                <div class='row'>
                    {{-- Question number 7 --}}
                    <div class='col-12 col-md-6'>
                        <label class=''>Who will have primary responsibility of the dog's care? </label>
                    </div>
                        
                    <div class='col-12 col-md-4 mt-1'>
                        <select class="form-select " aria-label=".form-select-sm example">
                            <option selected>Choose..</option>
                            <option value="myself">Myself</option>
                            <option value="myspouse/partner">My spouse/partner</option>
                            <option value="family">Family member</option>
                            <option value="househelp">Househelp</option>
                            <option value="others">Others</option>
                            
                        </select>
                    </div>
                        
                
                </div>

                <br><br>

                <div class='row'>
                    {{-- Question number 8 --}}
                    <div class='col-12 col-md-6 text-sm-center'>
                        <label class=''>Who will have financial responsibility of the dog? </label>
                    </div>
                        
                    <div class='col-12 col-md-4 mt-1'>
                        <select class="form-select " aria-label=".form-select-sm example">
                            <option selected>Choose..</option>
                            <option value="myself">Myself</option>
                            <option value="myspouse/partner">My spouse/partner</option>
                            <option value="family">Family member</option>
                            <option value="househelp">Househelp</option>
                            <option value="others">Others</option>

                        </select>
                    </div>
                        
                
                </div>

                <br><br>

                <div class='row'>
                    {{-- Question number 9 --}}
                    <div class='col-12 col-md-6'>
                        <label class=''>Will your dog be alone at home? </label>
                    </div>
                        
                    <div class="col-12 col-md-2 form-check d-flex justify-content-center ">
                        <input class="form-check-input" type="radio" name="flexRadioDefault1" id="flexRadioDefault111">
                        <label class="form-check-label" for="flexRadioDefault11">
                        &nbsp;Yes
                        </label>
                    </div>
                        
                    <div class="col-12 col-md-2 form-check d-flex justify-content-center ">
                        <input class="form-check-input" type="radio" name="flexRadioDefault1" id="flexRadioDefault1112">
                        <label class="form-check-label" for="flexRadioDefault111">
                        &nbsp;No
                        </label>
                    </div>
                
                </div>

                <br><br>

                <div class='row'>
                    <div class="col-12 col-md-6 form-check justify-content-center">
                        <label class="">If yes, for how long? </label>
                        <input class="form-control form-control-sm text-center" type="number" style="height:40px; width:50px;">
                    </div>

                </div>
                    <br><br>
                    <div class='text-center'>
                        <input type="submit" name="submit" class="submit-btn" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




@endsection
