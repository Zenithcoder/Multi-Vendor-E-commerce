@extends('frontend.layout')

@section('content')
    <div class="page-title fix"><!--Start Title-->
        <div class="overlay section">
            <h2>Shop</h2>
        </div>
    </div><!--End Title-->


    </div>
    </div>
    </div>

    <div class="login-page page fix"><!--start login Area-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-5">
                    <div class="login">
                        <form id="login-form"method="POST" role="form" action="{{ url('/login')  }}">
                            {{ csrf_field() }}

                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>
                                        {{ $message }}
                                    </p>
                                </div>
                            @endif
                            @if ($message = Session::get('warning'))
                                <div class="alert alert-warning">
                                    <p>
                                        {{ $message }}
                                    </p>
                                </div>
                            @endif

                            <h2>Login</h2>
                            <p>Welcome to your account</p>
                            <label for="email">E-mail Address<span class="{{ $errors->has('email') ? 'has-error' : '' }}"></span></label>
                            <input type="email" name="email" value="{{ old('email') }}" required autofocus/>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                            <label>Password<span class="{{ $errors->has('password') ? 'has-error' : '' }}"></span></label>
                            <input type="password" name="password" required/>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                            <div class="remember">
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : ''}} />
                                <p>Remember me!</p>
                                <a href="{{ url('/password/reset') }}">Forgot Your Password ?</a>
                            </div>
                            <input type="submit" value="login" />  Don't have an Account? <a href="{{ url('/signup') }}">Create an Account</a>
                        </form>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </div><!--End login Area-->
    </div><!--Start Shop Area-->

@endsection