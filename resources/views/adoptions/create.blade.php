@extends ('components.navbar')
@section('content')
<style>
.file-upload-input {
    position: absolute;
    margin: 0;
    padding: 0;
    width: 100%;
    height: 100%;
    outline: none;
    opacity: 0;
    cursor: pointer;
    }
.image-upload-wrap {
    margin-top: 0px;
    border: 4px dashed #5082B7 !important ;
    position: relative;
    text-align: center;
    display:block;
    margin: auto;
    }
.image-dropping,
.image-upload-wrap:hover {
    background-color:#cfe5fd !important ;
    }
.image-title-wrap {
    padding: 15px 15px 15px 15px;
    text-align: center;
    }
.drag-text {
    text-align: center;
    }
.drag-text h3 {
    font-weight: 100;
    color: #5082B7 !important ;
    padding: 60px 0;
    }
.file-upload-image {
    max-height: 300px;
    max-width: 300px;
    margin: 0px;
    text-align: center;
    display:block;
    margin: auto;
    border: 4px #5082B7 !important ;
    }
.remove-image {
    height: 40px;
    width: 150px;
    border-radius: 12px;
    background-color: #799FC8 ;
    border-color:#5082B7 !important ;
    color:#F9F9F9;
    text-decoration: none;
    font-family: 'Lato', sans-serif;
    margin:5px;
    vertical-align: middle;
    }
.remove-btn,
.file-upload-none{
    display: none;
    }
.remove-image:hover {
    background-color:#6388af !important ;
    transition: all .5s ease;
    -webkit-transition: all .5s ease;
    -moz-transition: all .5s ease;
    -o-transition: all .5s ease;
    -ms-transition: all .5s ease;
    }
.remove-image:active {
    border: 0;
    transition: all .2s ease;
    }
.btn-primary2,
.btn-primary2:active,
.btn-primary2:visited {
    width:150px;
    border-radius: 10px;
    background-color: #29468a;
    color:#FFF;
    border-color: #29468a;
    height: 30px;
    padding-top:2px !important;
}
.btn-primary2:hover {
    width:150px;
    background-color: #0d1e47;
    border-color: #29468a; 
    height: 30px;
    padding-top:2px !important;
    transition: all 1s ease;
    -webkit-transition: all 1s ease;
    -moz-transition: all 1s ease;
    -o-transition: all 1s ease;
    -ms-transition: all 1s ease;
}
</style>

<hr style="margin:0px 0px 5px 0px;padding:0px 0px 0px 0px;border-color:#ececec">

<div class="container-fluid d-flex justify-content-center" style="padding-left: 5%; padding-right: 5%; padding-top:0px;margin-bottom:30px">
    <div class="row" style="width:100%;margin-top:5px;margin-bottom:20px">
        <a class="btn btn-outline-primary2" href="{{ url()->previous() }}" type="button" style="vertical-align: bottom;text-align: left;padding-left:10px;width:180px;margin-bottom:20px">
        <i class="fa fa-arrow-left" aria-hidden="true" style="font-size:medium;padding-right:10px;padding-top:4px"></i>Back to Dog Profile</a>

        <div class="row" >          
            <h3 class="" style="font-family: Poppins; color:#413F42">Finalize Adoption</h3><br>
            <div class="col-md-4">
                <div class="row mt-3 mb-3" style="width:100%;margin:20px 20px">
                    <div class="border" style="border-radius:15px;margin-right:0px;padding:20px 20px">
                    <div class="card" style="flex-direction:row; height:150px; align-items:center">
                        <img src="{{asset('image/'.$dogs->pic)}}" class="card-img-top" alt="picture" style="width:150px">
                        <div class="card-body" style="padding-left:40px">
                            <h5 class="card-title fw-bold" style="font-style:italic; font-family: Quicksand; color:#;">{{$dogs->name}}</h5>
                            <h6 class="card-subtitle mb-2" style="font-family: Poppins;">{{($dogs->gender=="1-Male")? "Male" : "Female" }}, {{$dogs->age_yr}}y and {{$dogs->age_month}}m</h6>
                            <h6 class="card-subtitle mb-2 text-muted" style="font-family: Lato; font-weight:10px">{{$dogs->breed1_name}} , {{$dogs->breed2_name}}</h6>
                        </div>
                    </div>
                    </div> 
                </div>
                <div class="row mt-3 mb-3" style="width:100%;margin:20px 20px">
                    <div class="border" style="border-radius:15px;margin-right:0px;padding:20px 20px">
                    <div class="card" style="flex-direction:row; height:150px;  align-items:center">
                        <img src="{{asset('image/'.$applications->profile_pic)}}" alt="profilepic" class="card-img-top" style="width:150px; display:block;border-radius:50%;margin:auto"/>
                        <div class="card-body" style="padding-left:40px">
                            <h5 class="card-title fw-bold" style="font-style:italic; font-family: Quicksand; color:#;">{{$applications->username}}</h5>
                            <h6 class="card-subtitle mb-2" style="font-family: Poppins;">{{$applications->firstname}}{{' '.$applications->lastname}}</h6>
                            <h6 class="card-subtitle mb-2 text-muted" style="font-family: Lato; font-weight:10px">{{$applications->city}} , {{$applications->province}}</h6>
                        </div>
                    </div> 
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="row mt-3 mb-3" ">
                    <div class="col-md-6">
                        //image uploading here
                    </div>
                    <div class="col-md-6">
                        //notes
                    </div>
                </div>
            </div>
        </div>
            {{-- <div class="col-md-4 col-sm-12" style="padding:0px 0px ">
                <div class="border" style="border-radius:10px;margin:0px 0px;padding:20px 20px">
                <h5 style="text-align:center">Confirm submission of application</h5>
                <form action="{{ route('adoptions.store') }}" method="POST" enctype="multipart/form-data" target="{{ url()->previous() }}">
                    {!! csrf_field() !!} 
                    
                    <div class="row justify-content-center" >
                    <input type="hidden" value="{{$dogs->id}}" class="hidden" name="dog_id"/>
                    <input type="submit" name="submit" class="btn adopt_btn" value="Submit">
                    </div>
                </form>
                </div>
            </div> --}}
    </div>
</div>

@endsection