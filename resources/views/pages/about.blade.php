@extends ('components.navbar')
@section('content')
<div style="background-color: #F4f4f4;">
    <div class="row align-items-center d-flex mx-0">
        <div class="col-sm-5 my-5 mx-auto">
                <div>
                <img src="{{asset('build/images/about-logo.png') }}" class="rounded-circle ms-3" style="width: 90%;">
                </div>
           
        </div>
        <div class="col-md-7 my-5">
            <h3 class="display-5 text-center mx-5" style="color:#413F42; font-family:Quicksand; font-weight:700;">ABOUT FURLINKS</h3>
            <br>
            <h5 class="text-center">Furlinks is a platform created to support the 'Adopt, Don't Shop' dogs campaign. </h5><br>
            <p class="text-center mx-5" style="font-family: Lato; font-weight:500; color:#413F42;">
               Dog adoption is a wonderful way to bring a new companion into your life and 
               to make a difference in the life of a dog. When you adopt a dog, you are saving 
               a life and providing a home for a dog who may have otherwise been left in a shelter 
               or rescue. 
               <br><br>
               When you adopt a dog, you are giving a dog a second chance at 
               a happy life. Many dogs in shelters and rescues have been abandoned, abused, or 
               neglected by their previous owners. By adopting a dog, you are providing a loving 
               and stable home for a dog who may have never known love or stability before.
               <br><br>
               Adopting a dog can be less expensive than purchasing 
               a dog from a breeder or pet store, as the adoption fee often includes the cost 
               of spaying or neutering, vaccinations, and other veterinary care. Adopting a 
               dog can also be more rewarding, as you are giving a dog a second chance and 
               making a difference in their life. 
               <br><br>
               When you adopt a dog, it is important to consider the responsibilities that 
               come with pet ownership. Owning a dog requires time, effort, and resources, 
               including providing for their physical and emotional needs, such as exercise, 
               training, and socialization. It is important to carefully consider whether you 
               are ready and able to provide for a dog before making the decision to adopt.
               <br><br>
               In conclusion, adopting a dog can be a wonderful and rewarding experience for 
               both you and the dog. It is a responsible and selfless decision that can make 
               a huge difference in the life of a dog. If you are ready and able to provide a 
               loving and stable home for a dog, adoption is a great option to consider.  
            </p>
        </div>
    </div>
</div>
@endsection