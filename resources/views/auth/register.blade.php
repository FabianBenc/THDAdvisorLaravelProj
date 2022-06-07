@extends('layouts.app')

@section('content')
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
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

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
    <style>
        *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family:'Arial', sans-serif;
}
.body1{
    display:flex;
    justify-content: center;
    align-items: center;
}
.container1{
    max-width: 700px;
    width: 100%;
    background-color: white;
    padding: 25px 30px;
    border-radius: 5px;
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
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    margin: 10px 0 10px 0;
    margin-bottom: 15px;
}
form .user-details .input-box{
    height: fit-content;
    width: 300px;
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
form .gender-details .gender-title{
    font-size: 20px;
    font-weight: 500;
}
form .gender-details .category{
    display: flex;
    width: 80%;
    margin: 10px 0;
    justify-content: space-between;
}
.gender-details .category label{
    display: flex;
    align-items: center;
}
.gender-details .category .dot{
    height: 18px;
    width: 18px;
    background: lightgray;
    border-radius: 50%;
    margin-right: 5px;
    border: 5px solid transparent;
    transition: all 0.3s ease;
}
#dot-1:checked ~ .category label .one,
 #dot-2:checked ~ .category label .two,
 #dot-3:checked ~ .category label .three{
   background: #1169a8;
   border-color: lightgray;
 }
 form input[type="radio"]{
     display: none;
 }
 form .button{
     height: 45px;
     margin: 35px 0;
 }
 form .button input{
     height: 100%;
     width: 100%;
     outline: none;
     color: #eff3f5;
     border: none;
     border-radius: 5px;
     font-size: 18px;
     letter-spacing: 0.5px;
     background: #1169a8;
 }
 @media (max-width: 584px) {
     .container1{
         max-width: 100%;
     }
     form .user-details .input-box{
         margin-bottom: fit-content;
         width: 100%;
     }
     form .gender-details .category{
         width: 100%;
     }
     .container1 form .user-details{
         max-height: 300px;
         overflow-y: scroll;
     }
 }
    </style>
<head>
    <meta charset ="UTF-8">
    <title> Sign Up</title>
    <link rel="stylesheet" type="text/css" href="mystyles.css" media="screen" />
    <meta name="viewport" content=""width=device-witdth, initial-scale="1.0">
</head>
<div class="body1">
    <div class="container1">
       <div class="title">Sign Up</div>
       <form method="POST" action="{{ route('register') }}">
                        @csrf
           <div class="user-details">
                <div class="input-box">
                    <span class="details">First Name</span>
                    <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>

                                    @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                </div>
                <div class="input-box">
                    <span class="details">Last Name</span>
                    <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>

                                    @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                </div>
                <div class="input-box">
                    <span class="details">Username</span>
                    <!-- <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label> -->
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                </div>
            <div class="input-box">
                <span class="details">Email</span>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
            </div>
            <div class="input-box">
                <span class="details">Password</span>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
            </div>
            <div class="input-box">
                <span class="details">Confirm Password</span>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>
            <font size="2">**If user decides to be anonymous, they can name theirselves with any username. No other user will know which person is behind the username chosen. All your personal data will be private.</font>
            <div class="input-box">
                <span class="details">Course of Study</span>
                <input id="course_of_study" type="text" class="form-control @error('course') is-invalid @enderror" name="course_of_study" value="{{ old('course_of_study') }}" required autocomplete="course_of_study" autofocus>

                                @error('course')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
            </div>
           <div class="gender-details">
               <input type="radio" name="gender" id="dot-1" value="Female">
               <input type="radio" name="gender" id="dot-2" value="Male">
               <input type="radio" name="gender" id="dot-3" value="Diverse">
               <span class="gender-title">Gender</span>
               <div class="category">
                   <label for="dot-1">
                       <span class="dot one"></span>
                       <span class="gender">Female</span>
                   </label>
                   <label for="dot-2">
                    <span class="dot two"></span>
                    <span class="gender">Male</span>
                </label>
                <label for="dot-3">
                    <span class="dot three"></span>
                    <span class="gender">Diverse</span>
                </label>
               </div>
           </div>
           <div class="button">
               <input type="Submit" value="Register">
           </div>
       </form>
    </div>
</div>
@endsection
