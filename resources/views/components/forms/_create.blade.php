<form class="shadow-lg rounded-lg overflow-hidden" action="{{ route('tickets.store') }}" method="POST">
    <div class="bg-white px-4 py-5 sm:px-6">
        <div class="flex justify-between items-center">
            <div class="max-w-sm text-xs text-gray-600">
                <span class="text-indigo-500 text-xl">*</span>Choose a priority that best suites your problem but please reserve "High" priority option for real emergencies.
            </div>

            <label class="block" for="priority_id">
                <select class="form-select" name="priority_id" id="priority_id">
                    @foreach ($priorities as $priority)
                        <option value="{{ $priority->id }}">{{ $priority->title }}</option>
                    @endforeach
                </select>
            </label>
        </div>
    </div>

    <div class="bg-white px-4 py-5 sm:px-6">
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

        <div class="row">
            <div class="col-lg-6 mb-6">
                <label for="email" class="block">
                    <span class="text-sm mb-2 font-semibold">{{ __('Email address') }}</span>

                    <input id="email" type="email" class="form-input mt-1 block w-full @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="john.doe@somemail.com">
                </label>

                @error('email')
                    <span class="text-sm block mt-2 text-red-500" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <div class="col-lg-6 mb-6">
                <label for="phone" class="block">
                    <span class="text-sm mb-2 font-semibold">{{ __('Phone number') }}</span>

                    <input id="phone" type="tel" class="form-input mt-1 block w-full @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" placeholder="07xxxxxxxx">
                </label>

                @error('phone')
                    <span class="text-sm block mt-2 text-red-500" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>
        </div>

        <div class="mb-6">
            <label for="subject" class="block">
                <span class="text-sm mb-2 font-semibold">{{ __('Subject') }}</span>

                <input id="subject" type="subject" class="form-input mt-1 block w-full @error('subject') is-invalid @enderror" name="subject" value="{{ old('subject') }}" required autocomplete="subject">
            </label>

            @error('subject')
                <span class="text-sm block mt-2 text-red-500" role="alert">
                    {{ $message }}
                </span>
            @enderror
        </div>

        <div class="mb-6">
            <label for="subject" class="block">
                <span class="text-sm mb-2 font-semibold">{{ __('Problem description') }}</span>

                <textarea class="mt-1 form-textarea w-full block" name="description" id="description" rows="7" placeholder="Descripbe your problem..."></textarea>
            </label>

            @error('subject')
                <span class="text-sm block mt-2 text-red-500" role="alert">
                    {{ $message }}
                </span>
            @enderror
        </div>

        <div class="mb-0 flex justify-between items-center">
            <button type="submit" class="w-full inline-block py-2 px-4 border border-transparent font-medium rounded-lg text-white bg-indigo-500 hover:bg-indigo-400 focus:outline-none focus:border-indigo-400 focus:shadow-outline-indigo active:bg-indigo-400 transition duration-150 ease-in-out">
                Submit
            </button>
        </div>
    </div>
</form>
