@extends('layouts.app')

@section('content')
<section class="py-12">
    <form class="container" action="{{ route('users.update', $user) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row mb-6 justify-center">
            <div class="col-12">
                <div>
                    <h4 class="text-2xl font-semibold">
                        Account Settings
                    </h4>

                    <p class="text-sm text-gray-500">
                        Customize your experience here at {{ config('app.name') }}.
                    </p>
                </div>

                <hr class="mt-6">
            </div>
        </div>

        <div class="row mb-6">
            <div class="col-lg-4">
                <div class="mb-6">
                    <h4 class="text-xl font-semibold">
                        Profile
                    </h4>

                    <p class="text-sm text-gray-500">
                        This information will be displayed publicly so be careful what you share.
                    </p>
                </div>
            </div>

            <div class="col-lg-7 offset-lg-1">
                <div class="shadow bg-white rounded-lg px-4 py-5 sm:px-6">
                    <div class="mb-6">
                        <label for="username" class="block">
                            <span class="text-sm mb-2 font-semibold">{{ __('Username') }}</span>

                            <input id="username" type="text" class="form-input mt-1 block w-full @error('username') is-invalid @enderror" name="username" value="{{ old('username') ?? ($user->username ?? null) }}" required autocomplete="username" placeholder="{{ ltrim(url('/user'), 'http://') . '/johndoe' }}">
                        </label>

                        @error('username')
                            <span class="text-sm block mt-2 text-red-500" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="about" class="block">
                            <span class="text-sm mb-2 font-semibold">{{ __('About') }}</span>

                            <textarea id="about" class="form-textarea mt-1 block w-full @error('about') is-invalid @enderror" name="about" rows="3">{{ old('about') ?? ($user->about ?? null) }}</textarea>
                        </label>

                        <span class="text-sm block mt-2 text-gray-500" role="alert">
                            Write a few sentences about yourself.
                        </span>
                    </div>

                    <div class="mb-6">
                        <div>
                            <label for="avatar" class="block mb-2">
                                <span class="text-sm font-semibold">{{ __('Photo') }}</span>
                            </label>

                            <button class="btn text-sm bg-white hover:bg-gray-100 text-gray-800">Change</button>
                        </div>

                        @error('avatar')
                            <span class="text-sm block mt-2 text-red-500" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-6">
            <div class="col-lg-4">
                <div class="mb-6">
                    <h4 class="text-xl font-semibold">
                        Personal Information
                    </h4>

                    <p class="text-sm text-gray-500">
                        Use a permanent address where you can recieve mail.
                    </p>
                </div>
            </div>

            <div class="col-lg-7 offset-lg-1">
                <div class="shadow bg-white rounded-lg px-4 py-5 sm:px-6">
                    <div class="row mb-6">
                        <div class="col-md-6">
                            <label for="first_name" class="block">
                                <span class="text-sm mb-2 font-semibold">{{ __('First name') }}</span>

                                <input id="first_name" type="text" class="form-input mt-1 block w-full @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') ?? ($user->first_name ?? null) }}" required autocomplete="first_name" placeholder="John">
                            </label>

                            @error('first_name')
                                <span class="text-sm block mt-2 text-red-500" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="last_name" class="block">
                                <span class="text-sm mb-2 font-semibold">{{ __('Last name') }}</span>

                                <input id="last_name" type="text" class="form-input mt-1 block w-full @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') ?? ($user->last_name ?? null) }}" required autocomplete="last_name" placeholder="Doe">
                            </label>

                            @error('last_name')
                                <span class="text-sm block mt-2 text-red-500" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-6">
                        <div class="col-md-6">
                            <label for="email" class="block">
                                <span class="text-sm mb-2 font-semibold">{{ __('Email address') }}</span>

                                <input id="email" type="email" class="form-input mt-1 block w-full @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? ($user->email ?? null) }}" required autocomplete="email" placeholder="John">
                            </label>

                            @error('email')
                                <span class="text-sm block mt-2 text-red-500" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-6">
                        <div class="col-md-6">
                            <label for="country" class="block">
                                <span class="text-sm mb-2 font-semibold">{{ __('Country / Region') }}</span>

                                <select id="country" name="country" class="form-select block w-full mt-1">
                                    <option>Option 1</option>
                                    <option>Option 2</option>
                                </select>
                            </label>

                            @error('country')
                                <span class="text-sm block mt-2 text-red-500" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-6">
                        <div class="col-12">
                            <label for="street" class="block">
                                <span class="text-sm mb-2 font-semibold">{{ __('Street address') }}</span>

                                <input id="street" type="text" class="form-input mt-1 block w-full @error('street') is-invalid @enderror" name="street" value="{{ old('street') ?? ($user->street ?? null) }}" required autocomplete="street">
                            </label>

                            @error('street')
                                <span class="text-sm block mt-2 text-red-500" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-6">
                        <div class="col-md-4">
                            <label for="city" class="block">
                                <span class="text-sm mb-2 font-semibold">{{ __('City') }}</span>

                                <input id="city" type="text" class="form-input mt-1 block w-full @error('city') is-invalid @enderror" name="city" value="{{ old('city') ?? ($user->city ?? null) }}" required autocomplete="city">
                            </label>

                            @error('city')
                                <span class="text-sm block mt-2 text-red-500" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label for="state" class="block">
                                <span class="text-sm mb-2 font-semibold">{{ __('State / Province') }}</span>

                                <input id="state" type="text" class="form-input mt-1 block w-full @error('state') is-invalid @enderror" name="state" value="{{ old('state') ?? ($user->state ?? null) }}" required autocomplete="state">
                            </label>

                            @error('state')
                                <span class="text-sm block mt-2 text-red-500" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label for="postcode" class="block">
                                <span class="text-sm mb-2 font-semibold">{{ __('ZIP / Postal') }}</span>

                                <input id="postcode" type="text" class="form-input mt-1 block w-full @error('postcode') is-invalid @enderror" name="postcode" value="{{ old('postcode') ?? ($user->postcode ?? null) }}" required autocomplete="postcode">
                            </label>

                            @error('postcode')
                                <span class="text-sm block mt-2 text-red-500" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-6">
            <div class="col-lg-4">
                <div class="mb-6">
                    <h4 class="text-xl font-semibold">
                        Notificatoins
                    </h4>

                    <p class="text-sm text-gray-500">
                        We'll always let you know about important changes, but you pick what else you want to hear about.
                    </p>
                </div>
            </div>

            <div class="col-lg-7 offset-lg-1">
                <div class="shadow bg-white rounded-lg px-4 py-5 sm:px-6">
                    <div class="mb-6">
                        <h5 class="text-lg">
                            By Email
                        </h5>
                    </div>

                    <div>
                        <div class="flex mb-6">
                            <label class="flex items-start">
                                <input type="checkbox" class="form-checkbox h-5 w-5 mr-4 text-indigo-500">

                                <div>
                                    <div class="font-semibold">Invites</div>

                                    <div class="text-gray-600 text-sm">
                                        Get notified when you are invitedt to get involved in a project.
                                    </div>
                                </div>
                            </label>
                        </div>

                        <div class="flex mb-6">
                            <label class="flex items-start">
                                <input type="checkbox" class="form-checkbox h-5 w-5 mr-4 text-indigo-500">

                                <div>
                                    <div class="font-semibold">Notes</div>

                                    <div class="text-gray-600 text-sm">
                                        Get notified when someone posts a note on a project you are involved in.
                                    </div>
                                </div>
                            </label>
                        </div>

                        <div class="flex mb-6">
                            <label class="flex items-start">
                                <input type="checkbox" class="form-checkbox h-5 w-5 mr-4 text-indigo-500">

                                <div>
                                    <div class="font-semibold">Mentions</div>

                                    <div class="text-gray-600 text-sm">
                                        Get notified when someone mentions your name on the chat.
                                    </div>
                                </div>
                            </label>
                        </div>
                    </div>

                    <div class="mb-6">
                        <h5 class="text-lg">
                            Push Notification
                        </h5>

                        <p class="text-sm text-gray-500">
                            These are delivered via zenworks app.
                        </p>
                    </div>

                    <div>
                        <label class="flex items-center mb-6">
                            <input type="radio" class="form-radio text-indigo-500 h-5 w-5" name="accountType" value="personal">
                            <span class="ml-4 font-semibold">Everything</span>
                        </label>

                        <label class="flex items-center mb-6">
                            <input type="radio" class="form-radio text-indigo-500 h-5 w-5" name="accountType" value="personal">
                            <span class="ml-4 font-semibold">Same as email</span>
                        </label>

                        <label class="flex items-center mb-6">
                            <input type="radio" class="form-radio text-indigo-500 h-5 w-5" name="accountType" value="personal">
                            <span class="ml-4 font-semibold">No push notifications</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="flex items-center justify-end">
                    <a href="{{ url()->previous() }}" class="mr-4 btn bg-white hover:bg-gray-100 focus:bg-gray-100 active:bg-gray-100 text-gray-800 hover:text-gray-800 focus:text-gray-800">Cancel</a>

                    <button type="submit" class="btn">Save changes</button>
                </div>
            </div>
        </div>
    </form>
</section>
@endsection
