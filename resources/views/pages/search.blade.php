@extends('components.navbar')

@section('content')
<hr style="margin:0px 0px 5px 0px;padding:0px 0px 0px 0px;border-color:#ececec">
<div class="container-fluid mt-5" style="width:92%; text-align:left">
    <form action="{{route('search.index')}}" method="GET" role="search" style="width:100%; background-color:#F4F4F4; border: solid #6388AF; border-radius:5px">
      {{ csrf_field() }}
       <div class="row justify-content-left" >
           <div class="col col-sm-6 col-md-2" style="margin:0px;padding-top: 10px;">
             <div class="form-check form-check-inline" style="vertical-align: middle;">
             <label  for="gender" style="padding-right:10px;">Gender: 
               <select id="gender" name="gender" style="border:none; background-color: rgb(241, 240, 240);width:80px;margin-top:0px;padding-top:0px">
               <option value='' selected><i>Select</i></option>
               <option value="1-Male">Male</option>
               <option value="2-Female">Female</option>
              </select>
            </label>
           </div>
         </div>
             <div class="col col-sm-6 col-md-2" style="margin:0px;padding-top:10px;">
               <div class="form-check form-check-inline" style="vertical-align: middle;">
               <label for="size" style="padding-right:10px;">Size: </label>
                 <select id="size" name="size" style="border:none; background-color: rgb(241, 240, 240);">
                   <option value='' selected><i>Select</i></option>
                   <option value="Small">Small breed</option>
                   <option value="Medium">Medium breed</option>
                   <option value="Large">Large breed</option>
                 </select>
                 </div>
               </div>
               <div class="col col-sm-6 col-md-2" style="margin:0px;padding-top:10px;;">
                 <div class="form-check form-check-inline" style="vertical-align: middle;">
                 <label for="color" style="padding-right:10px;"> Color:</label>
                     <select id="color" name="color" style="border:none;background-color: rgb(241, 240, 240)" >
                      <option value='' selected>Tap to select</option>
                      <option value="Black">Black</option>
                      <option value="Brown">Brown</option>
                      <option value="White">White</option>
                      <option value="Gray">Gray</option>
                      <option value="Mixed">Mixed</option>
                      <option value="Dotted">Dotted</option>
                      <option value="Brindled">Brindled</option>
                    </select>
                   </div>
                 </div>
             <div class="form-group col-md-1" style="margin:auto;text-align: center">
           <input type="submit" class="btn btn-primary" value="SEARCH">
           </form>
         </div>
     </div>  
   </form>
   </div>
   </div>
   <hr style="margin:5px 0px 0px 0px;padding:0px;border-color:#eceaea">
   </div>
   
   <div class="container-fluid" style="padding-left: 5%; padding-right: 5%;padding-top:20px; padding-bottom: 20px;">
     <h5 style="color:#51133c;font-size:18px">{{$dogs->count()}} search results</h5>
     
     <div class="border" style="border-radius:20px;padding: 20px 30px 15px 30px">
      <div class="row">
        @foreach($dogs as $dog)
          <div class="col-lg-3 col-md-6" style="margin-bottom:25px">
            <div class="row" style="padding-bottom:5px">
              <div class="col col-auto" style="margin-right:px">
              <img class="profimg" src="{{'image/' . $dog->profile_pic}}">
              </div>
            <div class="col">
              <div class="row" style="padding-top:2px">{{$dog->users_name}}</div>
              <div class="row" style="font-size: smaller;color:gray;padding-bottom:10px">Posted {{date('M d, Y', strtotime($dog->created_at))}}</div>
            </div>
              </div>
            <div class="containerimg" style="width:100%">
              <img src="{{'image/' . $dog->pic}}" alt="Avatar" class="image" style="width:100%">
              <div class="middle">
                <div class="text"><a href="pages/{{$dog->id}}">View More</a></div>
              </div>
            </div>    
              {{-- <img src="" class="image img-responsive" width="100%" style="padding-bottom:2%" /> --}}
              <p style="font-weight: 700; margin-bottom: 0px; margin-top:0px"> {{($dog->gender=="1-Male")? "Male" : "Female" }}, {{$dog->age_month}}mo. old</p>
              <p style="font-size: small; margin-bottom: 0px; margin-top:0px"><i>{{$dog->breed1_name}} , {{$dog->breed2_name}}</i></p>
            </div>
        @endforeach
      </div>
   </div>
   </div>
@endsection