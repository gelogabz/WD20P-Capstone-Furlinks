@extends ('components.navbar')
@section('content')


<div class="container-fluid d-flex justify-content-center" style="padding-left: 5%; padding-right: 5%; padding-top:0px;margin-bottom: 20px">
    <div class="row" style="width:100%;margin-top:20px">
        <a class="btn btn-outline-primary2" href="{{ url()->previous() }}" type="button" style="vertical-align: bottom;text-align: left;padding-left:10px;width:180px;margin-bottom:20px">
        <i class="fa fa-arrow-left" aria-hidden="true" style="font-size:medium;padding-right:10px;padding-top:4px"></i>Back to Applications</a>

        @if ($message = Session::get('success'))
        <div class="alert alert-success" style="height:50px">
            <p>{{ $message }}</p>
        </div>
        @endif

        <h3>Applicant Profile</h3><br>
        <div class="row mt-3">
            <img src="{{asset('image/'.$applications->profile_pic)}}" alt="profilepic" class="image" style="width:120px; display:block;border-radius:50%;"/>                
        </div>
        
        <form action="{{route('applications.update', $applications->id)}}" method="POST" enctype="multipart/form-data">
          {!! csrf_field() !!}
            @method('PATCH')
        
            <div class="row" style="width:100%">
                <div class="col-lg-4 col-sm-6" style="padding-left:20px;padding-top:15px;margin-bottom: 20px;">                  
                     <table class="table table-borderless" style="width:100%;margin-top:10px">
                      <colgroup>
                        <col span="1" style="width:40%">
                        <col span="1" style="width:60%">
                      </colgroup>
                      <tr>
                      <tr style="border-bottom:0.3pt solid #e1e1e1;">
                        <th colspan="4" style="padding-left:0px;font-size:16px"><i>Basic Information</i></th>    
                      </tr>   
                      <tr>
                        <th>Username</th>
                        <td>{{$applications->username}}</td>
                      </tr>
                      <tr>
                        <th>Full Name</th>
                        <td>{{$applications->firstname}}{{' '.$applications->lastname}}</td>
                      </tr>
                      <tr>
                        <th>Contact No.</th>
                        <td>{{$applications->mobile_no}}</td>
                      </tr>
                      <tr>
                        <th>Location</th>
                        <td>{{$applications->city}}{{', '.$applications->province}}</td>
                      </tr>
                      <tr>
                        <th>Residence Type</th>
                        <td>{{$applications->hometype}}</td>
                      </tr>
                      <tr>
                        <th>Source of Funds</th>
                        <td>{{$applications->funds}}</td>
                      </tr>
                    </table>
                </div>                
                
                <div class="col-lg-4 col-sm-6" style="padding-left:20px;padding-top:15px;margin-bottom: 20px;">                  
                      <table class="table table-borderless" style="width:100%;margin-top:10px">
                      <colgroup>
                        <col span="1" style="width:40%">
                        <col span="1" style="width:60%">
                      </colgroup>
                      <tr>
                      <tr style="border-bottom:0.3pt solid #e1e1e1;">
                        <th colspan="4" style="padding-left:0px;font-size:16px"><i>Dog History</i></th>    
                      </tr>   
                      <tr>
                        <th>Source of Funds</th>
                        <td>{{$applications->allowed}}</td>
                      </tr>
                      'userprofiles.allowed as allowed',
                      'userprofiles.withpets as withpets',
                      'userprofiles.allergy as allergy',
                      'userprofiles.allvaxed as allvaxed',
                      'userprofiles.allneut as allneut',
                      'userprofiles.euthanized as euthanized',
                      'userprofiles.lostpet as lostpet',
                      'userprofiles.cats as cats',
                      'userprofiles.dogs as dogs',
                      'userprofiles.priresp as priresp',
                      'userprofiles.finresp as finresp',
                      'userprofiles.lefthome as lefthome',
                      'userprofiles.hours as hours',



                    </table>
                </div>

                <div class="col-lg-3 col-sm-6" style="padding-left:20px;padding-top:15px;margin-bottom: 20px;">
                    <div class="border" style="border-radius:20px;padding:10px ">
                        <div class="card"">
                            <div class="card-title" style="text-align:center"><h5>Dog Posted</h5></div>
                            <img src="{{asset('image/'.$dogs->pic)}}" alt="dog" class="card-img-top" style="width:90%;display:block;border-radius:10px;margin:auto">
                            <div class="card-body">
                                <h5 class="card-title" style="font-style:italic">{{$dogs->name}}</h5>
                                <h6 class="card-subtitle mb-2">{{($dogs->gender=="1-Male")? "Male" : "Female" }}, {{$dogs->age_yr}}y and {{$dogs->age_month}}m</h6>
                                <h6 class="card-subtitle mb-2 text-muted">{{$dogs->breed1_name}} , {{$dogs->breed2_name}}</h6>
                                <h6 class="card-subtitle mb-2 text-muted" style="font-size:smaller"> Date Posted: {{date('M d, Y', strtotime($dogs->created_at))}}</h6>
                            </div>
                        </div>
                    </div>
                </div>  

            </div>
        </form>
    </div>
</div>



@endsection