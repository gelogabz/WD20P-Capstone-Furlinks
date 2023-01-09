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
        {{-- <form action="{{route('applications.update', $applications->id)}}" method="POST" enctype="multipart/form-data"> --}}
          {!! csrf_field() !!}
            @method('PATCH')
        
            <div class="row" style="width:100%">
                <div class="col-md-3" style="margin-top:20px">
                <img src="{{asset('image/'.$dogs->pic)}}" alt="dog" class="image" style="width:80%; display:block;border-radius:20px;margin:auto">
                </div>

                <div class="col-lg-4 col-sm-6" style="padding-left:20px;padding-top:15px;margin-bottom: 20px;">                  
                    <table style="width:100%;margin-top:10px">
                      <colgroup>
                        <col span="1" style="width:40%">
                        <col span="1" style="width:60%">
                      </colgroup>
                      <tr style="border-bottom:0.3pt solid #e1e1e1;">
                        <th colspan="4" style="padding-left:0px;font-size:16px"><i>Applicant Profile</i></th>    
                      </tr>   
                      <tr>
                        <th colspan="2"> <img src="{{asset('image/'.$applications->profile_pic)}}" alt="profilepic" class="image" style="width:120px; display:block;border-radius:50%;"></th>
                        <td>
                      </tr>

                      <tr>
                        <th>Name</th>
                        <td>{{$applications->firstname}}{{' '.$applications->lastname}}</td>
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
                        <td>{{$applications->hometype}}</td>
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
            </div>
        </form>
    </div>
</div>



@endsection