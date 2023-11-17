@extends('templates_auth.app') <!-- You may need to adjust the layout based on your project setup -->

@section('content')
<div class="login-box">
    <div class="card-header" style="background-color: #74bb04;"></div>
    <div class="card" style="box-shadow: 6px 9px 19px 0px rgba(0,0,0,0.75);
-webkit-box-shadow: 6px 9px 19px 0px rgba(0,0,0,0.75);
-moz-box-shadow: 6px 9px 19px 0px rgba(0,0,0,0.75);">
        <div class="card-body login-card-body">
            <center>
                <img src="{{ asset('assets/logo.png') }}" alt="Logo" class="img-fluid" width="200">
            </center>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required autocomplete="current-password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label for="remember">
                                Remember Me
                            </label>
                        </div>
                    </div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer" style="background-color: #74bb04;"></div>
    </div>
</div>
@endsection