@extends ('components.navbar')

@section('content')

<div style="background-color: #F4f4f4;">
    <center>
    <br>
    <h1 class="display-4 text-center mx-5" style="color:#413F42; font-family:Quicksand; font-weight:900;">How it Works</h1>
    <div class="row align-items-center d-flex mx-0">
        <div class="col-sm-6 my-2">
            <img src="{{asset('build/images/how-1.png') }}" class=" ms-5" style="width: 50%;">
        </div>
        <div class="col-md-6 my-2">
            <h4 class="text-start" style="color: #B78550; font-family:Poppins; font-weight:900; font-size:20pt;">1. Users can search for dogs</h4>
            <p class="text-start mx-4" style="font-family: Lato; font-weight:600; color:#413F42;">
               Users can search for dogs available for adoption on the website by using various filters such as breed, age, 
               and location. They can also browse through all the dogs that are currently available.
            </p>
        </div>
    </div>
    <div class="row align-items-center d-flex mx-0">
        <div class="col-md-6 my-2">
            <h4 class="text-end" style="color: #B78550; font-family:Poppins; font-weight:900; font-size:20pt;">2. Create an Account</h4>
            <p class="text-end mx-4" style="font-family: Lato; font-weight:600; color:#413F42;">
              Once they find a dog they're interested in, they can create an account by clicking on the "Sign up" button. 
              This will require them to provide some basic information such as their name, email address, and a password.
            </p>
        </div>
        <div class="col-sm-6 my-2">
            <img src="{{asset('build/images/how-2.png') }}" class=" ms-5" style="width: 50%;">
        </div>
    </div>
    <div class="row align-items-center d-flex mx-0">
        <div class="col-sm-6 my-5">
            <img src={{asset('build/images/how-3.png') }} class=" ms-5" style="width: 50%;">
        </div>
        <div class="col-md-6 my-5">
            <h4 class="text-start" style="color: #B78550; font-family:Poppins; font-weight:900; font-size:20pt;">3. Verify Account</h4>
            <p class="text-start mx-4" style="font-family: Lato; font-weight:600; color:#413F42;">
               To verify their account, users will typically receive an email containing a link that they need to click. 
               Once their account is verified, they can log in and start using the website.
            </p>
        </div>
    </div>
     <div class="row align-items-center d-flex mx-0">
        <div class="col-md-6 my-5">
            <h4 class="text-end" style="color: #B78550; font-family:Poppins; font-weight:900; font-size:20pt;">4. Create a Profile</h4>
            <p class="text-end mx-4" style="font-family: Lato; font-weight:600; color:#413F42;">
               Users can create a profile that includes information about themselves, their lifestyle, and what kind of 
               dog they're looking for. This can help match them with a dog that is a good fit for their home.
        </div>
        <div class="col-sm-6 my-5">
            <img src={{asset('build/images/how-4.png') }} class=" ms-5" style="width: 50%;">
        </div>
    </div>
    <div class="row align-items-center d-flex mx-0">
        <div class="col-sm-6 my-5">
            <img src={{asset('build/images/how-5.png') }} class=" ms-5" style="width: 50%;">
        </div>
        <div class="col-md-6 my-5">
            <h4 class="text-start" style="color: #B78550; font-family:Poppins; font-weight:900; font-size:20pt;">5. Posting Dogss</h4>
            <p class="text-start mx-4" style="font-family: Lato; font-weight:600; color:#413F42;">
               After that, user can then post all the dogs for adoption with all the information and feature of the dog. 
               They can also search for dogs they want to adopt by filter criteria.
            </p>
        </div>
    </div>
    <div class="row align-items-center d-flex mx-0">
        <div class="col-md-6 my-5">
            <h4 class="text-end" style="color: #B78550; font-family:Poppins; font-weight:900; font-size:20pt;">6. Submit the Adoption Application</h4>
            <p class="text-end mx-4" style="font-family: Lato; font-weight:600; color:#413F42;">
                Once a user finds a dog they want to adopt, they can submit an adoption application. This will typically 
                include information such as their address, contact information, and information about their home and lifestyle.
            </p>
        </div>
        <div class="col-sm-6 my-5">
            <img src="{{asset('build/images/how-6.png') }}" class=" ms-5" style="width: 50%;">
        </div>
    </div>
    <div class="row align-items-center d-flex mx-0">
        <div class="col-sm-6 my-5">
            <img src={{asset('build/images/how-7.png') }} class=" ms-5" style="width: 50%;">
        </div>
        <div class="col-md-6 my-5">
            <h4 class="text-start" style="color: #B78550; font-family:Poppins; font-weight:900; font-size:20pt;">7.Reviewing Application</h4>
            <p class="text-start mx-4" style="font-family: Lato; font-weight:600; color:#413F42;">
                The organization or individual responsible for the dog will review the application and make a decision about 
                whether to approve the adoption. If the adoption is approved, the dog will go to the new home, and the new 
                owner will be responsible for providing a loving, safe and healthy environment for the dog. 
            </p>
        </div>
    </div>
    <div class="row align-items-center d-flex mx-0">
        <div class="col-md-6 my-5">
            <h4 class="text-end" style="color: #B78550; font-family:Poppins; font-weight:900; font-size:20pt;">8. Post Adoption</h4>
            <p class="text-end mx-4" style="font-family: Lato; font-weight:600; color:#413F42;">
              Post Adoption, new owner and organization or individual responsible for the dog, stay in touch and provide 
              updates of the dog.
            </p>
        </div>
        <div class="col-sm-6 my-5">
            <img src={{asset('build/images/how-8.png') }} class=" ms-5" style="width: 50%;">
        </div>
    </div>
    <p class="linesafooter mb- mx-5"></p>
    <div class="row align-items-center d-flex mx-0">
        <div class="col-md-12 my-5">
            <p class="text-center mx-4" style="font-family: Quicksand; font-weight:900; color:#413F42; font-size:15pt">
              It's important to note that different organizations have different policies and procedures for dog adoptions, 
              so the specific process may vary from website to website.    
            </p>
        </div>
    </div>
    <p class="linesafooter mb-4 mx-4"></p>

    <h3 class="mb-3" style="font-family: Quicksand; font-size:30pt; font-weight:800;">Furlinks: <p style="font-family: Poppins; font-weight:300; color:#B78550;">Dogs Rehomed<i class="bi bi-house-heart-fill"></i></p></h3>
    <div class="row align-items-center d-flex mx-0">
        <div class="col-lg-4 col-sm-4 col-md-4 px-0 mx-0">
            <img src="{{asset('build/images/rehomed/dog1r.jpg') }}" class="my-3 mx-0" style="width: 50%;">
            <p class="mx-5 mb-5">
                "Furlinks proved to be an invaluable resource for us in our search for the perfect furry companion. Their platform made it easy 
                to find our new best friend and the adoption process was seamless. We are incredibly grateful to Furlinks for bringing us and 
                our new dog together and making her feel like she is truly a part of our family. Thank you, Furlinks!"
            </p>
        </div>
        <div class="col-lg-4 col-sm-4 col-md-4 px-0 mx-0">
            <img src="{{asset('build/images/rehomed/dog2r.jpg') }}" class="my-3 mx-0" style="width: 50%;">
            <p class="mx-5 mb-5">
                "We highly recommend Furlinks as a resource for anyone looking to adopt a dog. The platform's features make it an incredibly 
                user-friendly and efficient tool in the search for the perfect pet. Thanks to Furlinks, we were able to find and adopt the 
                perfect companion for our family and we couldn't be happier. We are truly grateful for the support and guidance that Furlinks 
                provided throughout the adoption process."
            </p>
        </div>
        <div class="col-lg-4 col-sm-4 col-md-4 px-0 mx-0">
            <img src="{{asset('build/images/rehomed/dog3r.jpg') }}" class="my-3 mx-0" style="width: 50%;">
            <p class="mx-5 mb-5">
                "Adopting a dog has been one of the greatest joys of our lives and we have Furlinks to thank for making it possible. Their 
                platform made the entire process of finding and adopting our new furry family member a breeze. We are forever grateful for the 
                role that Furlinks played in bringing our new companion into our home. Thank you, Furlinks, for making this day the best one of 
                our lives."
            </p>
        </div>
        <br><br>
    </div>
    </center>
</div>

@endsection