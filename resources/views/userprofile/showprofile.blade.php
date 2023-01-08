@extends('components.navbar')

@section('content')
<div class="container p-5">
    <h1>Your Profile</h1>
    <div class="row">
        <div class='col-12 col-md-3 bg-dark d-flex justify-content-center'>
            <p class='text-light'>Profile Picture</p>
        </div>

        <div class='col-12 col-md-9 bg-success'>
            <h1>My Profile</h1>

            <div class='row'>
                <div class='col-12 col-md-6'>
                    First name :
                </div>
                <div class='col-12 col-md-6'>
                    Lastname :
                </div>
            </div>

            <div class='row'>
                <div class='col-12'>
                    About :
                </div>
            </div>
            <br>
            <h1>Personal Information</h1>

            <div class='row'>
                <div class='col-12 col-md-6'>
                    Address 1 :
                </div>
                <div class='col-12 col-md-6'>
                    Address 2 :
                </div>

                <div class="row">
                    <div class='col-12 col-md-4'>
                        City :
                    </div>
                    <div class='col-12 col-md-4'>
                        Province :
                    </div>
                    <div class='col-12 col-md-4'>
                        Mobile No :
                    </div>
                </div>
                <div class="row">
                    <div class='col-12 col-md-4'>
                        Home type :
                    </div>
                    
                    <div class='col-12 col-md-4'>
                        Mobile No :
                    </div>
                </div>


            </div>

        </div>
    </div>

</div>

@endsection