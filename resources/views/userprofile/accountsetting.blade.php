@extends('components.profiletabs')

@section('accountsetting')
<div class='container'>
    <H1>Account Settings</H1>
    <p class='mb-5'>Make changes to your email, password and account type. This information is private and won't show up in your public profile.</p>
    <form>
        <div class="row mb-3">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Email:</label>
          <div class="col-md-5">
            <input type="email" class="form-control" id="inputEmail3">
          </div>
        </div>
        <div class="row mb-3">
          <label for="inputPassword3" class="col-sm-2 col-form-label">Password:</label>
          <div class="col-md-5">
            <input type="password" class="form-control" id="inputPassword3">
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-2 mt-2">
            <button class='btn btn-primary'>Change</button>
          </div>
        </div>
    </form>
<br>
    <H4>Account Changes</H4>
    <div>
    <p class='mb-2 fw-bold'>Delete your data and account.</p>
    <p class=''>Delete your account and account data.</p>
    </div>
    <div class='d-flex justify-content-around'>
    <button class='btn btn-danger'>Delete Account</button>
    </div>
</div>
@endsection
