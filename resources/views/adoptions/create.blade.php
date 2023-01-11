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
</style>

<hr style="margin:0px 0px 5px 0px;padding:0px 0px 0px 0px;border-color:#ececec">

<div class="container-fluid d-flex justify-content-center" style="padding-left: 5%; padding-right: 5%; padding-top:0px;margin-bottom:30px">
    <div class="row" style="width:100%;margin-top:5px;margin-bottom:20px">
        <a class="btn btn-outline-primary2" href="{{ url()->previous() }}" type="button" style="vertical-align: bottom;text-align: left;padding-left:10px;width:180px;margin-bottom:20px">
        <i class="fa fa-arrow-left" aria-hidden="true" style="font-size:medium;padding-right:10px;padding-top:4px"></i>Back to Dog Profile</a>

        <div class="row" >          
            <h3 class="" style="font-family: Poppins; color:#413F42">Finalize Adoption</h3><br>
        </div>
        <form action="{{ route('adoptions.store') }}" method="POST" enctype="multipart/form-data">
            {!! csrf_field() !!}     
            
        <div class="row" style="width:90%;display:block;margin:auto" > 
            <div class="col-md-5">
                <div class="row mt-3 mb-3" style="width:100%;margin:20px 20px">
                    <div class="border" style="border-radius:15px;margin-right:0px;padding:20px 20px">
                    <div class="card" style="flex-direction:row; height:150px; align-items:center">
                        <img src="{{asset('image/'.$dogs->pic)}}" class="card-img-top" alt="picture" style="width:150px">
                        <div class="card-body" style="padding-left:40px">
                            <h5 class="card-title fw-bold" style="font-style:italic; font-family: Quicksand; color:#;">{{$dogs->name}}</h5>
                            <h6 class="card-subtitle mb-2" style="font-family: Poppins;">{{($dogs->gender=="1-Male")? "Male" : "Female" }}, {{$dogs->age_yr}}y and {{$dogs->age_month}}m</h6>
                            <h6 class="card-subtitle mb-2 text-muted" style="font-family: Lato; font-weight:10px">{{$dogs->breed1_name}} , {{$dogs->breed2_name}}</h6>
                        </div>
                    </div>
                    </div> 
                </div>
                <div class="row mt-3 mb-3" style="width:100%;margin:20px 20px">
                    <div class="border" style="border-radius:15px;margin-right:0px;padding:20px 20px">
                    <div class="card" style="flex-direction:row; height:150px;  align-items:center">
                        <img src="{{asset('image/'.$applications->profile_pic)}}" alt="profilepic" class="card-img-top" style="width:150px; display:block;border-radius:50%;margin:auto"/>
                        <div class="card-body" style="padding-left:40px">
                            <h5 class="card-title fw-bold" style="font-style:italic; font-family: Quicksand; color:#;">{{$applications->username}}</h5>
                            <h6 class="card-subtitle mb-2" style="font-family: Poppins;">{{$applications->firstname}}{{' '.$applications->lastname}}</h6>
                            <h6 class="card-subtitle mb-2 text-muted" style="font-family: Lato; font-weight:10px">{{$applications->city}} , {{$applications->province}}</h6>
                        </div>
                    </div> 
                    </div>
                </div>
            </div>

            <div class="col-md-7" style="padding:0px; margin:0px">
                <div class="form-group mb-2">
                    <div class="image-upload-wrap justify-content-center" style="height:400px;width:400px">
                        <input class="file-upload-input" type='file' onchange = "readURL(this);" accept="image/*" id="turnoverpic" name="turnoverpic" required/>
                        <div class="drag-text" style="padding-top:30%">
                            <i class="fa-solid fa-photo-film" style="font-size:50px;color:#5082B7;"></i><br><br><h6>Drag and drop a file <br>or click to browse</h5>
                        </div>
                    </div>
                    <div class="file-upload-content">
                        <img class="file-upload-none" id="imgdisplay" src="#" alt="your image" />
                        <div class="container justify-content-center">
                            <div class="image-title-wrap justify-content-center">
                            </div>
                            <button id="rembutton" type="button" onclick="removeUpload()" class="remove-btn" style="text-align:center;width:250px">Remove selected image</button>
                            <div class="row justify-content-center" >
                                <input type="submit" name="submit" class="btn adopt_btn" value="Submit">
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