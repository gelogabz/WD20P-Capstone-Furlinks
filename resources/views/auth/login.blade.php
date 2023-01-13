@extends('components.navbar')
@section('content')
<body style="background-color:#f5efea ">

<div class="container" style="margin-top:60px;margin-bottom:60px">
    

        @if(session('success'))
        <div class="alert alert-success">
            <strong>{{session('success')}}</strong>
           
        </div>
        @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background-color:#c8a279;">{{ __('Login') }}
                </div>

                <div class="card-body" style=" background-color: #f8f6f3;">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end"></label>
                            <div class="col-md-6">
                                <button type="submit" class="btn-primary form-control" href="/login"
                                style="background-color: #5c8dc1;
                                border-radius: 10px;
                                border-style: solid !important;
                                border-color: #366495 !important;
                                border-width: 1px !important;
                                font-family: 'Lato', sans-serif;
                                padding-left: 15px;
                                padding-right: 15px;
                                color:white;
                                transition: all 0.4s ;">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
@endsection
