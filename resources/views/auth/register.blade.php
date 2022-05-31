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
<!DOCTYPE html>
<html lang="en">
    <style>
        *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family:'Arial', sans-serif;
}
body{
    display: flex;
    height: 100vh;
    justify-content: center;
    align-items: center;
    padding: 10px;
    background: linear-gradient(135deg,#52738a, #dde5eb);
}
.container{
    max-width: 700px;
    width: 100%;
    background-color: white;
    padding: 25px 30px;
    border-radius: 5px;
}
.container .title{
    font-size: 30px;
    font-weight: 500;
    position: relative;
}
.container .title::before{
    content: '';
    position: absolute;
    left: 0;
    bottom: 0;
    height: 3px;
    width: 40px;
}
.container form .user-details{
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
     .container{
         max-width: 100%;
     }
     form .user-details .input-box{
         margin-bottom: fit-content;
         width: 100%;
     }
     form .gender-details .category{
         width: 100%;
     }
     .container form .user-details{
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
<body>
    <div class="container">
       <div class="title">Sign Up</div>
       <form action="#">
           <div class="user-details">
            <div class="input-box">
                <span class="details">First Name</span>
                <input type="text" placeholder="Enter your first name" required>
            </div>
            <div class="input-box">
                <span class="details">Last Name</span>
                <input type="text" placeholder="Enter your last name" required>
            </div>
            <div class="input-box">
                <span class="details">Email</span>
                <input type="text" placeholder="Enter your email" required>
            </div>
            <div class="input-box">
                <span class="details">Confirm email</span>
                <input type="text" placeholder="Enter your email once more" required>
            </div>
            <div class="input-box">
                <span class="details">Password</span>
                <input type="text" placeholder="Enter your password" required>
            </div>
            <div class="input-box">
                <span class="details">Confirm Password</span>
                <input type="text" placeholder="Enter password one more time" required>
            </div>
            <div class="input-box">
                <span class="details">Username</span>
                <input type="text" placeholder="Enter your username" required>
            </div>
            <br>
            <font size="2">**If user decides to be anonymous, they can name theirselves with any username. No other user will know which person is behind the username chosen. All your personal data will be private.</font>
            <div class="input-box">
                <span class="details">Birthday</span>
                <input type="date" placeholder="MM.DD.YY" required>
            </div>
            <div class="input-box">
                <span class="details">Course of Study</span>
                <input type="text" placeholder="Enter your current course of study" required>
            </div>
           </div>
           <div class="gender-details">
               <input type="radio" name="gender" id="dot-1">
               <input type="radio" name="gender" id="dot-2">
               <input type="radio" name="gender" id="dot-3">
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
</body>
</html>
@endsection
