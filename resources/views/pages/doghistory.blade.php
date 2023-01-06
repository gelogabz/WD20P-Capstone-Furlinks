@extends('components.profiletabs')

@section('doghistory')
<div class='container'>
    
    <H1 class='mb-5'>Dog History</H1>
    
    <div class='row'>
        {{-- Question number 1 --}}
        <div class='col-md-4'>
            <label class=''>Do you currently have pets ? </label>
        </div>
        
        <div class="col-md-1 form-check d-flex justify-content-center ">
            <input class="form-check-input" type="radio" name="flexRadioDefault1" id="flexRadioDefault111">
            <label class="form-check-label" for="flexRadioDefault11">
            &nbsp;Yes
            </label>
        </div>
        
        <div class="col-md-1 form-check d-flex justify-content-center ">
            <input class="form-check-input" type="radio" name="flexRadioDefault1" id="flexRadioDefault1112">
            <label class="form-check-label" for="flexRadioDefault111">
            &nbsp;No
            </label>
        </div>

        
        <div class="col-6 form-check justify-content-center ">
            
            <label class="">If yes, how many ? &nbsp;</label>
            <input class="form-control form-control-sm text-center" type="text" style="height:40px; width:100px;">
        </div>
        <br><br><br>

        {{-- Question number 2 --}}
        <div class='col-md-4'>
            <label class=''>Does any member of your household have any known alergies to animals ? </label>
        </div>

        <div class="col-md-1 form-check d-flex justify-content-center ">
            <input class="form-check-input" type="radio" name="flexRadioDefault2" id="flexRadioDefault111">
            <label class="form-check-label" for="flexRadioDefault11">
            &nbsp;Yes
            </label>
        </div>
        
        <div class="col-md-1 form-check d-flex justify-content-center ">
            <input class="form-check-input" type="radio" name="flexRadioDefault2" id="flexRadioDefault1112">
            <label class="form-check-label" for="flexRadioDefault111">
            &nbsp;No
            </label>
        </div>
        <div class="col-md-6">

        </div>
        <br><br><br>

        {{-- Question number 3 --}}
        <div class='col-md-4'>
            <label class=''>If you have children, have they been taught how to behave with animals ? </label>
        </div>

        <div class="col-md-1 form-check d-flex justify-content-center ">
            <input class="form-check-input" type="radio" name="flexRadioDefault3" id="flexRadioDefault111">
            <label class="form-check-label" for="flexRadioDefault11">
            &nbsp;Yes
            </label>
        </div>
        
        <div class="col-md-1 form-check d-flex justify-content-center ">
            <input class="form-check-input" type="radio" name="flexRadioDefault3" id="flexRadioDefault1112">
            <label class="form-check-label" for="flexRadioDefault111">
            &nbsp;No
            </label>
        </div>
        <div class="col-md-6">
            
        </div>
        <br><br><br>

        {{-- Question number 4 --}}
        <div class='col-md-4'>
            <label class=''>If you have other pets, have they all been vaccinated ? </label>
        </div>

        <div class="col-md-1 form-check d-flex justify-content-center ">
            <input class="form-check-input" type="radio" name="flexRadioDefault4" id="flexRadioDefault111">
            <label class="form-check-label" for="flexRadioDefault11">
            &nbsp;Yes
            </label>
        </div>
        
        <div class="col-md-1 form-check d-flex justify-content-center ">
            <input class="form-check-input" type="radio" name="flexRadioDefault4" id="flexRadioDefault1112">
            <label class="form-check-label" for="flexRadioDefault111">
            &nbsp;No
            </label>
        </div>
        <div class="col-md-6">
            
        </div>
        <br><br><br>
        
        {{-- Question number 5 --}}
        <div class='col-md-4'>
            <label class=''>If you have other pets, are they all spayed/neutered ? </label>
        </div>

        <div class="col-md-1 form-check d-flex justify-content-center ">
            <input class="form-check-input" type="radio" name="flexRadioDefault5" id="flexRadioDefault111">
            <label class="form-check-label" for="flexRadioDefault11">
            &nbsp;Yes
            </label>
        </div>
        
        <div class="col-md-1 form-check d-flex justify-content-center ">
            <input class="form-check-input" type="radio" name="flexRadioDefault5" id="flexRadioDefault1112">
            <label class="form-check-label" for="flexRadioDefault111">
            &nbsp;No
            </label>
        </div>
        <div class="col-md-6">
            
        </div>
        <br><br><br>

        {{-- Question number 6 --}}
        <div class='col-md-4'>
            <label class=''>Have you ever had a pet euthanized ? </label>
        </div>

        <div class="col-md-1 form-check d-flex justify-content-center ">
            <input class="form-check-input" type="radio" name="flexRadioDefault6" id="flexRadioDefault111">
            <label class="form-check-label" for="flexRadioDefault11">
            &nbsp;Yes
            </label>
        </div>
        
        <div class="col-md-1 form-check d-flex justify-content-center ">
            <input class="form-check-input" type="radio" name="flexRadioDefault6" id="flexRadioDefault1112">
            <label class="form-check-label" for="flexRadioDefault111">
            &nbsp;No
            </label>
        </div>
        <div class="col-md-6">
            
        </div>
        <br><br><br>

        {{-- Question number 6 --}}
        <div class='col-md-4'>
            <label class=''>Have you ever lost pet? </label>
        </div>

        <div class="col-md-1 form-check d-flex justify-content-center ">
            <input class="form-check-input" type="radio" name="flexRadioDefault7" id="flexRadioDefault111">
            <label class="form-check-label" for="flexRadioDefault11">
            &nbsp;Yes
            </label>
        </div>
        
        <div class="col-md-1 form-check d-flex justify-content-center ">
            <input class="form-check-input" type="radio" name="flexRadioDefault7" id="flexRadioDefault1112">
            <label class="form-check-label" for="flexRadioDefault111">
            &nbsp;No
            </label>
        </div>
        <div class="col-md-6">
            
        </div>
        <br><br><br>

    </div>

</div>
@endsection
