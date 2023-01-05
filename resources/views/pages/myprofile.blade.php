@extends('components.profiletabs')

@section('myprofile')
<div class='container'>
    <H1>Public Profile</H1>
    <p>People visiting your profile will see the following info:</p>
    <div class="form-floating mb-3">
        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
        <label class="text-muted" for="floatingInput">First Name</label>
      </div>
      <div class="form-floating  mb-3">
        <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
        <label class="text-muted" for="floatingPassword">Last Name</label>
      </div>
      <div class="form-floating my-2">
        <textarea id="mess" class="form-control" placeholder="Leave a comment here" style="height: 100px"></textarea>
        <label class="text-muted" for="floatingTextarea2">About</label>
        
    </div>

</div>
@endsection
