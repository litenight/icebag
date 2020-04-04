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
                        Reset password
                    </h2>

                    <p class="text-gray-500">
                        Enter the email address associated with your account and we'll send you a link to reset your password.
                    </p>
                </div>

                <form method="POST" action="{{ route('password.email') }}">
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

                    <div class="mt-6">
                        <button type="submit" class="w-full inline-block py-2 px-4 border border-transparent text-sm font-medium rounded-lg text-white bg-indigo-500 hover:bg-indigo-400 focus:outline-none focus:border-indigo-400 focus:shadow-outline-indigo active:bg-indigo-400 transition duration-150 ease-in-out">
                            Request password reset link <span class="ml-1">&rarr;</span>
                        </button>
                    </div>
                </form>

                <div class="my-6 text-sm">
                    <span class="text-gray-600">Wan't to try and <a href="{{ route('login') }}">{{ __('log in') }}</a>?</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
