@extends ('components.navbar')

@section('content')
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
        <h3>Edit Dog Details<br>  
          <div class="row pt-3">
            <div class="col-lg-12">
              <h5>Breed:<h5>
              <input type="text" style="width:100%">
              <p style="font-size:12px;">Follow the format [breed 1]- [breed 2]- [breed 3]</p>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <h5>Gender<h5>
                <h5 class="ms-5">Male<input type="radio" class="ms-5"></h5>
                <h5 class="ms-5">Female<input type="radio" class="ms-4"></h5>
                <br>
                
            </div>
          </div>
      </div>
    </div>
</div>

@endsection