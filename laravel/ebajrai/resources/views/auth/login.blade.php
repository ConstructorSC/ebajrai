{{--
<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
--}}

    <!DOCTYPE html>
    <html>
        
        <head>
            
            <title> E-Bajrai | Login </title>
            <link rel="shortcut icon" href="{{ asset('images/logo.png') }}">
            <link rel="stylesheet" href="css/base_style.css">
            <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
            <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
            <script src="https://kit.fontawesome.com/a7b35074e7.js" crossorigin="anonymous"></script>
            <link rel="stylesheet" type="text/css" href="css/astyle.css">
            
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
                    height: 25%;
                    width: 500px;
                    padding: 80px;
                }

            </style>
            
        </head>

        <body>

        <x-guest-layout>
        <br><br>
            <div class="container h-100">
                <div class="d-flex justify-content-center h-100">
                    <div class="user_card">
                        <form action="{{route('login')}}" method="POST" name="frm-login" class="Signup">
                            @csrf
                            <div class="container">
                                <div class="row"> 
                                    <div class="col-sm">

                                        <h2 style="text-align: center"> Login </h2>
                                        <p style="text-align: center; color: gray"> Enter your credentials to continue </p>
                                        <hr class="mb-3"><br>

                                        <label for="email"> <b>Email Address</b> </label>
                                        <input class="form-control" type="email" name="email" id="frm-login-uname" placeholder="Email address" :value="old('email')" required autofocus>

                                        <label for="password"> <b>Password</b> </label>
                                        <input class="form-control" type="password" name="password" placeholder="*******" required autocomplete="current-password">
                                        <br>
                                        

                                        <x-jet-validation-errors class="mb-4" />
                                        
                                        <input class="btn btn-primary" type="submit" id="register" name="create" value="Login"><br>
                                        <a class="link-function" href="{{ route('password.request') }}" title="Forgotten password?" style="color: #53B175; text-decoration:none"> Forgotten password? </a>
                                        <hr class="mb-3">
                                        <div class="mt-4">
                                            <div class="d-flex justify-content-center links">
                                                Don't have an account? &nbsp; <a href="{{route('register')}}" style="color: #53B175; text-decoration: none">Sign Up</a>
                                            </div>
                                        </div>
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

