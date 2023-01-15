@extends('components.navbar')
@section('content')

<style>
    label{
        font-weight: bold; 
        }
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

<div class='container p-4'>
    
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
    
    <div class="nav" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <a class="nav-link tab1 active" id="v-pills-myprofile-tab" data-bs-toggle="pill" data-bs-target="#myProfile" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true"><i class="bi bi-people-fill"></i>&nbsp; User Profile</a>
        <a class="nav-link tab2" id="v-pills-personalinfo-tab" data-bs-toggle="pill" data-bs-target="#personalinfo" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false"><i class="bi bi-file-earmark-person-fill"></i>&nbsp;Personal Info</a>
        <a class="nav-link tab3" id="v-pills-doghistory-tab" data-bs-toggle="pill" data-bs-target="#doghistory" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false"><i class="bi bi-hourglass-bottom"></i>&nbsp; Dog History</a>

        <form action="{{ route('userprofile.store') }}" method="POST" enctype="multipart/form-data">
            {!! csrf_field() !!}

        <div class="tab-content mt-4 p-3" id="v-pills-tabContent">
            {{-- My Profile --}}
            <div class="tab-pane fade show active " id="myProfile" role="tabpanel" aria-labelledby="v-pills-myprofile-tab" tabindex="0">    
                <div class="container row">
                    <h3 class="" style="font-family: Poppins; color:#413F42">Profile Information</h3><br>
                    <div class="alert alert-warning" role="alert">
                        <p class='mt-0 mb-0'>Note : This is your public profile.  People visiting your profile will see the following info.</p>
                    </div>
                    
                    <div class="row mt-2" style="width:100%">
                        <div class="col-lg-4 col-sm-12" style="margin-bottom:10px">
                            <!--Dog profile pic -->  
                            <div class="form-group mb-2" style="padding-top:30px;padding-bottom:3px">
                                <div class="image-upload-wrap justify-content-center" style="height:200px;width:200px">
                                    <input class="file-upload-input" type='file' onchange = "readURL(this);" accept="image/*" id="profile_pic" name="profile_pic" required>
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
                        <!--User profile information -->
                        <div class="col-lg-8 col-sm-12" style="padding-left:20px;padding-top:15px;margin-bottom: 20px;">
                            <div class="container">
                                {{-- FIRSTNAME --}}
                                <div class="mb-2 row">
                                <label for="firstname" class="col-lg-2 col-form-label fw-bold" style="font-family: 'Lato', sans-serif;">First Name :</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="firstname" class="form-control form-control-sm" required>
                                    </div>
                                </div>
                                {{-- LASTNAME --}}
                                <div class="mb-2 row">
                                    <label for="lastname" class="col-lg-2 col-form-label fw-bold" style="font-family: 'Lato', sans-serif;">Last Name :</label>
                                    <div class="col-lg-10">
                                        <input required type="text" name="lastname" class="form-control form-control-sm">
                                    </div>
                                </div>
                                {{-- ABOUT --}}
                                <div class="mb-2 row">
                                    <label for="about" class="col-lg-2  col-form-label fw-bold" style="font-family: 'Lato', sans-serif;">About :
                                        <span id="lochelp" class="text-muted" style="font-size:.8rem; font-style:italic"></span>
                                    </label>                                
                                    <div class="col-sm-10">
                                        <textarea name='about' class="form-control" style="resize:none;" id="exampleFormControlTextarea1" rows="6"></textarea>
                                    </div>
                                </div> 
                            </div>
                        </div>                
                        <div class='d-flex justify-content-end'>
                            <a class="nav-link edit_btn"  id="v-pills-personalinfo-tab" data-bs-toggle="pill" data-bs-target="#personalinfo" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false" style="text-align:center">Next page</a>
                        </div>
                    </div>  
                </div>
            </div>
            
            {{-- Personal Info --}}
            <div class="tab-pane fade" id="personalinfo" role="tabpanel" aria-labelledby="v-pills-personalinfo-tab" tabindex="0" style="width:100%">
                <div class='container row'>
                    <h3 style="font-family: Poppins; color:#413F42">Personal Information</h3>
                    <div class="alert alert-warning" role="alert">
                        <p class='mt-0 mb-0'> When you submit an application to adopt, this information will be accessible to rescuers and fosters who posted the dog you are applying for to adopt.</p>
                    </div>
                    
                    <div class='row mt-0'>
                        <div class='col-12 col-md-6 mt-3'>
                            <label  for='address1' class='col-sm-4 col-form-label'>Address: 1</label>
                            <input required type="text" name="address1" class="form-control" placeholder="Address" aria-label="Address">
                        </div>
                        <div class='col-12 col-md-6 mt-3'>
                            <label for='address2' class='col-sm-4 col-form-label'>Address: 2</label>
                            <input required type="text" name="address2" class="form-control" placeholder="Address" aria-label="Address">
                        </div>
                    </div>

                    <div class='row'>
                        <div class='col-sm-3 mt-3'>
                            <label for="city" class='col-sm-4 col-form-label'>City</label>
                            <input required type="text" name="city" class="form-control" placeholder="City">
                        </div>
                        <div class='col-sm-3 mt-3'>
                            <label for="province" class='col-sm-4 col-form-label'>Province</label>
                            <input type="text" name="province" class="form-control" placeholder="Province">
                        </div>
                        <div class='col-sm-3 mt-3'>
                            <label for="hometype" class='col-sm-6 col-form-label'>Type of Home</label>
                            <select required name="hometype" class="form-select " aria-label=".form-select-sm example">
                                <option selected>Select Option</option>
                                <option value="House">House</option>
                                <option value="Condo">Condo</option>
                                <option value="Apartment">Apartment</option>
                            </select>
                        </div>
                        <div class='col-sm-3 mt-3'>
                            <div class='row justfiy-content-center'>
                                <label for="allowed" class='col-form-label mb-2'>Are pets allowed in your home ?</label>
                                <div class="col-3 form-check d-flex justify-content-center ms-3">
                                    <input required value='1' name='allowed' class="form-check-input" type="radio">
                                    <label class="form-check-label" for="gridCheck" style="font-weight:400">
                                        &nbsp; Yes
                                    </label>
                                </div>
                                <div class="col-3 form-check d-flex justify-content-center ms-3 ">
                                    <input required value='0' name='allowed' class="form-check-input custom-control" type="radio">
                                    <label class="form-check-label" for="gridCheck" style="font-weight:400">
                                        &nbsp; No
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class='row mb-3'>
                        <div class='col-sm-4 mt-3'>
                            <label for="mobile_no" class='col-sm-4 col-form-label'>Mobile No</label>
                            <input type="text" name="mobile_no" class="form-control" placeholder="09xxxxxxxxx">
                        </div>
                        <div class='col-sm-4 mt-3'>                     
                            <label for='gender' class='col-sm-4 col-form-label''>Gender</label>
                            <select required name='gender' class="form-select " aria-label=".form-select-sm example">
                                <option selected>Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class='col-sm-4 mt-3'>   
                            <label for="funds" class='col-sm-6 col-form-label'>Source of Funds</label>
                            <select required name="funds" class="form-select " aria-label=".form-select-sm example">
                                <option selected>Select Option</option>
                                <option value="Employment">Employment</option>
                                <option value="Business">Business</option>
                                <option value="Freelance">Freelance</option>
                                <option value="Family Income">Family Income</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>
                    </div>
                    <div class='d-flex justify-content-end'>
                        {{-- <a class="nav-link edit_btn"  id="v-pills-personalinfo-tab" data-bs-toggle="pill" data-bs-target="#personalinfo" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false" style="text-align:center;margin-right:20px">Back</a> --}}
                        <a class="nav-link edit_btn"  id="v-pills-personalinfo-tab" data-bs-toggle="pill" data-bs-target="#doghistory" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false" style="text-align:center">Next Page</a>
                    </div>
                </div>
            </div>
        
            {{-- DogHistory --}}
            <div class="tab-pane fade" id="doghistory" role="tabpanel" aria-labelledby="v-pills-doghistory-tab" tabindex="0">
                <div class='container row'>
                    <h3 style="font-family: Poppins; color:#413F42">Dog History</h3>
                    <div class="alert alert-warning" role="alert">
                        <p class='mt-0 mb-0'>Kindly provide information about your current situation and experience with pets. This information will help faciliate the screening process of rescuers and fosters.</p>
                    </div>
                    
                    <div class="row">
                        <div class='col-sm-4 mt-3'>
                            <div class='row justfiy-content-center'>
                                <label for="withpets" class='col-form-label mb-2'>Do you currently have pets ?</label>
                                <div class="col-sm-3 form-check d-flex justify-content-center ms-3">
                                    <input required value='1' name='withpets' class="form-check-input" type="radio">
                                    <label class="form-check-label" for="gridCheck" style="font-weight:400">
                                        &nbsp; Yes
                                    </label>
                                </div>
                                <div class="col-sm-3 form-check d-flex justify-content-center ms-3 ">
                                    <input required value='0' name='withpets' class="form-check-input custom-control" type="radio">
                                    <label class="form-check-label" for="gridCheck" style="font-weight:400">
                                        &nbsp; No
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class='col-sm-2'>
                        </div>
                        <div class="col-md-3 mt-3 form-check justify-content-start">
                            <label for="dogs" class="col-form-label">If yes, how many dogs? </label>
                            <input name="dogs" class="form-control form-control-sm" type="number" min="0" max="50" style='width:60px' >
                        </div>
                        <div class='col-sm-1'>
                        </div>
                        <div class="col-12 col-md-2 mt-3 form-check justify-content-start ">
                            <label for="cats" class="col-form-label">How many cats?</label>
                            <input name="cats" class="form-control form-control-sm text-center" type="number" min="0" max="50" style='width:60px'>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-sm-6">
                            <label for="allergy" class="col-form-label">Do you have a member in your household who is allergic to animals?</label>
                            <div class="row">
                                <div class="col-sm-2 form-check d-flex justify-content-center ms-3">
                                    <input required value='1' name='allergy' class="form-check-input" type="radio">
                                    <label class="form-check-label" for="gridCheck" style="font-weight:400">
                                        &nbsp; Yes
                                    </label>
                                </div>
                                <div class="col-sm-2 form-check d-flex justify-content-center ms-3 ">
                                    <input required value='0' name='allergy' class="form-check-input custom-control" type="radio">
                                    <label class="form-check-label" for="gridCheck" style="font-weight:400">
                                        &nbsp; No
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label for="lefthome" class='col-form-label'>Will your dog be alone at home?</label>
                            <div class="row">
                                <div class="col-sm-5 form-check d-flex justify-content-center">
                                    <input required value='1' name='lefthome' class="form-check-input" type="radio">
                                    <label class="form-check-label" for="gridCheck" style="font-weight:400">
                                        &nbsp; Yes
                                    </label>
                                </div>
                                <div class="col-sm-5 form-check d-flex justify-content-center">
                                    <input required value='0' name='lefthome' class="form-check-input custom-control" type="radio">
                                    <label class="form-check-label" for="gridCheck" style="font-weight:400">
                                        &nbsp; No
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class='col-sm-1'>
                        </div>
                        <div class="col-12 col-sm-2 form-check justify-content-center">
                            <label for="hours" class="col-form-label">If yes, for how long? </label>
                           <input name="hours" class="form-control form-control-sm" type="number" min="0" max="24" style='width:60px' >
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class='col-sm-4 mt-3'>
                            <div class='row justfiy-content-center'>
                            <label for="allvaxed" class=' mb-2'>If you have pets, have they all been vaccinated?</label>
                                <div class="col-sm-3 form-check d-flex justify-content-center ms-3">
                                    <input required value='1' name='allvaxed' class="form-check-input" type="radio">
                                    <label class="form-check-label" for="gridCheck" style="font-weight:400">
                                        &nbsp; Yes
                                    </label>
                                </div>
                                <div class="col-sm-3 form-check d-flex justify-content-center ms-3 ">
                                    <input required value='0' name='allvaxed' class="form-check-input custom-control" type="radio">
                                    <label class="form-check-label" for="gridCheck" style="font-weight:400">
                                        &nbsp; No
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class='col-sm-2'>
                        </div>
                        <div class='col-sm-4 mt-3'>
                            <div class='row justfiy-content-center'>
                            <label for="allneut" class=' mb-2'>If you have pets, are they all spayed/neutered?</label>
                                <div class="col-sm-3 form-check d-flex justify-content-center ms-3">
                                    <input required value='1' name='allneut' class="form-check-input" type="radio">
                                    <label class="form-check-label" for="gridCheck" style="font-weight:400">
                                        &nbsp; Yes
                                    </label>
                                </div>
                                <div class="col-sm-3 form-check d-flex justify-content-center ms-3 ">
                                    <input required value='0' name='allneut' class="form-check-input custom-control" type="radio">
                                    <label class="form-check-label" for="gridCheck" style="font-weight:400">
                                        &nbsp; No
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class='col-sm-4'>
                            <div class='row justfiy-content-center'>
                                <label for="euthanized" class=' mb-2'>Have you ever had a pet euthanized ?</label>
                                <div class="col-sm-3 form-check d-flex justify-content-center ms-3">
                                    <input required value='1' name='euthanized' class="form-check-input custom-control" type="radio">
                                    <label class="form-check-label" for="gridCheck" style="font-weight:400">
                                        &nbsp; Yes
                                    </label>
                                </div>
                                <div class="col-sm-3 form-check d-flex justify-content-center ms-3">
                                    <input required value='0' name='euthanized' class="form-check-input custom-control" type="radio">
                                    <label class="form-check-label" for="gridCheck" style="font-weight:400">
                                        &nbsp; No
                                    </label>
                                </div> 
                            </div>
                        </div>
                        
                        <div class='col-sm-2'>
                        </div>
                        
                        <div class='col-sm-4'>
                            <div class='row justfiy-content-center'>
                                <label for="lostpet" class=' mb-2'>Have you ever lost pet?</label>
                                <div class="col-sm-3 form-check d-flex justify-content-center ms-3">
                                    <input required value='1' name='lostpet' class="form-check-input custom-control" type="radio">
                                    <label class="form-check-label" for="gridCheck" style="font-weight:400">
                                        &nbsp; Yes
                                    </label>
                                </div>
                                <div class="col-sm-3 form-check d-flex justify-content-center ms-3">
                                    <input required value='0' name='lostpet' class="form-check-input custom-control" type="radio">
                                    <label class="form-check-label" for="gridCheck" style="font-weight:400">
                                        &nbsp; No
                                    </label>
                                </div> 
                            </div> 
                        </div>
                    </div>
                    
                    <div class="row mt-3">
                        <div class='col-sm-5'>
                            <div class='row justfiy-content-center'>
                                <label for="priresp" class='col-sm-12 col-form-label'>Who will have primary responsibility of the dog's care?</label>
                                <select required name="priresp" class="col-sm-6 form-select" aria-label=".form-select-sm example" style="margin-left:10px; width:250px">
                                    <option selected>Select Option</option>
                                    <option value="Myself">Myself</option>
                                    <option value="My spouse/partner">My spouse/partner</option>
                                    <option value="Another Family member">Another Family member</option>
                                    <option value="Househelp">Househelp</option>
                                    <option value="Others">Others</option>
                                </select>
                            </div>
                        </div>
                        <div class='col-sm-1'>
                        </div>
                        
                        <div class='col-sm-5'>
                            <div class='row justfiy-content-center'>
                                <label for="finresp" class='col-sm-12 col-form-label'>Who will have financial responsibility of the dog?</label>
                                <select required name="finresp" class="form-select " aria-label=".form-select-sm example" style="margin-left:10px; width:250px">
                                    <option selected>Select Option</option>
                                    <option value="Myself">Myself</option>
                                    <option value="My spouse/partner">My spouse/partner</option>
                                    <option value="Another Famil ymember">Another Family member</option>
                                    <option value="Househelp">Househelp</option>
                                    <option value="Others">Others</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class='d-flex justify-content-center justify-content-md-end mt-2'>
                        <input type="submit" name="submit" class="btn edit_btn" value="Save Profile" style="width:150px">                        
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>


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

@endsection
