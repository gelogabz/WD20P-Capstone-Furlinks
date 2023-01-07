@extends ('components.navbar')
@section('content')

{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<hr style="margin:0px 0px 5px 0px;padding:0px 0px 0px 0px;border-color:#ececec">

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
      max-height: 300px;
      max-width: 300px;
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
</style>

<div class="container-fluid d-flex justify-content-center" style="padding-left: 5%; padding-right: 5%; padding-top:0px;margin-bottom: 20px">
  <div class="row" style="width:100%;margin-top:20px">
    <h3>Edit dog details</h3><br>
      <form action="{{ route('dogprofile.update', $dogs->id) }}" method="POST" enctype="multipart/form-data">
        {!! csrf_field() !!}
      @method('PATCH')
      <div class="row" style="width:100%">
        <!--DOG PROFILE PIC -->  
        <div class="col-lg-3 col-sm-6" style="margin-bottom:10px">
          <div class="form-group mb-2" style="padding-top:30px;padding-bottom:3px">
            <div class="image-upload-wrap justify-content-center" style="height:300px;width:300px">
                <input class="file-upload-input" type='file' onchange = "readURL(this);" accept="image/*" id="pic" name="pic" required/>
                <div class="drag-text" style="padding-top:30%">
                <i class="fa-solid fa-photo-film" style="font-size:50px;color:#5082B7;"></i><br><br><h6>Drag and drop a file <br>or click to browse</h5>
                </div>
            </div>

            <div class="file-upload-content">
                <img class="file-upload-image" id="imgdisplay" src="{{asset('image/'.$dogs->pic)}}" alt="your image" />
                <div class="container justify-content-center">
                  <div class="image-title-wrap justify-content-center"></div>
                  <center>
                      <button id="rembutton" type="button" onclick="removeUpload()" class="remove-image" style="text-align:center;width:250px">Remove selected image</button>
                    </div>
            </div>
        </div>
      </div>

      <!--Dog profile information -->
      <div class="col-lg-5 col-sm-6" style="padding-left:20px;padding-top:15px;margin-bottom: 20px;">

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
              <label for="gender" class="col-sm-4 col-form-label">Gender</label>
              <div class="col-sm-8">
                <select class="form-select form-select-sm" name="gender" aria-label=".form-select-sm example" required>
                  <option selected>{{$dogs->gender}}</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
              </div>
            </div>

            <div class="mb-2 row">
              <label for="age" class="col-sm-4 col-form-label">Age</label>
              <div class="col-sm-4">
                <input type="number" name="age_yr" value="{{$dogs->age_yr}}"class="form-control form-control-sm">
                <label for="age_yr" class="col-form-label col-form-label-sm" style="font-size:.8rem; font-style:italic">Year/s</label>
              </div>
              <div class="col-sm-4">
                <input type="number" name="age_month" value="{{$dogs->age_month}}" class="form-control form-control-sm">
                <label for="age_month" class="col-form-label col-form-label-sm" style="font-size:.8rem; font-style:italic">Month/s</label>
              </div>
            </div>

            <?php    
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "furlinks_db";
            ?>
            <div class="mb-2 row">
              <label for="breed_id1" class="col-sm-4 col-form-label">Primary Breed</label>
              <div class="col-sm-8">
                <select class="form-select form-select-sm" name="breed_id1" aria-label=".form-select-sm example" required>
                  <option value="{{$dogs->breed_id1}}"selected>{{$dogs->breed1_name}}</option>
                  <option value="1">Shih-tzu</option>
                  <option value="2">Labrador</option>
                  <option value="3">Chihuahua</option>
                  <option value="4">Dashound</option>
                  <option value="5">German Shepherd</option>
                  <option value="6">Rottweiler</option>
                  <option value="7">Dalmatian</option>
                  <option value="8">Jack Russel Terrier</option>
                  <option value="9">Yorki</option>
                  <option value="10">Corgi</option>
                  <option value="11">Poodle</option>
                  <option value="12">Beagle</option>
                  <option value="13">Japanese Spitz</option>
                  <option value="14">Retriever</option>
                  <option value="15">Boxer</option>
                </select>
              </div>
            </div>

            <div class="mb-2 row">
              <label for="breed_id2" class="col-sm-4 col-form-label">Secondary Breed</label>
              <div class="col-sm-8">
                <select class="form-select form-select-sm" name="breed_id2" aria-label=".form-select-sm example" required>
                  <option value="{{$dogs->breed_id2}}"selected>{{$dogs->breed2_name}}</option>
                  <option value="1">Shih-tzu</option>
                  <option value="2">Labrador</option>
                  <option value="3">Chihuahua</option>
                  <option value="4">Dashound</option>
                  <option value="5">German Shepherd</option>
                  <option value="6">Rottweiler</option>
                  <option value="7">Dalmatian</option>
                  <option value="8">Jack Russel Terrier</option>
                  <option value="9">Yorki</option>
                  <option value="10">Corgi</option>
                  <option value="11">Poodle</option>
                  <option value="12">Beagle</option>
                  <option value="13">Japanese Spitz</option>
                  <option value="14">Retriever</option>
                  <option value="15">Boxer</option>
                </select>
              </div>
            </div>

            <div class="mb-2 row">
              <label for="name" class="col-sm-4 col-form-label">Name
                <span id="nameHelp" class="text-muted" style="font-size:.8rem; font-style:italic">
                  (Optional)
                </span></label>
              <div class="col-sm-8">
                <input type="text" name="name"  value="{{$dogs->name}}"  class="form-control form-control-sm">
              </div>
            </div>

            <div class="mb-2 row">
              <label for="location" class="col-sm-4 col-form-label">Location
                <span id="lochelp" class="text-muted" style="font-size:.8rem; font-style:italic">
                  (City, Province)
                </span></label>
              <div class="col-sm-8">
                <input type="text" name="location"  value="{{$dogs->location}}"  class="form-control form-control-sm">
              </div>
            </div>

            <div class="mb-2 row">
              <label for="rescued" class="col-sm-4 col-form-label">Rescued?</label>
              <div class="col-sm-8">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="rescued" id="inlineRadio1" value="1">
                  <label class="form-check-label" for="inlineRadio1" style="font-size:14px">Yes</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="rescued" id="inlineRadio2" value="0">
                  <label class="form-check-label" for="inlineRadio1" style="font-size:14px">No</label>
                </div>
              </div>
            </div>

            <div class="mb-2 row">
              <label for="rescuedate" class="col-sm-4 col-form-label">Date Rescued</label>
              <div class="col-sm-8">
                <input type="date" name="rescuedate" value="{{$dogs->rescuedate}}" class="form-control form-control-sm">
              </div>
            </div>

            <div class="mb-2 row">
              <label for="birthdate" class="col-sm-4 col-form-label">Birthdate</label>
              <div class="col-sm-8">
                <input type="date" name="birthdate" value="{{$dogs->birthdate}}"class="form-control form-control-sm">
              </div>
            </div>

            <div class="mb-2 row">
              <label for="neutered" class="col-sm-4 col-form-label">Neutered/Spayed?</label>
              <div class="col-sm-8">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="neutered" id="inlineRadio1" value="1">
                  <label class="form-check-label" for="inlineRadio1" style="font-size:14px">Yes</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="neutered" id="inlineRadio2" value="0">
                  <label class="form-check-label" for="inlineRadio1" style="font-size:14px">No</label>
                </div>
              </div>
            </div>

            <div class="mb-2 row">
              <label for="size" class="col-sm-4 col-form-label">Size</label>
              <div class="col-sm-8">
                <select class="form-select form-select-sm" name="size" aria-label=".form-select-sm example" required>
                  <option selected>{{$dogs->size}}</option>
                  <option value="Small">Small (2 to 20 lbs)</option>
                  <option value="Medium">Medium (21 to 57 lbs)</option>
                  <option value="Large">Large (over 57 lbs) breed</option>
                </select>
              </div>
            </div>

            <div class="mb-2 row">
              <label for="color" class="col-sm-4 col-form-label">Color</label>
              <div class="col-sm-8">
                <select class="form-select form-select-sm" name="color" aria-label=".form-select-sm example" required>
                  <option selected>{{$dogs->color}}</option>
                  <option value="Black">Black</option>
                  <option value="Brown">Brown</option>
                  <option value="White">White</option>
                  <option value="Gray">Gray</option>
                  <option value="Mixed">Mixed</option>
                  <option value="Dotted">Dotted</option>
                  <option value="Brindled">Brindled</option>
                </select>
              </div>
            </div>

            <div class="mb-2 row">
              <label for="fee" class="col-sm-4 col-form-label">Adoption Fees</label>
              <div class="col-sm-8">
                <input type="amount" maxlength="5" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"name="fee" value="{{$dogs->fee}}"class="form-control form-control-sm">
              </div>
            </div>

            <div class="mb-2 row">
              <label for="feenotes" class="col-sm-4 col-form-label">Reason for Fees</label>
              <div class="col-sm-8">
                <input type="text" name="feenotes" value="{{$dogs->feenotes}}"class="form-control form-control-sm">
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

