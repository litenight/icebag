@extends('layouts.master', ['bgcolor' => 'bg-gray-100'])

@section('body')
    @include('layouts.partials._header')

    <main role="main">
        @yield('content')
    </main>

    @include('layouts.partials._footer')

    @if (session()->has('message'))
        @include('layouts.partials._alert')
    @endif
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            $(".date_picker").flatpickr({
                dateFormat: 'Y-m-d',
                altInput: true,
                altFormat: 'j M Y',
                ariaDateFormat: 'Y-m-d',
            });
        });
    </script>
@endpush
