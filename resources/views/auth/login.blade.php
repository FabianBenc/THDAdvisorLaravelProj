@extends('layouts.app')

@section('content')
<style>
    *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family:'Arial', sans-serif;
    }
    .body1{
    display: flex;
    justify-content: center;
    align-items: center;
    }
    .container1{
    max-width: 400px;
    width: 100%;
    background-color: white;
    padding: 25px 30px;
    border-radius: 5px;
    border-style: solid;
    border-color: #127ba3;
    }
    .container1 .title{
    font-size: 30px;
    font-weight: 500;
    position: relative;
    }
    .container1 .title::before{
    content: '';
    position: absolute;
    left: 0;
    bottom: 0;
    height: 3px;
    width: 40px;
    }
    .container1 form .user-details{
    display: contents;
    flex-wrap: wrap;
    justify-content: space-between;
    margin: 10px 0 10px 0;
    margin-bottom: 15px;
    }
    form .user-details .input-box{
    height: fit-content;
    margin: 10px 0 10px 0;
    }
    .user-details .input-box input{
    height: 30px;
    width: 100%;
    border: 1px solid #336b91;
    border-radius: 5px;
    padding-left: 10px;
    font-size: 13px;
    border-bottom-width: 2px;
    }
    .user-details .input-box .details{
    font-weight: 500;
    margin-bottom: 5px;
    display: block;
    }
 form .button{
     height: 40px;
     margin: 35px 0;
 }
 form .button input{
     height: 110%;
     width: 35%;
     outline-color: #105281;
     color: #f2f6f8;
     border: none;
     border-radius: 5px;
     font-size: 16px;
     letter-spacing: 0.5px;
     background: #1169a8;
     position: relative;
     top: 0.5mm; left: 100px;
 }

 .center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
}
    </style>

<div class="body1">
    <div class="container1">
    <img src="{{url('/images/logo.png')}}" alt="Image" class="center"/>
       <div class="title" style="text-align: center;">Login</div>
       <form method="POST" action="{{ route('login') }}">
       @csrf
           <div class="user-details">
            <div class="input-box">
                <span class="details">Email</span>
                <!-- <input type="text" placeholder="Enter the email you signed up with" required> -->
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
            </div>
            <div class="input-box">
                <span class="details">Password</span>
                <!-- <input type="text" placeholder="Enter your password" required> -->
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
            </div>

            <div>
                <div >
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                             {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
            </div>



            <div>
                            <div>
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
            </div>
        </form>
    </div>
</div>
</html>
@endsection
