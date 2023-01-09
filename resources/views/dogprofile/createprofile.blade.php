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
<div class="container-fluid d-flex justify-content-center" style="padding-left: 5%; padding-right: 5%; padding-top:0px;margin-bottom: 20px">
    <div class="row" style="width:100%;margin-top:20px">
      <h3>Post a dog for adoption</h3><br>
      <form action="{{ route('dogprofile.store') }}" method="POST" enctype="multipart/form-data">
        {!! csrf_field() !!}
      
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
                  <img class="file-upload-none" id="imgdisplay" src="#" alt="your image" />
                      <div class="container justify-content-center">
                        <div class="image-title-wrap justify-content-center"></div>
                        <center>
                          <button id="rembutton" type="button" onclick="removeUpload()" class="remove-btn" style="text-align:center;width:250px">Remove selected image</button>
                  </div>
              </div>
            </div>
          </div>

          <div class="col-md-9" style="padding-left:2%;padding-right:2%">
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

            <!--DOG BASIC INFO  -->  
            <div class="row">
              <table style="width:100%;margin-top:10px">
                <tr style="border-bottom:0.3pt solid #e1e1e1;">
                  <th colspan="4" style="padding-left:0px;font-size:16px"><i>Basic Information</i></th>    
                </tr>   
              </table>

              <div class="col-md-6 col-sm-12" style="padding-left:20px;padding-top:15px;">
                <div class="mb-2 row">
                    <label for="gender" class="col-sm-4 col-form-label">Gender</label>
                    <div class="col-sm-8">
                      <select class="form-select form-select-sm" name="gender" aria-label=".form-select-sm example" required>
                        <option selected>Tap to select</option>
                        <option value="1-Male">Male</option>
                        <option value="2-Female">Female</option>
                      </select>
                    </div>
                </div>
                <div class="mb-2 row">
                  <label for="age" class="col-sm-4 col-form-label">Age</label>
                  <div class="col-sm-4">
                      <input type="number" name="age_yr" class="form-control form-control-sm">
                      <span class="form-label-inline" style="font-size:.8rem; font-style:italic">Year/s</span>
                  </div>
                  <div class="col-sm-4">
                    <input type="number" name="age_month" class="form-control form-control-sm">
                    <label for="age_month" class="col-form-label col-form-label-sm" style="font-size:.8rem; font-style:italic">Month/s</label>
                  </div>
                </div>
              </div>

              <div class="col-md-1 col-sm-1"></div>
              
              <div class="col-md-5 col-sm-12" style="padding-left:20px;padding-top:15px;">
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
                      <option selected>Tap to select</option>
                      <?php
                      $conn = mysqli_connect($servername, $username, $password, $dbname);
                      $breed = "SELECT * FROM `breed`";
                      $resulta = mysqli_query($conn, $breed);
                          if (mysqli_num_rows($resulta)>0){
                              while ($row = mysqli_fetch_assoc($resulta)){
                                  echo "<option value=".$row["id"].">".$row["name"]. "</option>";
                          }
                          }else {
                              echo "no breed found";
                          }
                      ?>
                    </select>
                  </div>
                </div>

                <div class="mb-2 row">
                  <label for="breed_id2" class="col-sm-4 col-form-label">Secondary Breed</label>
                  <div class="col-sm-8">
                    <select class="form-select form-select-sm" name="breed_id2" aria-label=".form-select-sm example" required>
                      <option selected>Tap to select</option>
                      <?php
                      $conn = mysqli_connect($servername, $username, $password, $dbname);
                      $breed = "SELECT * FROM `breed`";
                      $resulta = mysqli_query($conn, $breed);
                          if (mysqli_num_rows($resulta)>0){
                              while ($row = mysqli_fetch_assoc($resulta)){
                                  echo "<option value=".$row["id"].">"    .$row["name"]. "</option>";
                          }
                          }else {
                              echo "no breed found";
                          }
                      ?>
                    </select>
                  </div>
                </div>
              
              </div>
            
            </div>

            <!--DOG ADDITIONAL INFO  --> 
            <div class="row">
              <table style="width:100%;">
                <tr style="border-bottom:0.3pt solid #e1e1e1;">
                  <th colspan="4" style="padding-left:0px;font-size:16px"><i>Dog History</i></th>    
                </tr>   
              </table>
    
              <div class="col-md-6 col-sm-12" style="padding-left:20px;padding-top:15px;">
                <div class="mb-2 row">
                  <label for="name" class="col-sm-4 col-form-label">Name
                    <span id="nameHelp" class="text-muted" style="font-size:.8rem; font-style:italic">
                      (Optional)
                    </span></label>
                  <div class="col-sm-8">
                    <input type="text" name="name" class="form-control form-control-sm">
                  </div>
                </div>

                <div class="mb-2 row">
                  <label for="location" class="col-sm-4 col-form-label">Location
                    <span id="lochelp" class="text-muted" style="font-size:.8rem; font-style:italic">
                      (City, Region)
                    </span></label>
                  <div class="col-sm-8">
                    <input type="text" name="location" class="form-control form-control-sm">
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
                    <input type="date" name="rescuedate" class="form-control form-control-sm">
                  </div>
                </div>
              </div>
              <div class="col-md-1 col-sm-1"></div>
              <div class="col-md-5 col-sm-12" style="padding-left:20px;padding-top:15px;margin-bottom: 20px;">
                <div class="mb-2 row">
                  <label for="size" class="col-sm-4 col-form-label">Size</label>
                  <div class="col-sm-8">
                    <select class="form-select form-select-sm" name="size" aria-label=".form-select-sm example" required>
                      <option selected>Tap to select</option>
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
                      <option selected>Tap to select</option>
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
                  <label for="neutered" class="col-sm-4 col-form-label">Neutered/Spayed?</label>
                  <div class="col-sm-8">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input custom-control" type="radio" name="neutered" id="inlineRadio1" value="1">
                      <label class="form-check-label" for="inlineRadio1" style="font-size:14px">Yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="neutered" id="inlineRadio2" value="0">
                      <label class="form-check-label" for="inlineRadio1" style="font-size:14px">No</label>
                    </div>
                  </div>
                </div>
                
                <div class="mb-2 row">
                  <label for="birthdate" class="col-sm-4 col-form-label">Birthdate</label>
                  <div class="col-sm-8">
                    <input type="date" name="birthdate" class="form-control form-control-sm">
                  </div>
                </div>

              </div>
            
            </div>

            <!--ADOPTION INFO  -->            
            <div class="row">
              <table style="width:100%;">
                <tr style="border-bottom:0.3pt solid #e1e1e1;">
                  <th colspan="4" style="padding-left:0px;font-size:16px"><i>Adoption Fees</i></th>    
                </tr>   
              </table>

              <div class="col-md-4 col-sm-12" style="padding-left:20px;padding-top:15px;">
                <div class="mb-2 row">
                  <label for="fee" class="col-sm-4 col-form-label">Amount</label>
                  <div class="col-sm-8">
                    <input type="amount" name="fee" class="form-control form-control-sm">
                  </div>
                </div>
              </div>

              <div class="col-md-1 col-sm-1"></div>
              
              <div class="col-lg-7 col-sm-12" style="padding-left:20px;padding-top:15px;margin-bottom: 20px;">
                <div class="mb-2 row">
                  <label for="feenotes" class="col-sm-4 col-form-label">Reason for Fees</label>
                  <div class="col-sm-8">
                    <input type="textarea" name="feenotes" class="form-control form-control-sm">
                  </div>
                </div>
              </div>
            
            </div>

            <div class="row justify-content-center" >
              <input type="submit" name="submit" class="button btn-primary2" value="Submit">
            </div>
          </div>
        </div>
      </form>
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

@endsection
