@extends('components.navbar')

@section('content')
<style>
  .onlycol{
        background-color:#f4efe9 ;
    }
  .changepass{
    background-color: #799FC8;
    color: #eee7e1;
    text-decoration: none;
    padding:10px 30px 10px 30px;
    border-radius: 9px;
    transition: all 0.2s;
    color: white;

  }
  .changepass:hover{
    background-color:#5082B7;
    border-color:#799FC8;
    border-style: solid;
    color: white;
   
  }

</style>

<div class='container pt-5 pb-5'>
  <div class="row justify-content-center">
    <div class="col-10 col-md-8 card shadow p-4 onlycol">
      <h2 class="" style="font-family: Poppins; color:#413F42"><i class="bi bi-person-fill"></i> Account Settings</h2>
      <HR>
        <p class='mb-5 mt-3'>Make changes to your password. This information is private and won't show up in your public profile.</p>

          <div class="row mb-3">
            <label for="inputEmail3" class="col-md-3 col-form-label text-start text-md-center">Registered Email:</label>
            
            <div class="col-12 col-md-6">
              <input name="email" type="email" class="form-control" id="inputEmail3" value="{{ Auth::user()->email}}" disabled>
            </div>

            <div class="col-12 d-flex justify-content-end mt-4">
              <a class='changepass' href="{{ url('/changepassword') }}">Change Password</a>
            </div>

          </div>
    </div>
  </div>
</div>
@endsection
