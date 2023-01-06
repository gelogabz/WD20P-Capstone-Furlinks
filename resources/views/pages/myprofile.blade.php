@extends('components.profiletabs')

@section('myprofile')
<div class='container'>
    <H1>Public Profile</H1>
    <p>People visiting your profile will see the following info:</p>

    
    {{-- <div class="card">
      <img src="{{assets('public/Profilepicture/' . $imageData) }}" width="200px"/>
    </div>
    --}}
      <form action="{{route('image.store')}}" method="post" enctype="multipart/form-data">
        @csrf
    <div class='mt-3'>
      <input type="file" name="image" id="image">
      <input type="submit" class="btn btn-primary" value="Change">
    </div>
    </form>
    <br><br> 

  
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
@endsection
