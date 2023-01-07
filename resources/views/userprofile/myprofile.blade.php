@extends('components.profiletabs')

@section('myprofile')
{{-- <div class='container'>
    <H1>Public Profile</H1>
    <p>People visiting your profile will see the following info:</p>

      <div class='row'>
        <div class="col-md-6 col-sm-12">
          <div class="form-floating mb-3">
              <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
              <label class="text-muted" for="floatingInput">First Name</label>
          </div>
        </div>

        <div class="col-md-6 col-sm-12">
          <div class="form-floating  mb-3">
              <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
              <label class="text-muted" for="floatingPassword">Last Name</label>
          </div>
        </div>

        <div>
          <div class="form-floating my-2">
            <textarea id="mess" class="form-control" placeholder="Leave a comment here" style="height: 100px"></textarea>
            <label class="text-muted" for="floatingTextarea2">About</label>
          </div>
        </div>
        <div class='mt-5 d-flex justify-content-end'>
          <a class='btn btn-primary' href="">Save Changes</a>
        </div>
      </div>
  
</div> 
@endsection --}}
{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/b63f0cdae2.js" crossorigin="anonymous"></script> --}}
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
<div class="container-fluid d-flex justify-content-center" style="padding-left: 5%; padding-right: 5%; padding-top:0px;margin-bottom: 20px">
    <div class="row" style="width:100%;margin-top:20px">
      <H1>Public Profile</H1><br>
      <p>People visiting your profile will see the following info:</p>
      <form action="{{ route('userprofile.store') }}" method="POST" enctype="multipart/form-data">
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

