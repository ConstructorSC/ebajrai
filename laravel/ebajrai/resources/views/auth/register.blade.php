{{--
<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
--}}
  
    <!DOCTYPE html>
    <html>
        
        <head>
            
            <title> E-Bajrai | Registration </title>
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
                    height: 45%;
                    width: 500px;
                    padding: 80px;
                }
                
                .top {
                    text-align: center;
                    justify-content: center;
                }
                
            </style>
            
        </head>

        <body>
        
        <x-guest-layout>
        <br><br><br>
            <div class="container h-100">
                <div class="d-flex justify-content-center h-100">
                    <div class="user_card">   
                    <form action="{{route('register')}}" method="POST" name="frm-login" class="Signup">
                            @csrf
                            <div class="container">
                                <div class="row"> 
                                    <div class="col-sm">

                                        <h2 style="text-align: center"> Sign Up </h2>
                                        <p style="text-align: center; color: gray"> Enter your credentials to continue </p>
                                        <hr class="mb-3">

                                        <label for="name"><b>Name</b></label>
                                        <input class="form-control" id="name" type="text" name="name" placeholder="e.g., John Doe" :value="name" required autofocus autocomplete="name">

                                        <label for="email"><b>Email Address</b></label>
                                        <input class="form-control" id="email" type="email" name="email" placeholder="e.g., johndoe@edu.com" :value="email" required>

                                        <label for="password"><b>Your Password</b></label>
                                        <input class="form-control" id="password" type="password" name="password" placeholder="your password" required autocomplete="new-password">

                                        <label for="password"><b>Confirm Your Password</b></label>
                                        <input class="form-control" id="cpassword" type="password" name="password_confirmation" placeholder="confirm password" required autocomplete="new-password">
                                        <br>
                                        <x-jet-validation-errors class="mb-4" />

                                        <hr class="mb-3">
                                        <input class="btn btn-primary" type="submit" id="register" name="create" value="Sign Up">
                                        
                                        <div class="mt-4">
                                            <div class="d-flex justify-content-center links">
                                                Already have an account? &nbsp; <a href="{{route('login')}}" style="color: #53B175; text-decoration: none">Login</a>
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

