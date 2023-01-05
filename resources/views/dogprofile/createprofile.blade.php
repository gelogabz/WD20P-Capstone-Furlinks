@extends ('components.navbar')
@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<hr style="margin:0px 0px 5px 0px;padding:0px 0px 0px 0px;border-color:#ececec">

<div class="container-fluid d-flex justify-content-center" style="padding-left: 5%; padding-right: 5%; padding-top:0px;margin-bottom: 20px">
    <div class="row" style="width:100%; margin-top:0px; margin-bottom: 20px;">
      <!--Dog profile pic and social media actions -->  
      <div class="col-lg-4 col-sm-6" style="margin-bottom:10px">
        <img src="{{asset('build/images/searchres/fem8.jpg') }}" alt="dog" class="image" style="width:100%;display:block;border-radius: 20px;margin-bottom:10px;margin-top:10px">
        <div style="text-align: center;">
          <button class="btn-primary border rounded-1 px-3 pb-2" type="submit" >Remove Uploaded Image</i></button>
        </div>
      </div>
      <!--Dog profile information -->
      <div class="col-lg-5 col-sm-6" style="padding-left:20px;padding-top:15px;margin-bottom: 20px;">
        <h3>Edit Dog Details</h3><br>  
          <div class="container">
          <form action="/pages/" method="post">
            {!! csrf_field() !!}
            {{-- PATCH- specific part PUT - whole resource --}}
            <input type="text" name="id" class="form-control">
            <input type="text" name="breed_id2" class="form-control">
            <input type="text" name="pic" class="form-control">
            <input type="text" name="size" class="form-control">
            <input type="text" name="color" class="form-control">
            <input type="text" name="name" class="form-control">
            <input type="text" name="location" class="form-control">
            <input type="text" name="rescued" class="form-control">
            <input type="text" name="fee" class="form-control">
            <input type="text" name="feenotes" class="form-control">
            <label class="h5 mb-2">Breed</label>
            <input type="text" name="breed_id1" class="form-control">
            <label class="mb-2">Follow the format [breed-1] - [breed-2] - [breed-3]</label>
            <h5 class="mb-2">Gender</h5>
            <select class="form-select mb-2" style="width:100px;" name="gender">
              <option>Choose</option>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
            </select>
            <label class="h5">Age</label>
            <input type="number" class="form-control mb-2" name="age" style="width:60px;" >
            <label class="h5">Birthdate</label>
            <input type="date" class="form-control mb-2" name="birthdate" style="width:120px;"  >
            <label class="h5">Date Rescued</label>
            <input type="date" class="form-control" name="dogrescued" style="width:120px;">
            <label class="mt-2 text-danger">Leave blank if dog was rescued</label>
            <br>
            <label class="h5">Breed of Sire</label>
            <input type="text" class="form-control mb-2" >
            <label class="h5">Breed of Dam</label>
            <input type="text" class="form-control mb-2" >
            <br>
            <h5 class="mb-2">Vaccinated?</h5>
            <select class="form-select mb-2" style="width:100px;" name="neutered">
              <option>Choose oWptions</option>
              <option value="Yes">Yes</option>
              <option value="No">No</option>
            </select>
            <input type="submit" name="submit" class="btn btn-primary" value="Yes">
         
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    Add to post?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" value="EDIT ">POST</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                  </div>
                </div>
              </div>
            </div>
          </form>
          </div>
      </div>
    </div>
</div>

@endsection