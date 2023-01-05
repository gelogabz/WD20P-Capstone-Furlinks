@extends('components.profiletabs')

@section('personalinfo')
<div class='container'>
    <H1>Personal Information</H1>
    <p>Edit your basic personal info to improve recommendations. This information is private and won't show up in your public profile.</p>
    <div class='row'>
        <label>Gender:</label>
        <div class="col-4 form-check d-flex justify-content-center ">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
            <label class="form-check-label" for="flexRadioDefault1">
            &nbsp;Male
            </label>
        </div>
        <div class="col-4 form-check d-flex justify-content-center ">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
            <label class="form-check-label" for="flexRadioDefault2">
            &nbsp;Female
            </label>
        </div>
        <div class="col-4 form-check d-flex justify-content-center">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault21" checked>
            <label class="form-check-label" for="flexRadioDefault21">
            &nbsp;Non-Binary
            </label>
        </div>
        
        <div class='col-12 mt-4'>
            <label class='mb-2'>Address:</label>
            <input type="text" class="form-control" placeholder="Address" aria-label="Address">
        </div>

        <div class='col-6 mt-4'>
            <label class='mb-2'>Barangay</label>
            <input type="text" class="form-control" placeholder="Barangay" aria-label="Barangay">
        </div>

        <div class='col-6 mt-4'>
            <label class='mb-2'>City</label>
            <input type="text" class="form-control" placeholder="City" aria-label="City">
        </div>

        <div class='col-6 mt-2'>
            <div class='row justfiy-content-center'>
                <label class='mt-4 mb-2'>Home:</label>
                <div class="col-3 form-check d-flex justify-content-center ">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault11">
                    <label class="form-check-label" for="flexRadioDefault11">
                    &nbsp;Home
                    </label>
                </div>
                
                <div class="col-3 form-check d-flex justify-content-center ">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault111">
                    <label class="form-check-label" for="flexRadioDefault111">
                    &nbsp;Condo
                    </label>
                </div>
            </div>
        </div>

        <div class='col-6 mt-2 d-flex justify-content-center align-items-center'>
            <div class='row justfiy-content-center'>
                <label class='mt-4 mb-2'>If rented, are you allowed to have dogs?</label>
                <div class="col-3 form-check d-flex justify-content-center ">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                        &nbsp; Yes
                    </label>
                </div>
            </div>
        </div>

        <div class='col-6'>
            <div class='row justfiy-content-center'>
                <label class='mt-2 mb-2'>Type:</label>
                <div class="col-3 form-check d-flex justify-content-center ">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault11">
                    <label class="form-check-label" for="flexRadioDefault11">
                    &nbsp;Own
                    </label>
                </div>
                
                <div class="col-3 form-check d-flex justify-content-center ">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault111">
                    <label class="form-check-label" for="flexRadioDefault111">
                    &nbsp;Rented
                    </label>
                </div>
            </div>
        </div>
        
    </div>




</div>
@endsection
