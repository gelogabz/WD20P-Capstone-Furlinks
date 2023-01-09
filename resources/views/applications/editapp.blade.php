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

                <div class="col-lg-5 col-sm-6" style="padding-left:20px;padding-top:15px;margin-bottom: 20px;">                  
                    <table style="width:100%;margin-top:10px">
                      <colgroup>
                        <col span="1" style="width:50%">
                        <col span="1" style="width:50%">
                      </colgroup>
                      <tr style="border-bottom:0.3pt solid #e1e1e1;">
                        <th colspan="4" style="padding-left:0px;font-size:16px"><i>Applicant Profile</i></th>    
                      </tr>   
                      <tr>
                        <th>Name</th>
                        <td>{{$applications->firstname}}{{' '.$applications->lastname}}</td>
                      </tr>

            </div>
        </form>
    </div>
</div>



@endsection