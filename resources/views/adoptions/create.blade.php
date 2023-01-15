@extends ('components.navbar')
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
    /* max-height: 400px; */
    max-width: 380px;
    margin: 0px;
    text-align: center;
    display:block;
    margin: auto;
    border: 4px #5082B7 !important ;
    }
.remove-image {
    height: 40px;
    width: 120px;
    border-radius: 12px;
    background-color: #799FC8 ;
    border-color:#5082B7 !important ;
    color:#F9F9F9;
    text-decoration: none;
    font-family: 'Lato', sans-serif;
    margin:5px;
    vertical-align: middle;
    align-self: center;
    }
.remove-btn,
.file-upload-none,
.hidden{
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

<hr style="margin:0px 0px 5px 0px;padding:0px 0px 0px 0px;border-color:#ececec">

<div class="container-fluid d-flex justify-content-center" style="padding-left: 5%; padding-right: 5%; padding-top:0px;margin-bottom:30px">
    <div class="row" style="width:100%;margin-top:5px;margin-bottom:20px">
        <a class="btn btn-outline-primary2" href="{{ url()->previous() }}" type="button" style="vertical-align: bottom;text-align: left;padding-left:10px;width:180px;margin-bottom:20px">
        <i class="fa fa-arrow-left" aria-hidden="true" style="font-size:medium;padding-right:10px;padding-top:4px"></i>Back to Dog Profile</a>
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

        <form action="{{ route('adoptions.store') }}" method="POST" enctype="multipart/form-data">
            {!! csrf_field() !!}                 

        <div class="row">          
            <h3 style="font-family: Poppins; color:#413F42">Finalize Adoption
                <input type="submit" id="submit" name="submit" class="btn adopt_btn hidden" value="Save">
            </h3>
        </div>

        <div class="row mt-4" >
            <div class="col col-md-4" style="padding:0px; margin:0px">
                <div class="form-group mb-2">
                    <div class="image-upload-wrap justify-content-center" style="height:400px;width:400px">
                        <input class="file-upload-input" type='file' onchange = "readURL(this);" accept="image/*" id="turnover_pic" name="turnover_pic" required/>
                        <div class="drag-text" style="padding-top:30%">
                            <i class="fa-solid fa-photo-film" style="font-size:50px;color:#5082B7;"></i><br><br><h6>Drag and drop a file <br>or click to browse</h5>
                        </div>
                    </div>
                    <div class="file-upload-content">
                        <img class="file-upload-none" id="imgdisplay" src="#" alt="your image" />
                        <div class="row" style="text-align:center;padding:5px 40px">
                            <button id="rembutton" type="button" onclick="removeUpload()" class="remove-btn" style="align-items:center">Replace image</button>
                            <div class="image-title-wrap justify-content-center" style="width:100px"></div>
                            </div>
                        <div class="row justify-content-center" >
                        </div>
                    </div>
                </div>
            </div>
            <div class="col col-md-8">
            <div class="row">
                <div class="col col-md-6 col-sm-12" style="padding: 0px 30px" >
                <div class="row" >
                    <div class="border" style="border-radius:15px;margin-right:0px;padding:20px 30px 0px 30px">
                        <div style="text-align:center;margin-bottom:20px"><h6>DOG REHOMED</h5></div>
                        <div class="card" style="flex-direction:row; height:auto; align-items:center;margin: 0px 20px">
                        <img src="{{asset('Image/'.$dogs->pic)}}" class="card-img-top" alt="picture" style="width:120px">
                        <div class="card-body" style="padding-left:20px">
                            <h5 class="card-title fw-bold" style="font-style:italic; font-family: Quicksand; color:#;">{{$dogs->name}}</h5>
                            <h6 class="card-subtitle mb-2" style="font-family: Poppins;">{{($dogs->gender=="1-Male")? "Male" : "Female" }}, {{$dogs->age_yr}}y and {{$dogs->age_month}}m</h6>
                            <h6 class="card-subtitle mb-2 text-muted" style="font-family: Lato; font-weight:10px">{{$dogs->breed1_name}} , {{$dogs->breed2_name}}</h6>
                        </div>
                    </div>
                    <input type="hidden" name="dogid" value="{{$applications->dog_id}}"/>
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
                          <td>{{$dogs->size}}</td>
                        </tr>
                        <tr>
                          <th>Color</th>
                          <td>{{$dogs->color}}</td>
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
                    </table>
                    </div> 
                </div>
                </div>

                <div class="col col-md-6 col-sm-12" style="padding: 0px 30px">
                <div class="row">
                    <div class="border" style="border-radius:15px;margin-right:0px;padding:20px 30px 0px 30px">
                        <div style="text-align:center;margin-bottom:20px"><h6>ADOPTER</h5></div>
                        <div class="card" style="flex-direction:row; height:auto; align-items:center;margin: 0px 20px">
                        <img src="{{asset('Image/'.$applications->profile_pic)}}" alt="profilepic" class="profilepic3" style="width:120px; height:120px; display:block; object-fit: cover; border-radius:50%;margin:auto"/>
                        <div class="card-body" style="padding-left:40px">
                            <h5 class="card-title fw-bold" style="font-style:italic; font-family: Quicksand; color:#;">{{$applications->username}}</h5>
                            <h6 class="card-subtitle mb-2" style="font-family: Poppins;">{{$applications->firstname}}{{' '.$applications->lastname}}</h6>
                            <h6 class="card-subtitle mb-2 text-muted" style="font-family: Lato; font-weight:10px">{{$applications->city}} , {{$applications->province}}</h6>
                        </div>
                    </div>
                    <input type="hidden" name="userid" value="{{$applications->user_id}}"/>
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
                            <td>{{$applications->username}}</td>
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
                            <td>{{$applications->address1}}, {{$applications->address2}}</td>
                        </tr>
                        <tr>
                            <th>City</th>
                            <td>{{$applications->city}}</td>
                        </tr>
                        <tr>
                            <th>Province/Region</th>
                            <td>{{$applications->province}}</td>
                        </tr>                            
                    </table>
                    </div>
                </div>
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
            document.getElementById("submit").className = "btn adopt_btn float-end"
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