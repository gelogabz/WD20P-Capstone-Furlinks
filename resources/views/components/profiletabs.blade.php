@extends('components.navbar')

@section('content')
<div class='container p-5'>
    <div class="row">
        <div class="col-lg-2">
            <ul class="nav">
                <li class="nav-item my-4">
                  <a class="nav-link active" aria-current="page" href="/myprofile">My Profile</a>
                </li>
                <li class="nav-item my-4">
                  <a class="nav-link" href="/personalinfo">Personal Info</a>
                </li>
                <li class="nav-item my-4">
                  <a class="nav-link" href="#">Dog History</a>
                </li>
                <li class="nav-item my-4">
                  <a class="nav-link" href="#">Account Settings</a>
                </li>
              </ul>
        </div>
        <div class='col-lg-10'>
          @yield('myprofile')
          @yield('personalinfo')
        </div>
    </div>

</div>
@endsection

