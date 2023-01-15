@extends('components.navbar')

@section('content')
<style>
  .onlycol{
        background-color:#f4efe9 ;
    }
    .goback{
      color:#b78550;
      text-decoration: none;
      font-size:16px;
      transition: all 0.2s;
    }
    .goback:hover{
      color:#5082B7;
      font-size:17px;
    }
</style>
<hr style="margin:0px 0px 5px 0px;padding:0px 0px 0px 0px;border-color:#ececec">
<div class="container-fluid d-flex justify-content-center" style="padding-left: 5%; padding-right: 5%; padding-top:0px;margin-bottom: 20px">

<div class="row" style="width:100%;margin-top:5px;margin-bottom:20px">
  <a class="btn btn-outline-primary2" href="/accountsetting" type="button" style="vertical-align: bottom; text-align: left; padding-left:10px; width:180px; margin-bottom:20px">
    <i class="fa fa-arrow-left" aria-hidden="true" style="font-size:medium;padding-right:10px;padding-top:4px"></i>Go back</a>
  
  <div class="row justify-content-center">
    <div class="col-12 col-md-6 card shadow p-4 onlycol">
      <h2 class="" style="font-family: Poppins; color:#413F42"> Change password</H1>
        <HR>

          @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <strong>  <li>{{ $error }}</li></strong>
            @endforeach
        </ul>
    </div>
@endif

          <form action="{{route('changePassword')}}" method="POST">
            {!! csrf_field() !!}
            @method('PATCH')
            <input type="hidden" name="_method" value="GET">
            <div class="row mb-3">
              <div class="col-12 mb-3">
                <label for="formGroupExampleInput" class="form-label">Current Password</label>
                <input type="password" name="oldpassword" class="form-control" id="oldpassword">
              </div>
              <div class="col-12 mb-3">
                <label for="formGroupExampleInput" class="form-label">New Password</label>
                <input type="password" name="password" class="form-control" id="password" >
              </div>
              <div class="col-12 mb-3">
                <label for="formGroupExampleInput" class="form-label">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" >
              </div>
            </div>
            <div class="col-12 d-flex justify-content-center mt-2 mb-3">
              <input type="submit" name="submit" value="Save" class='submit-btn'>
            </div>
          </form>
        </div>
    </div>
  </div>
</div>
@endsection
