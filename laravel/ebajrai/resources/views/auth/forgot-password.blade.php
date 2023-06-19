{{-- 
    <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button>
                    {{ __('Email Password Reset Link') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout> 
--}}

<!DOCTYPE html>
<html>
    
    <head>
        
        <title> E-Bajrai | Forgot Password </title>
        <link rel="shortcut icon" href="images/logo.png">
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
                height: 20%;
                width: 500px;
                padding: 80px;
            }

        </style>
        
    </head>

    <body>
        <x-guest-layout><br><br>
        <div class="container h-100">
            <div class="d-flex justify-content-center h-100">
                <div class="user_card">
                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif
                <x-jet-validation-errors class="mb-4" />
                    <form action="{{route('password.email')}}" method="POST" name="frm-login" class="Signup">
                        @csrf
                        <div class="container">
                            <div class="row"> 
                                <div class="col-sm">

                                    <h2 style="text-align: center"> Forgot password </h2><br><br>

                                    <label for="email"> <b>Email Address</b> </label>
                                    <input class="form-control" type="email" name="email" id="frm-login-uname" placeholder="email address" :value="old('email')" required autofocus>
                                    <br><br>
                                    
                                    <input class="btn btn-primary" type="submit" name="submit" value="Email Password Reset Link"><br>
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


