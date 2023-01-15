@extends ('components.navbar')
@section('content')


<hr style="margin:0px 0px 5px 0px;padding:0px 0px 0px 0px;border-color:#ececec">    
<div class="container-fluid d-flex justify-content-center" style="padding-left: 5%; padding-right: 5%;">
    <div class="row" style="width:100%;margin-top:5px;margin-bottom:10px">
        <a class="btn btn-outline-primary2" href="/applications/{{$applications->dog_id}}" type="button" style="vertical-align: bottom;text-align: left;padding-left:10px;width:180px;margin-bottom:20px">
        <i class="fa fa-arrow-left" aria-hidden="true" style="font-size:medium;padding-right:10px;padding-top:4px"></i>Back to Applications</a>

        @if ($message = Session::get('success'))
        <div class="alert alert-success" style="vertical-align:middle;height:50px">
            <p>{{ $message }}</p>
        </div>
        @endif

        <div class="row" style="width:100%">          
            <div class="col-md-9 col-sm-12" style="padding-left:20px;padding-right:40px;">
                <div class="row">
                    <div class="col-12 col-md-9">
                        <h3 class="" style="font-family: Poppins; color:#413F42">Applicant Profile
                    </div>                              
                    <div class="col-12 col-md-3">
                        <span class="ml-auto text-nowrap" style="float:center;padding: bottom 5px;width:220px">   
                            <form action="{{route('applications.update', $applications->id)}}" method="POST" enctype="multipart/form-data">
                                {!! csrf_field() !!}
                            @method('PATCH')
                            <div class="input-group">
                                <select class="custom-select form-control" id="appstatus" name="appstatus" >
                                    <option value="1" {{($applications->appstatus=="1")? "selected" : "" }}>Submitted</option>
                                    <option value="2" {{($applications->appstatus=="2")? "selected" : "" }}>Screening</option>
                                    <option value="3" {{($applications->appstatus=="3")? "selected" : "" }}>For Interview</option>
                                    <option value="4" {{($applications->appstatus=="4")? "selected" : "" }}>Waitlisted</option>
                                    <option value="5" {{($applications->appstatus=="5")? "selected" : "" }}>Selected</option>
                                </select>
                                <div class="input-group-append">
                                <input class="btn btn-secondary" type="submit" value="Update"></button>
                                <input type="hidden" value="{{$applications->dog_id}}" class="hidden" name="dogid"/>
                                </div>
                            </div>
                            </form> 
                        </span>
                    </div>
                    </h3>
                </div>
                <div class="row" style="margin-top:20px;">
                    <div class="col col-md-2 col-sm-3">
                        <img src="{{asset('Image/'.$applications->profile_pic)}}" alt="profilepic" class="propic3" style=" display:block;border-radius:50%;margin-top:20px;">                
                    </div>
                    <div class="col col-md-5 col-sm-8" style="padding-left:10px;padding-right:10px;margin-bottom: 20px;">                  
                        <table class="table table-borderless" style="margin-top:10px;vertical-align:middle">
                            <colgroup>
                                <col span="1" style="width:55%">
                                <col span="1" style="width:45%">
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
                                <th>Email</th>
                                <td>{{$applications->email}}</td>
                            </tr>
                            <tr>
                                <th>Contact No.</th>
                                <td>{{$applications->mobile_no}}</td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td>{{$applications->address1}}</td>
                            </tr>
                            <tr>
                                <th></th>
                                <td>{{$applications->address2}}</td>
                            </tr>
                            <tr>
                                <th>City</th>
                                <td>{{$applications->city}}</td>
                            </tr>
                            <tr>
                                <th>Province/Region</th>
                                <td>{{$applications->province}}</td>
                            </tr>                            
                            <tr>
                                <th>Residence Type</th>
                                <td>{{$applications->hometype}}</td>
                            </tr>
                            <tr>
                                <th>Pets allowed?</th>
                                <td>{{($applications->allowed==0)? "No" : "Yes" }}</td>
                            </tr>
                            <tr>
                                <th>Source of Funds</th>
                                <td>{{$applications->funds}}</td>
                            </tr>
                            {{-- <tr>
                                <th>Profile Pic</th>
                                <td><img src="{{asset('Image/'.$applications->profile_pic)}}" alt="profilepic" class="image" style="width:120px; display:block;border-radius:50%;"/>                
                                </td>
                            </tr> --}}
                        </table>
                    </div>                
                    
                    <div class="col col-md-5 col-sm-12" style="padding-left:10px;padding-right:10px;margin-bottom: 20px;">                  
                        <table class="table table-borderless" style="width:100%;margin-top:10px">
                            <colgroup>
                                <col span="1" style="width:75%">
                                <col span="1" style="width:25%">
                            </colgroup>
                            <tr>
                            <tr style="border-bottom:0.3pt solid #e1e1e1;">
                                <th colspan="4" style="padding-left:0px;font-size:16px"><i>Dog History</i></th>    
                            </tr>   
                            <tr>
                                <th>Number of dogs?</th>
                                <td>{{$applications->dogs}} dogs </td>
                            </tr>
                            <tr>
                                <th>Number of cats?</th>
                                <td>{{$applications->cats}} cats </td>
                            </tr>
                            <tr>
                                <th>Any member with allergies?</th>
                                <td>{{($applications->allergy==0)? "No" : "Yes" }}</td>
                            </tr>
                            <tr>
                                <th>Are all other pets vaccinated?</th>
                                <td>{{($applications->allvaxed==0)? "No" : "Yes" }}</td>
                            </tr>
                            <tr>
                                <th>Are other pets neutered/spayed?</th>
                                <td>{{($applications->allergy==0)? "No" : "Yes" }}</td>
                            </tr>
                            <tr>
                                <th>Has lost a pet?</th>
                                <td>{{($applications->lostpet==0)? "No" : "Yes" }}</td>
                            </tr>
                            <tr>
                                <th>Has a pet euthanized?</th>
                                <td>{{($applications->euthanized==0)? "No" : "Yes" }}</td>
                            </tr>
                            <tr>
                                <th>Primary responsibility of pet</th>
                                <td>{{$applications->priresp}}</td>
                            </tr>
                            <tr>
                                <th>Financial responsibility of pet</th>
                                <td>{{$applications->finresp}}</td>
                            </tr>
                            <tr>
                                <th>Will pet be left at home?</th>
                                <td>{{($applications->lefthome==0)? "No" : "Yes" }}</td>
                            </tr>
                            <tr>
                                <th>Number of hours pet is alone</th>
                                <td>{{$applications->hours}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-12" style="padding:0px 0px ">
                <div class="border" style="border-radius:10px;margin:0px 0px;padding:10px 10px">
                    <div class="card">
                        <div class="card-title" style="text-align:center"><h5>Dog for Adoption</h5></div>
                        <img src="{{asset('Image/'.$dogs->pic)}}" alt="dog" class="card-img-top" style="width:90%;display:block;margin:auto">
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
        
    </div>
</div>



@endsection