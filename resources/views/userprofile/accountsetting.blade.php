@extends('components.navbar')

@section('content')
<style>
  .onlycol{
        background-color:#f4efe9 ;
    }
</style>

<div class='container p-3'>
  <div class="row justify-content-center">
    <div class="col-8 card shadow p-4 onlycol">
      <H1>Account Settings</H1>
      <HR>
        <p class='mb-5 mt-3'>Make changes to your password. This information is private and won't show up in your public profile.</p>

          <div class="row mb-3">
            <label for="inputEmail3" class="col-md-3 col-form-label text-start text-md-center">Registered Email:</label>
            
            <div class="col-12 col-md-6">
              <input name="email" type="email" class="form-control" id="inputEmail3" value="{{ Auth::user()->email}}" disabled>
            </div>

            <div class="col-12 d-flex justify-content-end mt-4">
              <a class='btn btn-primary' href="{{ url('/changepassword') }}">Change Password</a>
            </div>

          </div>
    </div>
  </div>
</div>
@endsection
