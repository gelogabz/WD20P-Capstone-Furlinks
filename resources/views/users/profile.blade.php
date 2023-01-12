@extends ('components.navbar')
@section('content')

<style>
.propic{
  width: 150px;
  border-radius: 50%;
  border-width: 1px;
  height: 150px ;
  object-fit: cover;
}
</style>

<hr style="margin:0px 0px 5px 0px;padding:0px 0px 0px 0px;border-color:#ececec">

<div class="container-fluid d-flex justify-content-center" style="padding-left: 5%; padding-right: 5%; padding-top:0px;margin-bottom:30px">
  <div class="row" style="width:100%;margin-top:5px;margin-bottom:15px">
    <a class="btn btn-outline-primary2" href="{{ url()->previous() }}" type="button" style="vertical-align: bottom;text-align: left;padding-left:10px;width:180px;margin-bottom:10px">
    <i class="fa fa-arrow-left" aria-hidden="true" style="font-size:medium;padding-right:10px;padding-top:4px"></i>Back</a>
  
    <div class="row" style="width:100%"> 
        
      <!--Foster profile information -->
      <div class="card col-lg-3 col-sm-12 text-center border m-1 pt-4 firstcol" style="align-items: center">
        <div class="row" style="padding-bottom:5px">
            <div class="mx-auto">
              <img class="propic" src="{{asset('image/'.$user->profile_pic)}}">
            </div>
            <center>
            <div class="row" style="padding-top:5px;">
            <h4 class='mt-4 mb-3'>{{$user->firstname}} {{$user->lastname}}<br>
            <span style='font-size:medium'>@ {{ $user->user_name }}</p></h4>
            </center>
              <table style='text-align: left; margin-left:50px; margin-bottom:20px'>
                <tr>
                  <td style="line-height: 10px">Rating:
                  <td style="line-height: 10px">
                    <div class="row" style="text-align:left;color:gray;margin-top:0px;padding-top:0px;"> 
                        <span style="padding-right:40px">5.0 <span class="fa fa-star checked"></span> 
                        <span class="fa fa-star checked"></span> 
                        <span class="fa fa-star checked"></span> 
                        <span class="fa fa-star checked"></span> 
                        <span class="fa fa-star checked"></span>
                  </td>
                </tr>
                <tr>
                  <td style="line-height: 5px" ></td>
                  <td style="line-height: 5px">
                    <span style="color:gray;vertical-align: bottom;padding-right: 2px;">(20 reviews)</span>
                  </td>
                <tr>
                  <td style="line-height: 5px">Location:</td>
                  <td style="line-height: 5px">{{ $user->city }}{{", ". $user->province }}</td>
                </tr>
              </table>
        </div>
        <div class="row mb-4" style="width:95%">
          <h6 class='fst-italic fw-lighter'>"{{$user->about}}"</h6>
        </div>
        <div>
          <table class="table table-borderless" style="vertical-align: bottom;text-align:bo">
            <tr>
              <td><h6 style="color:#491036;padding-left:5px">
                <i class="fa-solid fa-dog" style="color:#811D60;font-size:22px;padding-right:20px"></i></td>
              <td style="text-align: start"><strong>{{$dogsposted->count()}}</strong> Dogs Posted</h6></td>
            </tr>
            <tr>
              <td><h6 style="color:#491036;"">
                <i class="fa-solid fa-people-roof" style="color:#811D60;font-size:24px;padding-right:20px"></i></td>
              <td style="text-align: start"><strong>{{$dogsrehomed->count()}}</strong> Dogs Re-Homed</h6></td>
            </tr>
          </table>
        </div>
      </div>

      <div class="col co-md-9 col-sm-12">

        <div class="container-fluid" style="width:90%;margin-top:0px;padding-top:0px">
          <div class="d-flex">
            <ul class="nav nav-tabs flex-grow-1 flex-nowrap">
              <li class="nav-item">
                <a class="nav-link active" href="#posted" data-toggle="tab">Dogs Posted</a>
              </li>
              <li class="nav-item" >
                <a class="nav-link" href="#rehomed" data-toggle="tab">Dogs Re-Homed</a>
              </li>
            </ul>
          </div>
        </div>
        

        <div class="container-fluid d-flex justify-content-left" style="width:90%;">
          <div class="tab-content" style="width:100%;padding:10px; border-width:3px; border:#e1e1e1 solid 1px">

            <div class="tab-pane active" id="posted">
              <div class="row" style="margin: 15px 20px 0px 15px">
                <h4 style="font-family: Poppins; color:#413F42">Dogs posted for adoption</strong></h4>
                <div class="row mt-3">
                  @foreach($dogsposted as $dog)
                    <div class="col col-lg-3 col-md-4 mt-3" style="margin-bottom:25px">
                      <div class="containerimg" style="width:100%">
                        <img src="{{asset('Image/'. $dog->pic)}}" class="image img-responsive" width="100%">
                        <div class="middle">
                          <div><a class="text" href='/pages/{{$dog->id}}' style="text-decoration: none">View More</a></div>
                        </div>
                      </div>    
                      <p style="font-weight: 700; margin-bottom: 0px; margin-top:0px; font-family: 'Poppins'; color:#413F42;"> {{($dog->gender=="1-Male")? "Male" : "Female" }}, {{$dog->age_month}}mo. old</p>
                      <p style="margin-bottom: 0px; margin-top:0px; font-family: 'Lato'; color:#413F42;; font-weight:500;"><i>{{$dog->breed1_name}} , {{$dog->breed2_name}}</i></p>
                    </div>
                  @endforeach                  
                </div>
              </div>  
              <div class="mt-4 ms-2">
                {{$dogsposted->links()}}
              </div>
            </div>

            <div class="tab-pane active" id="rehomed">
              <div class="row" style="margin: 15px 20px 0px 15px">
                <h4 style="font-family: Poppins; color:#413F42">Dogs successfully rehomed</strong></h4>
                <div class="row mt-3">
                  @foreach($dogsrehomed as $dog)
                    <div class="col col-lg-3 col-md-4 mt-3" style="margin-bottom:25px">
                      <div class="containerimg" style="width:100%">
                        <img src="{{asset('Image/'. $dog->pic)}}" class="image img-responsive" width="100%">
                        <div class="middle">
                          <div><a class="text" href='/adoptions/{{$dog->id}}' style="text-decoration: none">View More</a></div>
                        </div>
                      </div>    
                      <p style="font-weight: 700; margin-bottom: 0px; margin-top:0px; font-family: 'Poppins'; color:#413F42;"> {{($dog->gender=="1-Male")? "Male" : "Female" }}, {{$dog->age_month}}mo. old</p>
                      <p style="margin-bottom: 0px; margin-top:0px; font-family: 'Lato'; color:#413F42;; font-weight:500;"><i>{{$dog->breed1_name}} , {{$dog->breed2_name}}</i></p>
                    </div>
                  @endforeach                  
                </div>
              </div>  
              <div class="mt-4 ms-2">
                {{$dogsposted->links()}}
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

@endsection