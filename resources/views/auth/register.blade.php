@extends('components.navbar')

@section('content')
<body style="background-color:#f5efea ">
<div class="container" style="margin-top:60px;margin-bottom:60px">
    <div class="row justify-content-center">
        <div class="col-md-8">
         
            <div class="card">
                <div class="card-header" style="background-color:#c8a279;">{{ __('Register') }}
                </div>

                <div class="card-body"style=" background-color: #f8f6f3;"> 
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end"></label>

                            <div class="col-12 col-md-6 d-flex justify-content-center">
                            <button type="submit" class="btn btn-dark form-control" href="userprofile/profiletabs" style="
                            background-color: #eee7df;
                            border-style: solid;
                            border-color: #a77035;
                            border-width: 1px;
                            color:#a77035;
                            border-radius: 10px;
                           font-family: 'Lato', sans-serif;
                           transition: all 0.4s;">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                        </div>

                        {{-- <div class="row mb-0">
                            <div class="col-md-6 d-block m-auto">
                                <center>
                                    <button type="submit" class="btn form-control reg_btn" href="userprofile/profiletabs">
                                        {{ __('Register') }}
                                    </button>
                                </center>
                            </div>
                        </div> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
