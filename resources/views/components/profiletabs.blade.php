@extends('components.navbar')

@section('content')
<div class='container p-5'>
    <div class="row">
        <div class="col-lg-2">
            <ul class="nav">
                <li class="nav-item my-4">
                  <a class="nav-link active" aria-current="page" href="/home">My Profile</a>
                </li>
                <li class="nav-item my-4">
                  <a class="nav-link" href="/personalinfo">Personal Info</a>
                </li>
                <li class="nav-item my-4">
                  <a class="nav-link" href="/doghistory">Dog History</a>
                </li>
                <li class="nav-item my-4">
                  <a class="nav-link" href="/accountsetting">Account Settings</a>
                </li>
              </ul>
        </div>
        <div class='col-lg-10'>
          @yield('createprofile')
          @yield('personalinfo')
          @yield('doghistory')
          @yield('accountsetting')
          @yield('editprofile')
          
        </div>
    </div>

</div>
@endsection

