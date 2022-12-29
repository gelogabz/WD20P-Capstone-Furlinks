<!-- LOGIN MODAL -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-dialog-centered" >    
        <div class="modal-content">
            <div class="container d-flex justify-content-center" style="margin-top:10px">
                <div class="form form-control" style="border:none">
                <form class="rounder p-30 p-sm-2 pb-0" id="loginform" target="_blank" action="" method="POST">
                    <img src="{{asset('build/images/fllogo.png') }}" width="35px" style="display: block; margin:auto"/>
                    <h5 style="text-align:center;margin:2%">Welcome to Furlinks</h5>
                    <br>
                        <div class="mb-3">
                        <label for="email" class="col-form-label col-form-label-sm">Email</label>
                        <input type="text" name="email" class="form-control" placeholder="Enter email" required>
                        </div>
                        <div class="mb-3">
                        <label for="psw" class="col-form-label col-form-label-sm">Password</label>
                        <input type="password" class="form-control" placeholder="Enter Password" name="psw" required>
                        </div>
                        <div class="form-check form-check-inline" style="padding-bottom:30px;padding-left:10px">
                        <input class="form-check-input" type="checkbox" name="allowed" id="allowed" value="Yes">
                        <label class="form-check-label" for="remember" style="white-space:nowrap;font-size: 14px;padding-left:5pxx;">Remember me</label>
                        </div>

                        <div class="clearfix" style="margin-bottom: 0;padding-bottom: 0;font-size:14px">
                        <button class="btn btn-primary4" type="submit" class="signupbtn" style="width:100%;">Continue</button>
                        <p style="text-align:center;padding-top:5px">or</p>
                        <a class="btn btn-primary4 btn-md btn-block" style="background-color: #3b5998;text-align: left;padding-left: 60px;color: #fff" href="#!" role="button">
                        <i class="fab fa-facebook-f me-2"></i><p style="font-size:14px;padding-left:10px;;">Continue with Facebook</a>
                        <a class="btn btn-primary4 btn-md btn-block" style="background-color: #dd4b39;text-align: left;padding-left: 60px;color: #fff;" href="#!" role="button">
                        <i class="fab fa-google me-2"></i><p style="font-size:14px;padding-left:10px;"> Continue with Google</a>
                        <br>
                        <p style="font-size:small">By continuing, you agree to our <a href="#" style="color:dodgerblue">Terms of Service</a> and acknowledge that you have read our<a href="#" style="color:dodgerblue"> Privacy Policy</a>
                        <br><br>
                        Not yet in Furlinks? <button type="button" class="btn btn-link" id="myBtn2" style="text-emphasis-style:bold;font-size:small">Sign Up</button>      
                        </div>
                </form>
                </div>
            </div>  
        </div>
    </div>
</div>

<!-- SIGNUP MODAL -->
<div class="modal fade" id="signupmodal" role="dialog">
    <div class="modal-dialog modal-dialog-centered" >
        <div class="modal-content">
            <div class="container d-flex justify-content-center" style="margin-top:10px">
                <div class="form form-control" style="border:none">
                    <form class="rounder p-30 p-sm-2 pb-0" id="loginform" target="_blank" action="" method="POST">
                    <img src="{{asset('build/images/fllogo.png') }}" width="35px" style="display: block; margin:auto"/>
                    <h5 style="text-align:center;margin:2%">Welcome to Furlinks</h5>
                    <br>
                        <div class="mb-3">
                            <label for="email" class="col-form-label col-form-label-sm">Email</label>
                            <input type="text" name="email" class="form-control" placeholder="Enter email" required>
                        </div>
                        <div class="mb-3">
                            <label for="psw" class="col-form-label col-form-label-sm">Password</label>
                            <input type="password" class="form-control" placeholder="Enter Password" name="psw" required>
                        </div>
                        <div class="mb-3">
                        <label for="psw-repeat" class="col-form-label col-form-label-sm">Repeat Password</b></label>
                        <input type="password" class="form-control" placeholder="Repeat Password" name="psw-repeat" required>
                        </div>
                            <div class="clearfix" style="margin-bottom: 0;padding-bottom: 0;">
                            <button class="btn btn-primary4" type="submit" class="signupbtn" style="width:100%">Continue</button>
                            <p style="text-align:center;padding-top:5px">or</p>
                            <a class="btn btn-primary4 btn-md btn-block" style="background-color: #3b5998;text-align: left;padding-left: 60px;color:#fff" href="#!" role="button">
                            <i class="fab fa-facebook-f me-2"></i><p style="font-size:14px;padding-left:10px;;">Continue with Facebook</a>
                            <a class="btn btn-primary4 btn-md btn-block" style="background-color: #dd4b39;text-align: left;padding-left: 60px;color:#fff;" href="#!" role="button">
                            <i class="fab fa-google me-2"></i><p style="font-size:14px;padding-left:10px;"> Continue with Google</a>
                            <br>
                            <p style="font-size:small">By continuing, you agree to our <a href="#" style="color:dodgerblue">Terms of Service</a> and acknowledge that you have read our<a href="#" style="color:dodgerblue"> Privacy Policy</a>
                            <br><br>
                            Already a member?  <button type="button" class="btn btn-link" id="myBtn1" style="text-emphasis-style:bold;font-size:small">Log In</button>                 
                        </div>
                    </form>
                </div>
            </div>  
        </div>
    </div>
</div>

