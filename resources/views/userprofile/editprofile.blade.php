@extends('components.profiletabs')

@section('editprofile')
@foreach($userdata as $item)
<h1>{{$item->firstname}}</h1>
@endforeach







@endsection