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
                <div class="col-md-2"></div>
                <div class="col-sm-6 col-md-5">
                    <div class="login">
                        <form id="signup-form" role="form" method="POST" action="{{ url('/register') }}">
                            {{ csrf_field() }}
                            <h2>Create A new Account</h2>
                            <p>Create your own account</p>
                            <label>Name<span class="{{ $errors->has('name') ? ' has-error' : '' }}">*</span></label>
                            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>

                            @if ($errors->has('name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif

                            <label>E-mail Address<span class="{{ $errors->has('email') ? ' has-error' : '' }}">*</span></label>
                            <input type="email" name="email" value="{{ old('email') }}"  required/>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                            <label>Password<span class="{{ $errors->has('password') ? 'has-error' : '' }}"></span></label>
                            <input type="password" name="password" required/>
                            @if ($errors->has('password'))
                                <span class="help-block text-danger">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                            <label>Confirm Password<span>*</span></label>
                            <input id="password-confirm" type="password" name="password_confirmation" required/>
                            <input type="submit" value="Sign up" />  Already have an Account? <a href="{{ url('/signin') }}">Sign In</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!--End login Area-->
    </div><!--Start Shop Area-->

@endsection