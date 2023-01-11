@extends('components.navbar')

@section('content')

<hr style="margin:0px 0px 5px 0px; padding:0px 0px 0px 0px; border-color:#ececec">

<div class="container-fluid mt-5" style="width:92%; text-align:left">
  <form action="{{route('search.index')}}" method="GET" role="search" style="width:100%; background-color:#F0E8DC; border: solid #6388AF; border-radius:10px">
    {{ csrf_field() }}
    <div class="d-flex align-items-center justify-content-center" style="opacity:90%">
          <div class="d-flex form-row justify-content-left rounded-2 w-100"  style="background-color: #F4F4F4; font-size:small">
          
            <div class="form-group col-sm-3 col-lg-3 col-md-3" style="vertical-align:middle; margin:auto; padding:3px;">
              <label style="font-family: 'Poppins'; font-size:18px; color:#413F42;" class="fw-bold my-2 ms-5"> Gender: </label>
                <select class="rounded-2 py-1 pe-5 mx-2" name="gender" id="gender" style="border:none; background-color:white; font-family: 'Lato'; font-size:12pt;">
                  <option value='' selected><i>Select</i></option>
                  <option value="1-Male" {{($gender=="1-Male")? "selected" : "" }}>Male</option>
                  <option value="2-Female" {{($gender=="2-Female")? "selected" : "" }}>Female</option>
                 </select>
            </div>
            <div class="form-group col-sm-4 col-lg-4 col-md-4" style="vertical-align:middle; margin:auto; padding:3px;">
              <label style="font-family: 'Poppins'; font-size:18px; color:#413F42;" class="fw-bold my-2 ms-5"> Size: </label>
                <select class="rounded-2 py-1 pe-3 mx-2" name="size" id="size" style="border:none; background-color:white; font-family: 'Lato'; font-size:12pt;">
                  <option value='' selected><i>Select</i></option>
                  <option value="Small"  {{($size=="Small")? "selected" : ""}}>Small breed</option>
                  <option value="Medium" {{($size=="Medium")? "selected" : ""}}>Medium-sized breed</option>
                  <option value="Large"  {{($size=="Large")? "selected" : ""}}>Large breed</option>
                </select>
            </div>
            <div class="form-group col-sm-3 col-lg-3 col-md-3" style="vertical-align:middle; margin:auto; padding:3px;">
              <label style="font-family: 'Poppins'; font-size:18px; color:#413F42;" class="fw-bold my-2"> Color: </label>
                <select class="rounded-2 py-1 pe-5 mx-2" name="color" id="color" style="border:none; background-color:white; font-family: 'Lato'; font-size:12pt;">
                  <option value='' selected>Select</option>
                  <option value="Black" {{($color=="Black")? "selected" : ""}}>Black</option>
                  <option value="Brown" {{($color=="Brown")? "selected" : ""}}>Brown</option>
                  <option value="White" {{($color=="White")? "selected" : ""}}>White</option>
                  <option value="Gray" {{($color=="Gray")? "selected" : ""}}>Gray</option>
                  <option value="Mixed" {{($color=="Mixed")? "selected" : ""}}>Mixed</option>
                  <option value="Dotted" {{($color=="Dotted")? "selected" : ""}}>Dotted</option>
                  <option value="Brindled" {{($color=="Brindled")? "selected" : ""}}>Brindled</option>
                </select>
            </div>
            <div class="form-group col-sm-1 col-lg-1 col-md-2">
              <input type="submit" value="SEARCH" class="btn rounded-2 border-0 py-0 px-2 h-100 w-100" style="letter-spacing:3px; font-family: 'Lato'; color:#FFF; background-color:#5082B7;">
              {{-- <input type="submit" name="search" role=search id="search" value="SEARCH" class="btn btn-primary rounded-2 h-100" style="border-radius:0; letter-spacing:3px; font-family: 'Lato'; padding-top:7px; color:#FFF; background-color:#5082B7;"/> --}}
                  {{-- <i class="fa-solid fa-magnifying-glass" style="padding-top:15px;"></i> --}}
            </div>
          </div>  
        </div>
  </form>
</div>

   <hr style="margin:5px 0px 0px 0px;padding:0px;border-color:#eceaea">
   </div>
   
   
   <div class="container-fluid" style="padding-left: 5%; padding-right: 5%;padding-top:20px; padding-bottom: 20px;">
    

     <h5 style="color:#413F42;font-size:18px">
      @if(Request::has("gender") == '' && Request::has("size") == '' && Request::has("color") == '')   
       Showing all dogs posted🐶
     @else
       Displaying {{$dogs->count()}} search results for {{($gender=="1-Male") ? "Male - " : ""}} {{($gender=="2-Female") ? "Female - " : ""}}{{($size != "")? $size.' - ' : "any size "}}{{($color!="")? $color : "any color"}}
     @endif
     </h5>
     
     <div class="border mt-4" style="border-radius:20px;padding: 20px 30px 15px 30px">
      <div class="row">
        
        @foreach($dogs as $dog)
      <div class="col-lg-3 col-md-6" style="margin-bottom:25px">
        <div class="row" style="padding-bottom:5px">
        <div class="col col-auto" style="margin-right:px">
       <img class="profimg" src="{{'image/' . $dog->profile_pic}}">
       </div>
       <div class="col">
         <div class="row fw-bold" style="padding-top:2px; color:#180A0A; font-family:Poppins;">{{$dog->users_name}}</div>
         <div class="row" style="font-size: small; font-family: 'Lato'; color:#413F42; font-weight:300;">Posted {{date('M d, Y', strtotime($dog->created_at))}}</div>
       </div>
        </div>
       <div class="containerimg" style="width:100%">
       <img src="{{'image/' . $dog->pic}}" class="image img-responsive" width="100%">
       <div class="middle">
            <a href="pages/{{$dog->id}}" style="text-decoration:none;" class="text">View More</a>
          </div>
     </div>    
         <img src="" class="image img-responsive" width="100%" style="padding-bottom:2%" />
       <p style="font-weight: 700; margin-bottom: 0px; margin-top:0px; font-family: 'Poppins'; color:#413F42;"> {{($dog->gender=="1-Male")? "Male" : "Female" }}, {{$dog->age_month}}mo. old</p>
       <p style="margin-bottom: 0px; margin-top:0px; font-family: 'Lato'; color:#413F42;; font-weight:500;"><i>{{$dog->breed1_name}} , {{$dog->breed2_name}}</i></p>
     </div>
      @endforeach
      
      
    </div>
   </div>
    <div class="mt-4 ms-2">
      {{$dogs->links()}}
    </div>

    </div>
    
  
@endsection