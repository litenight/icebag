@extends('layouts.web')

@section('content')
    <section class="pt-12 pb-64 bg-gray-800">
        <div class="container">
            <div class="flex flex-col items-center justify-center">
                <h2 class="text-2xl font-bold leading-7 text-white sm:text-3xl sm:leading-9  text-center">
                    Open New Support Ticket
                </h2>

                <div class="mt-1 flex flex-col max-w-lg">
                    <div class="mt-2 flex items-center text-gray-500 font-semibold sm:mr-6 text-center">
                        Do you have a question or problem? The support ticket system allows us to respond to your inquiries. Submit a ticket and we will get back to you ASAP!
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-12 -mt-64">
        <div class="container">
            <div class="row justify-center">
                <div class="col-lg-9">
                    @include('components.forms._create')
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        <a href="#" role="buttom" data-toggle="modal" data-target="#exampleModal">Already submitted a ticket?</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <finder route="{{ route('tickets.find') }}"></finder>
@endsection
