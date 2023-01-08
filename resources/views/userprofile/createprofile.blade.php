@extends('components.profiletabs')

@section('createprofile')

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


<hr style="margin:0px 0px 5px 0px;padding:0px 0px 0px 0px;border-color:#ececec">

@extends('components.navbar')

@section('content')
<div class='container p-5'>
    <div class="row">
        <div class="col-lg-2">
            <ul class="nav">
                <li class="nav-item my-4">
                  <a class="nav-link active" aria-current="page" href="/home">My Profile</a>
                </li>
                <li class="nav-item my-4">
                  <a class="nav-link" href="/personalinfo">Personal Info</a>
                </li>
                <li class="nav-item my-4">
                  <a class="nav-link" href="/doghistory">Dog History</a>
                </li>
                <li class="nav-item my-4">
                  <a class="nav-link" href="/accountsetting">Account Settings</a>
                </li>
              </ul>
        </div>


        <div class="tab-content justify-content-center" id="personalinfo">
          <div class="tab-pane fade show active" id="dogposted" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                <div class="row" style="width:100%;margin-top:20px">
        <H1>Public Profile</H1><br>
        <p class='mb-0'>People visiting your profile will see the following info:</p>
        <p>Note : Please fill up the form below</p>
        
        <form action="{{ route('createprofile.store') }}" method="POST" enctype="multipart/form-data">
          {!! csrf_field() !!}
      
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
            {{-- PATCH- specific part PUT - whole resource --}}
            
            <div class="mb-2 row">
              <label for="firstname" class="col-sm-4 col-form-label">First Name</label>
              <div class="col-sm-8">
                <input type="text" name="firstname" class="form-control form-control-sm">
              </div>
            </div>

            <div class="mb-2 row">
              <label for="lastname" class="col-sm-4 col-form-label">Last Name</label>
              <div class="col-sm-8">
                <input type="text" name="lastname" class="form-control form-control-sm">
              </div>
            </div>

            <div class="mb-2 row">
              <label for="location" class="col-sm-4 col-form-label">Location
                <span id="lochelp" class="text-muted" style="font-size:.8rem; font-style:italic">
                  (City, Province)
                </span></label>
              <div class="col-sm-8">
                <input type="text" name="location" class="form-control form-control-sm">
              </div>
            </div>

            <div class="mb-2 row">
              <label for="about" class="col-sm-4 col-form-label">About
                <span id="lochelp" class="text-muted" style="font-size:.8rem; font-style:italic">
                  (City, Province)
                </span></label>
              <div class="col-sm-8">
                <input type="text" name="about" class="form-control form-control-sm">
              </div>
            </div>
            
            <input type="submit" name="submit" class="btn btn-primary" value="Submit">
          </form>
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

@endsection

