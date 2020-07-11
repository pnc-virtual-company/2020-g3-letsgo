@extends('layouts.app')

@section('content')

<body class="body-background">
    <div class="container">
        <div class="row d-flex justify-content-center mx-auto">
            <div class="col-md-4 col-xs-12 div-style">
            <form method="POST" action="{{route('register')}}">
                    @csrf

                <div class="d-flex justify-content-center mx-auto" >
                    
                    <h2>Create account</h2>
                </div>
                <div class="form-group">
                            <label for="email">{{ __('E-Mail Address') }}</label>

                                <input id="email" type="email" class="form-control text-box @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        </div>
                        <div class="form-group">
                            <label for="password" >{{ __('Password') }}</label>


                                <input id="password" type="password" class="form-control text-box @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        </div>

                <div class="form-group ">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Or back to sign in') }}</a>
                    <button type="submit" class="btn btn-success float-right">Next</button>
                </div>
            </form>
        </div>
        </div>
    </div>
</body>
@endsection
<style>
.div-style{
    margin-top : 4rem;
    padding : 3rem;
    background: white;
    border-radius: 20px;
    box-shadow: rgba(0, 0, 0, 0.1) 0px 0.5rem 1rem 0px;
}

</style>
