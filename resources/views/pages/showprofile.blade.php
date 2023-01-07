@extends('components.profiletabs')

@section('content')


<hr style="margin:0px 0px 5px 0px;padding:0px 0px 0px 0px;border-color:#ececec">
    <div class="container-fluid d-flex justify-content-center" style="padding-left: 5%; padding-right: 5%; padding-top:0px;margin-bottom: 20px">
        <div class="row" style="width:100%;margin-top:20px">
        <H1>Public Profile Display</H1><br>
        <p>People visiting your profile will see the following info:</p>
        @foreach($userdata as $users)
        {{$users->firstname}}
        @endforeach
        {{-- <h1 class="m-0"></h1>
        <div class="m-0"></div>
        <h1 class="m-0">{{$user->lastname}}</h1>
        <h1 class="m-0">{{$user->location}}</h1>
        <h1 class="m-0">{{$user->about}}</h1> --}}
    
        </div>
    </div>





@endsection

