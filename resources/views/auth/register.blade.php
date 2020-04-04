@extends('layouts.auth')

@section('content')
<div class="container flex flex-col flex-1 justify-center">
    <div class="row">
        <div class="col-xl-4 col-lg-5 col-md-6 col-sm-8">
            <div class="my-12 py-12">
                <div class="mb-6">
                    <div class="h-8 overflow-hidden">
                        <a href="{{ url('/') }}" title="{{ config('app.name', 'Readables') }}">
                            <img src="{{ asset('img/logo.png') }}" class="h-4" alt="{{ config('app.name', 'Readables') }}">
                        </a>
                    </div>

                    <h2 class="text-3xl font-extrabold text-gray-900">
                        Let's get you started
                    </h2>

                    <p class="text-gray-500">
                        Start doing things for free, in an instant
                    </p>
                </div>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="mb-6">
                        <label for="name" class="block">
                            <span class="text-sm mb-2 font-semibold">{{ __('Full name') }}</span>

                            <input id="name" type="name" class="form-input mt-1 block w-full @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="John Doe">
                        </label>

                        @error('name')
                            <span class="text-sm block mt-2 text-red-500" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="email" class="block">
                            <span class="text-sm mb-2 font-semibold">{{ __('Email') }}</span>

                            <input id="email" type="email" class="form-input mt-1 block w-full @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="john.doe@somemail.com">
                        </label>

                        @error('email')
                            <span class="text-sm block mt-2 text-red-500" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="password" class="block">
                            <span class="text-sm mb-2 font-semibold">{{ __('Password') }}</span>

                            <input id="password" type="password" class="form-input mt-1 block w-full @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="iamforgetful">
                        </label>

                        @error('password')
                            <span class="text-sm block mt-2 text-red-500" role="alert">
                                {{ $message }}
                            </span>
                        @else
                            <span class="text-sm block mt-2 text-gray-500" role="alert">
                                Your password should be at least 8 characters
                            </span>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <p class="text-gray-600 max-w-md text-xs">
                            By clicking the "Create account" button you agree to our <a href="{{ url('/terms-of-use') }}">Terms & Conditions</a> and our <a href="{{ url('/privacy-policy') }}">Privacy Policy</a>.
                        </p>
                    </div>

                    <div class="mb-0 flex justify-between items-center">
                        <button type="submit" class="w-full inline-block py-2 px-4 border border-transparent text-sm font-medium rounded-lg text-white bg-indigo-500 hover:bg-indigo-400 focus:outline-none focus:border-indigo-400 focus:shadow-outline-indigo active:bg-indigo-400 transition duration-150 ease-in-out">
                            Create account <span class="ml-1">&rarr;</span>
                        </button>
                    </div>
                </form>

                <div class="mt-6 text-sm">
                    <span class="text-gray-600">Already have an account?</span> <a href="{{ route('login') }}">{{ __('log in') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
