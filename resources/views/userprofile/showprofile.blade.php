@extends('components.navbar')

@section('content')
<div class="container p-5">
    <div class="container-fluid d-flex justify-content-center" style="padding-left: 5%; padding-right: 5%; padding-top:0px;margin-bottom: 20px">
        <div class="row" style="width:100%;margin-top:20px">
          <h3>Your Profile</h3><br>
    
    <section class='container card bg-light p-4'>

    
        <div class="row justify-content-center">
            <div class=" card col-12 col-lg-4 text-center border mx-3 p-3 shadow">
                
                    <div class='bg-dark mx-auto' style='border-radius:50%; width:200px; height:200px;'>
                        Profile Picture
                    </div>
                
                <p>Full Name</p>
                <p class='lead fst-italic fw-lighter'>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint laudantium sequi voluptatibus dolores voluptate fugit natus facere? </p>
                <style>
                    .tab2,
                    .tab3,
                    .tab1{
                    background-color:#8eb3d9 !important;
                    margin:7px 7px 7px 7px;
                    border-radius: 10px;  
                }
                </style>
                <div class="nav d-block justify-content-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link tab1 active" id="v-pills-myprofile-tab" data-bs-toggle="pill" data-bs-target="#myProfile" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">My Profile</a>
                    <a class="nav-link tab2" id="v-pills-personalinfo-tab" data-bs-toggle="pill" data-bs-target="#personalinfo" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Personal Info</a>
                    <a class="nav-link tab3" id="v-pills-doghistory-tab" data-bs-toggle="pill" data-bs-target="#doghistory" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Dog History</a>
                </div>

                <div class="mt-">
                    <a>Edit Profile</a>
                </div>
            </div>

                <br>

            <div class="  card col-12 col-lg-7 border mx-3 p-3 shadow">
                <div class="tab-content p-3" id="v-pills-tabContent">
            
                    {{-- My Profile --}}
                    <div class="tab-pane fade show active " id="myProfile" role="tabpanel" aria-labelledby="v-pills-myprofile-tab" tabindex="0">
                        <div class='row'>
                            <div class='col-12 col-md-6'>
                                <label for="firstname" class="col-sm-4 col-form-label fw-bold" style="font-family: 'Lato', sans-serif;">First Name</label>
                                <input type="text" name="firstname" class="form-control form-control-sm" disabled>
                            
                            </div>

                            <div class='col-12 col-md-6 '>
                                <label for="firstname" class="col-sm-4 col-form-label fw-bold" style="font-family: 'Lato', sans-serif;">Last Name</label>
                                <input type="text" name="firstname" class="form-control form-control-sm" disabled>
                               
                            </div>
                        </div>
                        <div class='row mt-2'>
                            <div class='col-12 '>
                                <label class='fw-bold' style="font-family: 'Lato', sans-serif;">About</label>
                                <textarea type="text" name="about" class="form-control form-control-sm" rows='15' cols='15' disabled></textarea>
                            </div>
                        </div>
                    </div>
                     {{-- Personal Info --}}
                     <div class="tab-pane fade show  " id="personalinfo" role="tabpanel" aria-labelledby="v-pills-myprofile-tab" tabindex="0">
                        <div class='row'>
                            <div class='col-12 col-md-6 mt-4'>
                                <label class='col-sm-4 col-form-label'>Address: 1</label>
                                <input type="text" name="address1" class="form-control" placeholder="Address" aria-label="Address">
                            </div>
                            
                            <div class='col-12 col-md-6 mt-4'>
                                <label class='col-sm-4 col-form-label'>Address: 2</label>
                                <input type="text" name="address2" class="form-control" placeholder="Address" aria-label="Address">
                            </div>
                        </div>
                    </div>
                     {{-- Dog History --}}
                     <div class="tab-pane fade show  " id="doghistory" role="tabpanel" aria-labelledby="v-pills-myprofile-tab" tabindex="0">    
                        3
                    </div>

                </div>
            </div>
        </section>
    </div>
</div>

            {{-- <div class="row">
                <div class='col-12 col-md-3 bg-dark d-flex justify-content-center'>
                    
                </div>
                
                <div class='col-12 col-md-9 bg-success'>
                    <h1>My Profile</h1>

                    <div class='row'>
                        <div class='col-12 col-md-6'>
                            <label for="firstname" class="col-sm-4 col-form-label fw-bold" style="font-family: 'Lato', sans-serif;">First Name :</label>
                          <div class="col-lg-8">
                            <input type="text" name="firstname" class="form-control form-control-sm">
                          </div>
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
                                Home :
                            </div>
                            
                            <div class='col-12 col-md-4'>
                                Type :
                            </div>

                            <div class='col-12 col-lg-4'>
                                Are pets allowed in your home ? :
                            </div>

                        </div>

                        <div class="row">
                            <div class='col-12 col-md-4'>
                                Source of Funds : 
                            </div>
                            
                        </div>

                        <br><br>
                            <h1>Dog History</h1>


                    </div>
                </div>
            </div> --}}
        
    
</div>
{{-- <style>
@import url(https://fonts.googleapis.com/css?family=Roboto);
body{
background:#e9ead6;	
margin: 0 0 0 0;
	}
.profile{
	width:25em;
	height:30em;
	background:#FFF;
	position:absolute;
	left:0;
	right:0;
	top:6em;
	bottom:0;
	margin:auto;
	border-radius:0.51em;
	box-shadow:0px 5px 10px rgba(0,0,0,0.5);
	}
.content{
	width:25em;
	height:30em;
	}
.profilePic{
	width:12em;
	height:12em;
	margin:auto;
	margin-top:-6em;
	background:url(http://celebrityinside.com/wp-content/uploads/2014/09/George-Clooney.jpeg);
	background-size:cover;
	border-radius:50%;
	box-shadow:0px 0px 0px 4pt #FFF;
	}	
.profile h3{
color:#03315c;	
font-family: 'Roboto', sans-serif;
text-align:center;
font-size:1.6em;
margin-bottom:0;
}
.profile h4{
color:#56013d;	
font-family: 'Roboto', sans-serif;
text-align:center;
font-size:1em;
margin-top:0.5em;
}		
.rates{
position:absolute;
width:25em;
height:8em;
bottom:-0.2em;
background:#03315c;	
border-bottom-left-radius: 0.51em;
border-bottom-right-radius: 0.51em;
overflow:hidden;
	}
.profile p{
	width:15em;
	height:5em;
	font-size:1.2em;
	margin:auto;
	font-family: 'Roboto', sans-serif;
	color:rgba(0,0,0,0.6);
	margin-top:2.5em;
	}
.box{
width:8.33333333333em;
height:8.33333333333em;
float:left;	
overflow:hidden;
position:relative;
	}	
svg{
position:absolute;	
	}
.iconCon{
position:relative;
width:5em;
height:5em;
margin:auto;
z-index:999;	
	}
.box h4{
color:#FFF;
font-size:2em;
margin-top:0;
z-index:999999;	
	}	
.iconCon .icon{
	width:3em;
height:3em;
left:0;
right:0;
top:0;
bottom:0;
margin:auto;
fill:#FFF;
z-index:999;
	}
.iconCon .ball{
	position:Absolute;
	width:1em;
    height:1em;
    left:0;
    right:0;
    top:0;
    bottom:0;
    margin:auto;
    background:Red;
    border-radius:50%;
    transition:ease 0.5s;
	}	
.h4h{
position:absolute;	
left:0;
right:0;
margin:auto;
	}		
.box:hover{
box-shadow:0px 0px 0px 1px rgba(0,0,0,0.3);	
	}	
.boxhearth:hover .icon{
	fill:red;
	}
.box:hover{
	cursor:pointer;
}
.boxview:hover .icon{
	fill:#3399FF;
	}
.boxbuddy:hover .icon{
	fill:#FFCC99;
	}	
.proPage{
position:absolute;
top:1em;
height:3em;
width:3em;	
	}
.ExitPage{
	left:1em;
	}
.homePage{
right:1em;	
	}		
.proPage .icon{
	height:2em;
width:2em;
left:0;right:0;top:0;bottom:0;margin:auto;
fill:#03315c;
	}	
.proPage .icon:hover{
	fill:#1c69b0;
	cursor:pointer;

	}	
.proPage:hover{
	
	}	





</style>
<svg>
    <defs>
    <symbol id="icon-eye" viewBox="0 0 1024 1024">
    <title>eye</title>
    <path class="path1" d="M512 192c-223.318 0-416.882 130.042-512 320 95.118 189.958 288.682 320 512 320 223.312 0 416.876-130.042 512-320-95.116-189.958-288.688-320-512-320zM764.45 361.704c60.162 38.374 111.142 89.774 149.434 150.296-38.292 60.522-89.274 111.922-149.436 150.296-75.594 48.218-162.89 73.704-252.448 73.704-89.56 0-176.858-25.486-252.452-73.704-60.158-38.372-111.138-89.772-149.432-150.296 38.292-60.524 89.274-111.924 149.434-150.296 3.918-2.5 7.876-4.922 11.86-7.3-9.96 27.328-15.41 56.822-15.41 87.596 0 141.382 114.616 256 256 256 141.382 0 256-114.618 256-256 0-30.774-5.452-60.268-15.408-87.598 3.978 2.378 7.938 4.802 11.858 7.302v0zM512 416c0 53.020-42.98 96-96 96s-96-42.98-96-96 42.98-96 96-96 96 42.982 96 96z"></path>
    </symbol>
    <symbol id="icon-menu" viewBox="0 0 1024 1024">
    <title>menu</title>
    <path class="path1" d="M64 192h896v192h-896zM64 448h896v192h-896zM64 704h896v192h-896z"></path>
    </symbol>
    <symbol id="icon-user" viewBox="0 0 1024 1024">
    <title>user</title>
    <path class="path1" d="M576 706.612v-52.78c70.498-39.728 128-138.772 128-237.832 0-159.058 0-288-192-288s-192 128.942-192 288c0 99.060 57.502 198.104 128 237.832v52.78c-217.102 17.748-384 124.42-384 253.388h896c0-128.968-166.898-235.64-384-253.388z"></path>
    </symbol>
    <symbol id="icon-heart" viewBox="0 0 768 1024">
    <title>heart</title>
    <path class="path1" d="M384 864c399-314 384-425 384-512s-72-192-192-192-192 128-192 128-72-128-192-128-192 105-192 192-15 198 384 512z"></path>
    </symbol>
    <symbol id="icon-exit" viewBox="0 0 1024 1024">
    <title>exit</title>
    <path class="path1" d="M768 640v-128h-320v-128h320v-128l192 192zM704 576v256h-320v192l-384-192v-832h704v320h-64v-256h-512l256 128v576h256v-192z"></path>
    </symbol>
    </defs>
    </svg>
    <meta charset="utf-8">
    <title>Namnlöst dokument</title>
    </head>
    
    <body>
    <div class="profile">
    <div class="content">
    <div class="back"></div>
    <div class="proPage ExitPage"><svg class="icon icon-exit"><use xlink:href="#icon-exit"></use></svg></div>
    <div class="proPage homePage"><svg class="icon icon-menu"><use xlink:href="#icon-menu"></use></svg></div>
    <div class="profilePic"></div>
    <h3>George Clooney</h3>
    <h4>Student web designer</h4>
    <p>I am a student from Sweden that designs and
    develops websites for the world
    wide web</p>
    <div class="rates">
    <div class="box boxview">
    <div class="iconCon">
    <svg class="icon icon-eye"><use xlink:href="#icon-eye"></use></svg>
    </div>
    <h4 class="counter">332</h4>
    </div>
    <div class="box boxbuddy">
    <div class="iconCon">
    <svg class="icon icon-user"><use xlink:href="#icon-user"></use></svg>
    </div>
    <h4 class="counter">332</h4>
    </div>
    <div class="box boxhearth">
    <div class="iconCon">
    <svg class="icon icon-heart"><use xlink:href="#icon-heart"></use></svg>
    <div class="ball"></div>
    </div>
    <h4 class="counter h4h">332</h4>
    </div>
    </div>
    </div>
    </div>
    </body> --}}

@endsection