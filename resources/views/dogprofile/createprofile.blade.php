@extends ('components.navbar')
@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<hr style="margin:0px 0px 5px 0px;padding:0px 0px 0px 0px;border-color:#ececec">

<div class="container-fluid d-flex justify-content-center" style="padding-left: 5%; padding-right: 5%; padding-top:0px;margin-bottom: 20px">
    <div class="row" style="width:100%; margin-top:0px; margin-bottom: 20px;">
      <h3>Post a dog for adoption</h3><br>
      <!--Dog profile pic and social media actions -->  
      <div class="col-lg-4 col-sm-6" style="margin-bottom:10px">

        <img src="{{asset('build/images/searchres/fem8.jpg') }}" alt="dog" class="image" style="width:100%;display:block;border-radius: 20px;margin-bottom:10px;margin-top:10px">
        <div style="text-align: center;">
          <button class="btn-primary border rounded-1 px-3 pb-2" type="submit" >Remove Uploaded Image</i></button>
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
          <form action="{{ route('dogprofile.store') }}" method="POST" enctype="multipart/form-data">
            {!! csrf_field() !!}
            {{-- PATCH- specific part PUT - whole resource --}}
            <div class="mb-2 row">
              <label for="gender" class="col-sm-4 col-form-label">Gender</label>
              <div class="col-sm-8">
                <select class="form-select form-select-sm" name="gender" aria-label=".form-select-sm example" required>
                  <option selected>Tap to select</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
              </div>
            </div>

            <div class="mb-2 row">
              <label for="age" class="col-sm-4 col-form-label">Age</label>
              <div class="col-sm-4">
                <input type="number" name="age_yr" class="form-control form-control-sm">
                <label for="age_yr" class="col-form-label col-form-label-sm" style="font-size:.8rem; font-style:italic">Year/s</label>
              </div>
              <div class="col-sm-4">
                <input type="number" name="age_month" class="form-control form-control-sm">
                <label for="age_month" class="col-form-label col-form-label-sm" style="font-size:.8rem; font-style:italic">Month/s</label>
              </div>
            </div>

            <?php    
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "furlinks_v1";
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
              <label for="breed_id2" class="col-sm-4 col-form-label">Primary Breed</label>
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
                  (City, Province)
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

            <div class="mb-2 row">
              <label for="birthdate" class="col-sm-4 col-form-label">Birthdate</label>
              <div class="col-sm-8">
                <input type="date" name="birthdate" class="form-control form-control-sm">
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
              <label for="fee" class="col-sm-4 col-form-label">Adoption Fees</label>
              <div class="col-sm-8">
                <input type="amount" name="fee" class="form-control form-control-sm">
              </div>
            </div>

            <div class="mb-2 row">
              <label for="feenotes" class="col-sm-4 col-form-label">Reason for Fees</label>
              <div class="col-sm-8">
                <input type="text" name="feenotes" class="form-control form-control-sm">
              </div>
            </div>


            <input type="submit" name="submit" class="btn btn-primary" value="Submit">
          </form>
          </div>
      </div>
    </div>
</div>

@endsection