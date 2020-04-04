@extends('layouts.web')

@section('content')
    <section class="pt-12 pb-64 bg-gray-800">
        <div class="container">
            <div class="row justify-center">
                <div class="col-lg-7 text-center">
                    <h2 class="text-2xl font-bold leading-7 text-white sm:text-3xl sm:leading-9  text-center">
                        Successfully submitted ticket!
                    </h2>

                    <div class="mt-6 flex items-center text-gray-500 font-semibold sm:mr-6 text-center">
                        Your problem has been taken into consideration, one of our support agents will get back to you with a sollution pronto!
                    </div>

                    <div class="mt-6 text-gray-500 font-semibold sm:mr-6 text-center">
                        Meanwhile you can check you ticket status <a href="{{ $link }}">here</a>. An email including these details has been mailed to your email address.
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
