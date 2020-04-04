@extends('layouts.auth')

@section('content')
<div class="container flex flex-col flex-1 justify-center">
    <div class="row">
        <div class="col-xl-4 col-lg-5 col-md-6 col-sm-8">
            <div class="md:my-12 py-12">
                <div class="mb-6">
                    <div class="h-8 overflow-hidden">
                        <a href="{{ url('/') }}" title="{{ config('app.name', 'Readables') }}">
                            <img src="{{ asset('img/logo.png') }}" class="h-8" alt="{{ config('app.name', 'Readables') }}">
                        </a>
                    </div>

                    <h2 class="text-3xl font-extrabold text-gray-900">
                        Welcome back
                    </h2>

                    <p class="text-gray-500">
                        Log in to your account to continue
                    </p>
                </div>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-6">
                        <label for="email" class="block">
                            <span class="text-sm mb-2 font-semibold">{{ __('Email') }}</span>

                            <input id="email" type="email" class="form-input mt-1 block w-full @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="john.doe@somemail.com">

                            @error('email')
                                <span class="text-sm block mt-2 text-red-500" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </label>
                    </div>

                    <div class="mb-6">
                        <label for="password" class="block">
                            <span class="text-sm mb-2 font-semibold">{{ __('Password') }}</span>

                            <input id="password" type="password" class="form-input mt-1 block w-full @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="rememberme?">

                            @error('password')
                                <span class="text-sm block mt-2 text-red-500" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </label>
                    </div>

                    <div class="mb-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <label class="flex items-center" for="remember">
                                    <input type="checkbox" class="form-checkbox text-indigo-500 h-4 w-4" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <span class="ml-2 text-sm font-semibold">{{ __('Remember me') }}</span>
                                </label>
                            </div>

                            @if (Route::has('reset'))
                                <a class="text-sm" href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif
                        </div>
                    </div>

                    <div class="mt-6">
                        <button type="submit" class="w-full inline-block py-2 px-4 border border-transparent text-sm font-medium rounded-lg text-white bg-indigo-500 hover:bg-indigo-400 focus:outline-none focus:border-indigo-400 focus:shadow-outline-indigo active:bg-indigo-400 transition duration-150 ease-in-out">
                            Log in <span class="ml-1">&rarr;</span>
                        </button>
                    </div>
                </form>

                @if (Route::has('register'))
                    <div class="mt-6 text-sm">
                        <span class="text-gray-600">Don't have an account yet?</span> <a href="{{ route('register') }}">{{ __('Create one') }}</a>
                    </div>
                @endif
            </div>
        </div>

        <div class="col-xl-4 offset-xl-1 col-lg-5 col-md-6 col-sm-8">
            <div class="md:my-24 my-6 bg-gray-100 rounded-lg alert alert alert alert-dismissible fade show p-0">
                <button type="button" class="font-normal close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <div class="p-6">
                    <h5 class="font-bold mb-4">Disclaimer</h5>

                    <p class="text-sm text-gray-600">
                        The name <span class="font-bold">Elegant Media Support</span> is fictional and is no way a copy of or affiliated to anything.
                    </p>

                    <hr class="my-6">

                    <h5 class="font-bold mb-4">Things to note</h5>

                    <p class="text-sm text-gray-600 mb-4">
                        Since the app is running on a free test database the performance will be very slow and sometimes unresponsive. Especially due to the reason the app sends emails to its customers "so to speak".
                    </p>

                    <p class="text-sm text-gray-600 mb-4">
                        New member registration has been disabled along with password resets. Also user profile & account settings have been disabled for this is a demo app.
                    </p>

                    <p class="text-sm text-gray-600 mb-6">
                        Emails that are sent are captured by <a href="https://mailtrap.io/inboxes/876965/messages/1640282848">mailtrap.io</a> to simulate a real inbox. Credentials are given below and you can check the emails sent with the link provided.
                    </p>

                    <div class="mb-6">
                        <div class="text-sm font-semibold mb-2">Mailtrap.io Credentials</div>

                        <div class="text-sm">
                            <div><span class="text-gray-800">Email:</span> <span>tjthavarshan@gmail.com</span></div>
                            <div><span class="text-gray-800">Password:</span> <span>MatrixSilver911</span></div>
                        </div>
                    </div>

                    <p class="text-sm text-gray-600 mb-4">
                        The app UI is <span class="font-bold">not</span> completely mobile responsive since I didn't have the time to work on the UI a lot.
                    </p>

                    <p class="text-sm text-gray-600 mb-6">
                        If you are curious about what I used for styling, I used <a href="https://tailwindcss.com/" target="_blank">Tailwind CSS</a> for styles and <a href="https://getbootstrap.com" target="_blank">Twitter Bootstrap</a> JavaScript behaviour for client side interactions like dropdowns and modals.
                    </p>

                    <div class="mb-6">
                        <div class="text-sm font-semibold mb-2">Just incase you forget your credentials,</div>

                        <div class="text-sm">
                            <div><span class="text-gray-800">Email:</span> <span>guest@support.com</span></div>
                            <div><span class="text-gray-800">Password:</span> <span>iamapassword</span></div>
                        </div>
                    </div>

                    <div>
                        <a href="https://github.com/Thavarshan/elegant-media-support" class="flex items-center text-sm" target="_blank">
                            <svg class="h-5 w-5 mr-1" fill="currentColor" viewBox="0 0 24 24">
                              <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd"></path>
                            </svg>

                            <span>Github repo</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
