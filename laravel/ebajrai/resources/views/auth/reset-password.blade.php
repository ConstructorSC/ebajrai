{{--
    <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="block">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button>
                    {{ __('Reset Password') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
--}}

<!DOCTYPE html>
<html>
    
    <head>
        
        <title> E-Bajrai | Reset Password </title>
        <link rel="shortcut icon" href="images/logo.png">
        <link rel="stylesheet" href="css/base_style.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
        <script src="https://kit.fontawesome.com/a7b35074e7.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/astyle.css') }}">        
        <style>
            
            body {
                background-color: #F5F8F2;
                color: darkslategray;
                font-size: 15px;
            }

            .Signup .btn {
                width: 100%;
                margin: 10px 0px;
                font-size: 18px;
                background-color: #53B175;
                border: none;
            }
            
            .user_card{
                height: 20%;
                width: 500px;
                padding: 80px;
            }

            footer
            {
                position: absolute;
            }

        </style>
        
    </head>

    <body>
        <x-guest-layout><br><br>
        <div class="container h-100">
            <div class="d-flex justify-content-center h-100">
                <div class="user_card">
                <x-jet-validation-errors class="mb-4" />
                    <form action="{{route('password.update')}}" method="POST" name="frm-login" class="Signup">
                        @csrf
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">
                        <div class="container">
                            <div class="row"> 
                                <div class="col-sm">

                                    <h2 style="text-align: center"> Reset password </h2><br><br>

                                    <label for="email"> <b>Email Address</b> </label>
                                    <input class="form-control" type="email" name="email" id="frm-login-uname" placeholder="email address" value="{{ $request->email }}" required autofocus><br>
                                    
                                    <label for="password"><b>Your Password</b></label>
                                    <input class="form-control" id="password" type="password" name="password" placeholder="your password" required autocomplete="new-password"><br>

                                    <label for="password_confirmation"><b>Confirm Your Password</b></label>
                                    <input class="form-control" id="password_confirmation" type="password" name="password_confirmation" placeholder="confirm password" required autocomplete="new-password"><br>

                                    <input class="btn btn-primary" type="submit" name="submit" value="Reset Password"><br>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </x-guest-layout>
    </body>
    
</html>


