<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Register</title>
    <link rel="stylesheet" href="/css/loginRegister.css">

</head>
<body>
@include('inc.header')

<div class="container" style="margin-top: 20px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card" >
                    <div class="card-header" style="text-align: center"><h1>{{ __('Login') }}</h1></div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf


                            <label for="email" style="text-align: center;width: 100%;" >{{ __('E-Mail Address') }}</label>


                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror


                            <br>
                            <label for="password" style="text-align: center;width: 100%;">{{ __('Password') }}</label>


                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror




                            <br>
                            <div class="form-check" style="margin-left: 38%;">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" style="margin-left: 33%;" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a><br><br>
                            @endif


                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">




                                    <button type="submit" style="width: 50%;" class="btn btn-primary">
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
</html>
