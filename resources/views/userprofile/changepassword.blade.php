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
      <H1>Change password</H1>
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
                <li>{{ $error }}</li>
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
                <input type="password" name="oldpassword" class="form-control" id="oldpassword" placeholder="Input Current Password">
              </div>
              <div class="col-12 mb-3">
                <label for="formGroupExampleInput" class="form-label">New Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Input New Password">
              </div>
              <div class="col-12 mb-3">
                <label for="formGroupExampleInput" class="form-label">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Input Confirm Password">
              </div>
            </div>
            <div class="col-12 d-flex justify-content-center mt-2 mb-3">
              <input type="submit" name="submit" value="Save" class='submit-btn'>
            </div>
          </form>
    </div>
  </div>
</div>
@endsection
