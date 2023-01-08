@extends('components.navbar')

@section('content')
<hr style="margin:0px 0px 5px 0px;padding:0px 0px 0px 0px;border-color:#ececec">
<div class="container-fluid" style="width:92%;text-align:left">
    <form action="{{route('search.index')}}" method="GET" role="search" style="width:100%; background-color: rgb(241, 240, 240);margin-top:3x;padding-left:30px;border-radius:5px">
      {{ csrf_field() }}
       <div class="row justify-content-left" >
           <div class="col col-sm-6 col-md-2" style="margin:0px;padding-top: 10px;">
             <div class="form-check form-check-inline" style="vertical-align: middle;">
             <label  for="gender" style="padding-right:10px;">Gender: 
               <select id="gender" name="gender" style="border:none; background-color: rgb(241, 240, 240);width:80px;margin-top:0px;padding-top:0px">
               <option selected><i>Select</i></option>
               <option value="Male">Male</option>
               <option value="Female">Female</option>
              </select>
            </label>
           </div>
         </div>
             <div class="col col-sm-6 col-md-2" style="margin:0px;padding-top:10px;">
               <div class="form-check form-check-inline" style="vertical-align: middle;">
               <label for="size" style="padding-right:10px;">Size: 
                 <select id="size" style="border:none; background-color: rgb(241, 240, 240);">
                   <option selected><i>Select</i></option>
                   <option>Small breed</option>
                   <option>Medium-sized</option>
                   <option>Large breed</option>
                 </select></label>
                 </div>
               </div>
               <div class="col col-sm-6 col-md-2" style="margin:0px;padding-top:10px;;">
                 <div class="form-check form-check-inline" style="vertical-align: middle;">
                 <label for="dogtype" style="padding-right:10px;"> Color:
                     <select id="dogtype" style="border:none;background-color: rgb(241, 240, 240)" >
                       <option selected><i>Select</i></option>
                       <option>White</option>
                       <option>Black</option>
                       <option>Brown</option>
                       <option>Mixed</option>
                   </select> </label>
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
     <h5 style="color:#51133c;font-size:18px">10 search results for 'Female puppy 3-6 mos'</h6>
     <div class="border" style="border-radius:20px;padding: 20px 30px 15px 30px">
      <div class="row">
        @foreach($dogs as $dog)
        <div class="col-lg-3 col-md-6">
          <div class="containerimg" style="width:100%">
            <img src="{{'image/' . $dog->pic}}" class="image img-responsive" width="100%" style="padding:5%; padding-bottom:2%" />
            <div class="middle">
              <div class="text"><a href="pages/{{$dog->id}}">View More</a></div>
            </div>
          </div>
          <p style="padding-left:5%;font-weight: 700; margin-bottom: 0px; margin-top:0px; font-family: 'Poppins';">{{$dog->gender}}, {{$dog->age_month}} month/s. old</p>
          <p style="padding-left:5%; margin-bottom: 0px; margin-top:0px; font-family: 'Lato';"><i>{{$dog->breed1_name}} , {{$dog->breed2_name}}</i></p>
          <p style="padding-left:5%;font-size: small; font-family: 'Lato';">Posted {{date('M d, Y', strtotime($dog->created_at))}}</p>
        </div>
      @endforeach
      </div>
   {{-- <div class="row">
     <!--dog1 fem0-->
      <div class="col-lg-3 col-md-6" style="margin-bottom:25px">
       <div class="row" style="padding-bottom:5px">
       <div class="col col-auto" style="margin-right:px">
       <img class="profimg" src="{{asset('build/images/profilepic/chef.jpg') }}">
       </div>
       <div class="col">
         <div class="row" style="padding-top:2px"> chefarnold </div>
         <div class="row" style="font-size: smaller;color:gray;padding-bottom:10px">Posted 1d ago</div>
       </div>
     </div>
       <div class="containerimg" style="width:100%">
       <img src="{{asset('build/images/searchres/fem0.jpg') }}" alt="Avatar" class="image" style="width:100%">
       <div class="middle">
         <div class="text"><a href="/dogdeets">View More</a></div>
       </div>
     </div>    
         <img src="" class="image img-responsive" width="100%" style="padding-bottom:2%" />
       <p style="font-weight: 700; margin-bottom: 0px; margin-top:0px">Female, 3 mo. old
       <span style="float:right; padding-right: 2%;font-size: small">79 <i class="fa-regular fa-heart" style="font-size:large"></i></span>
       </p>
       <p style="font-size: small; margin-bottom: 0px; margin-top:0px"><i>Aspin - Spitz - Shih Tzu</i></p>
     </div>
     <!--dog2 fem1-->
     <div class="col-lg-3 col-md-6" style="margin-bottom:25px">
       <div class="row" style="padding-bottom:5px">
       <div class="col col-auto" style="margin-right:px">
       <img class="profimg" src="{{asset('build/images/profilepic/mfal.jpg') }}">
       </div>
       <div class="col">
         <div class="row" style="padding-top:2px;"> mfalguera </div>
         <div class="row" style="font-size: smaller;color:gray;padding-bottom:10px">Posted 2d ago</div>
       </div>
     </div>
       <div class="containerimg" style="width:100%">
       <img src="{{asset('build/images/searchres/fem1.jpg') }}" alt="Avatar" class="image" style="width:100%">
       <div class="middle">
         <div class="text"><a href="/dogdeets"> View More </a></div>
       </div>
     </div>    
         <img src="" class="image img-responsive" width="100%" style="padding-bottom:2%" />
       <p style="font-weight: 700; margin-bottom: 0px; margin-top:0px">Female, 4 mo. old
       <span style="float:right; padding-right: 2%;font-size: small">43 <i class="fa-regular fa-heart" style="font-size:large"></i></span>
       </p>
       <p style="font-size: small; margin-bottom: 0px; margin-top:0px"><i>Aspin</i></p>
     </div>
   <!--dog3 fem2-->
   <div class="col-lg-3 col-md-6" style="margin-bottom:25px">
     <div class="row" style="padding-bottom:5px">
     <div class="col col-auto" style="margin-right:px">
     <img class="profimg" src="{{asset('build/images/profilepic/mfal.jpg') }}">
     </div>
     <div class="col">
       <div class="row" style="padding-top:2px"> mfalguera </div>
       <div class="row" style="font-size: smaller;color:gray;padding-bottom:10px">Posted 2d ago</div>
     </div>
   </div>
     <div class="containerimg" style="width:100%">
     <img src="{{asset('build/images/searchres/fem2.jpg') }}" alt="Avatar" class="image" style="width:100%">
     <div class="middle">
       <div class="text"><a href="/dogdeets"> View More </a></div>
     </div>
   </div>    
       <img src="" class="image img-responsive" width="100%" style="padding-bottom:2%" />
     <p style="font-weight: 700; margin-bottom: 0px; margin-top:0px">Female, 4 mo. old
     <span style="float:right; padding-right: 2%;font-size: small">38 <i class="fa-regular fa-heart" style="font-size:large"></i></span>
     </p>
     <p style="font-size: small; margin-bottom: 0px; margin-top:0px"><i>Aspin</i></p>
   </div>
     <!--dog4 fem5-->
     <div class="col-lg-3 col-md-6" style="margin-bottom:25px">
       <div class="row" style="padding-bottom:5px">
       <div class="col col-auto" style="margin-right:px">
       <img class="profimg" src="{{asset('build/images/profilepic/sam.jpg') }}">
       </div>
       <div class="col">
         <div class="row" style="padding-top:2px">samyg </div>
         <div class="row" style="font-size: smaller;color:gray;padding-bottom:10px">Posted 4d ago</div>
       </div>
     </div>
       <div class="containerimg" style="width:100%">
       <img src="{{asset('build/images/searchres/fem5.jpg') }}" alt="Avatar" class="image" style="width:100%">
       <div class="middle">
         <div class="text"><a href="/dogdeets">View More</a></div>
       </div>
     </div>    
         <img src="" class="image img-responsive" width="100%" style="padding-bottom:2%" />
       <p style="font-weight: 700; margin-bottom: 0px; margin-top:0px">Female, 3 mo. old
       <span style="float:right; padding-right: 2%;font-size: small">24 <i class="fa-regular fa-heart" style="font-size:large"></i></span>
       </p>
       <p style="font-size: small; margin-bottom: 0px; margin-top:0px"><i>Aspin - Labrador</i></p>
     </div>
     <!--dog5 fem4-->
     <div class="col-lg-3 col-md-6" style="margin-bottom:25px">
       <div class="row" style="padding-bottom:5px">
       <div class="col col-auto" style="margin-right:px">
       <img class="profimg" src="{{asset('build/images/profilepic/jinkee.jpg') }}">
       </div>
       <div class="col">
         <div class="row" style="padding-top:2px">jinkee0721 </div>
         <div class="row" style="font-size: smaller;color:gray;padding-bottom:10px">Posted 1w ago</div>
       </div>
     </div>
       <div class="containerimg" style="width:100%">
       <img src="{{asset('build/images/searchres/fem4.jpg') }}" alt="Avatar" class="image" style="width:100%">
       <div class="middle">
         <div class="text"><a href="/dogdeets">View More</a></div>
       </div>
     </div>    
         <img src="" class="image img-responsive" width="100%" style="padding-bottom:2%" />
       <p style="font-weight: 700; margin-bottom: 0px; margin-top:0px">Female, 3 mo. old
       <span style="float:right; padding-right: 2%;font-size: small">19 <i class="fa-regular fa-heart" style="font-size:large"></i></span>
       </p>
       <p style="font-size: small; margin-bottom: 0px; margin-top:0px"><i>Aspin - Labrador</i></p>
     </div>
     <!--dog6 fem6-->
     <div class="col-lg-3 col-md-6" style="margin-bottom:25px">
       <div class="row" style="padding-bottom:5px">
       <div class="col col-auto" style="margin-right:px">
       <img class="profimg" src="{{asset('build/images/profilepic/jinkee.jpg') }}">
       </div>
       <div class="col">
         <div class="row" style="padding-top:2px">jinkee0721 </div>
         <div class="row" style="font-size: smaller;color:gray;padding-bottom:10px">Posted 1w ago</div>
       </div>
     </div>
       <div class="containerimg" style="width:100%">
       <img src="{{asset('build/images/searchres/fem6.jpg') }}" alt="Avatar" class="image" style="width:100%">
       <div class="middle">
         <div class="text"><a href="/dogdeets">View More</a></div>
       </div>
     </div>    
         <img src="" class="image img-responsive" width="100%" style="padding-bottom:2%" />
       <p style="font-weight: 700; margin-bottom: 0px; margin-top:0px">Female, 3 mo. old
       <span style="float:right; padding-right: 2%;font-size: small">15 <i class="fa-regular fa-heart" style="font-size:large"></i></span>
       </p>
       <p style="font-size: small; margin-bottom: 0px; margin-top:0px"><i>Aspin - Labrador - GSD</i></p>
     </div>
     <!--dog7 fem7-->
     <div class="col-lg-3 col-md-6" style="margin-bottom:25px">
       <div class="row" style="padding-bottom:5px">
       <div class="col col-auto" style="margin-right:px">
       <img class="profimg" src="{{asset('build/images/profilepic/jinkee.jpg') }}">
       </div>
       <div class="col">
         <div class="row" style="padding-top:2px">jinkee0721 </div>
         <div class="row" style="font-size: smaller;color:gray;padding-bottom:10px">Posted 1w ago</div>
       </div>
     </div>
       <div class="containerimg" style="width:100%">
       <img src="{{asset('build/images/searchres/fem7.jpg') }}" alt="Avatar" class="image" style="width:100%">
       <div class="middle">
         <div class="text"><a href="/dogdeets">View More</a></div>
       </div>
     </div>    
         <img src="" class="image img-responsive" width="100%" style="padding-bottom:2%" />
       <p style="font-weight: 700; margin-bottom: 0px; margin-top:0px">Female, 3 mo. old
       <span style="float:right; padding-right: 2%;font-size: small">15 <i class="fa-regular fa-heart" style="font-size:large"></i></span>
       </p>
       <p style="font-size: small; margin-bottom: 0px; margin-top:0px"><i>Aspin - Labrador - GSD</i></p>
     </div>
    <!--dog8 fem8-->
    <div class="col-lg-3 col-md-6" style="margin-bottom:25px">
     <div class="row" style="padding-bottom:5px">
     <div class="col col-auto" style="margin-right:px">
     <img class="profimg" src="{{asset('build/images/profilepic/chef.jpg') }}">
     </div>
     <div class="col">
       <div class="row" style="padding-top:2px"> chefarnold </div>
       <div class="row" style="font-size: smaller;color:gray;padding-bottom:10px">Posted 10d ago</div>
     </div>
   </div>
     <div class="containerimg" style="width:100%">
     <img src="{{asset('build/images/searchres/fem8.jpg') }}" alt="Avatar" class="image" style="width:100%">
     <div class="middle">
       <div class="text"><a href="/dogdeets">View More</a></div>
     </div>
   </div>    
       <img src="" class="image img-responsive" width="100%" style="padding-bottom:2%" />
     <p style="font-weight: 700; margin-bottom: 0px; margin-top:0px">Female, 3 mo. old
     <span style="float:right; padding-right: 2%;font-size: small">13 <i class="fa-regular fa-heart" style="font-size:large"></i></span>
     </p>
     <p style="font-size: small; margin-bottom: 0px; margin-top:0px"><i>Aspin - Labrador</i></p>
   </div>
     <!--dog9 fem9-->
     <div class="col-lg-3 col-md-6" style="margin-bottom:25px">
       <div class="row" style="padding-bottom:5px">
       <div class="col col-auto" style="margin-right:px">
       <img class="profimg" src="{{asset('build/images/profilepic/mfal.jpg') }}">
       </div>
       <div class="col">
         <div class="row" style="padding-top:2px"> mfalguera </div>
         <div class="row" style="font-size: smaller;color:gray;padding-bottom:10px">Posted 2w ago</div>
       </div>
     </div>
       <div class="containerimg" style="width:100%">
       <img src="{{asset('build/images/searchres/fem1.jpg') }}" alt="Avatar" class="image" style="width:100%">
       <div class="middle">
         <div class="text"><a href="/dogdeets"> View More </a></div>
       </div>
     </div>    
         <img src="" class="image img-responsive" width="100%" style="padding-bottom:2%" />
       <p style="font-weight: 700; margin-bottom: 0px; margin-top:0px">Female, 4 mo. old
       <span style="float:right; padding-right: 2%;font-size: small">10 <i class="fa-regular fa-heart" style="font-size:large"></i></span>
       </p>
       <p style="font-size: small; margin-bottom: 0px; margin-top:0px"><i>Aspin</i></p>
     </div>
   <!--dog10 fem3-->
   <div class="col-lg-3 col-md-6" style="margin-bottom:25px">
     <div class="row" style="padding-bottom:5px">
     <div class="col col-auto" style="margin-right:px">
     <img class="profimg" src="{{asset('build/images/profilepic/jinkee.jpg') }}">
     </div>
     <div class="col">
       <div class="row" style="padding-top:2px">jinkee0721 </div>
       <div class="row" style="font-size: smaller;color:gray;padding-bottom:10px">Posted 2w ago</div>
     </div>
   </div>
     <div class="containerimg" style="width:100%">
     <img src="{{asset('build/images/searchres/fem3.jpg') }}" alt="Avatar" class="image" style="width:100%">
     <div class="middle">
       <div class="text"><a href="/dogdeets">View More</a></div>
     </div>
   </div>    
       <img src="" class="image img-responsive" width="100%" style="padding-bottom:2%" />
     <p style="font-weight: 700; margin-bottom: 0px; margin-top:0px">Female, 3 mo. old
     <span style="float:right; padding-right: 2%;font-size: small">7 <i class="fa-regular fa-heart" style="font-size:large"></i></span>
     </p>
     <p style="font-size: small; margin-bottom: 0px; margin-top:0px"><i>Aspin - Labrador - GSD</i></p>
   </div>
   </div> --}}
   </div>
   </div>
@endsection