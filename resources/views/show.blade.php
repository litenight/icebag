@extends('layouts.app')

@section('content')
    <section class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div>
                        <div>
                            <span class="relative inline-block px-3 py-1 font-semibold text-{{ $ticket->status == 'Open' ? 'green' : 'red' }}-800 leading-tight">
                                <span aria-hidden="" class="absolute inset-0 bg-{{ $ticket->status == 'Open' ? 'green' : 'red' }}-200 opacity-50 rounded-full"></span>
                                <span class="relative">{{ $ticket->status }}</span>
                            </span>
                        </div>

                        <div class="flex justify-between items-start">
                            <h2 class="text-4xl font-semibold text-gray-800">
                                {{ $ticket->subject }}
                            </h2>

                            @auth
                                <div class="dropdown">
                                    <button class="dropdown-toggle inline-block text-gray-500 hover:text-gray-700" id="bookDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <button class="btn bg-gray-200 text-gray-800 hover:text-gray-800 hover:bg-gray-200 focus:text-gray-800 focus:bg-gray-200 dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Options
                                        </button>
                                    </button>

                                    <div class="dropdown-menu dropdown-menu-right w-48 rounded-lg shadow-lg mt-2 border-none"  aria-labelledby="bookDropdown">
                                        @if ($ticket->status === 'Open')
                                            <a href="{{ route('tickets.update', ['priority' => $ticket->priority->slug, 'ticket' => $ticket, 'status' => 'Close']) }}" class="whitespace-no-wrap block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-700 focus:text-gray-700 transition ease-in-out duration-150">Close</a>
                                        @else
                                            <a href="{{ route('tickets.update', ['priority' => $ticket->priority->slug, 'ticket' => $ticket, 'status' => 'Open']) }}" class="whitespace-no-wrap block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-700 focus:text-gray-700 transition ease-in-out duration-150">Open</a>
                                        @endif

                                        <a href="#" class="whitespace-no-wrap block px-4 py-2 text-sm text-red-700 hover:bg-gray-100 hover:text-red-700 focus:text-red-700 transition ease-in-out duration-150" data-toggle="modal" data-target="#deleteModal{{ $ticket->id }}">Delete</a>
                                    </div>
                                </div>
                            @endauth
                        </div>

                        <div class="flex items-center text-sm">
                            @auth
                                <span class="text-gray-600">
                                    <a href="{{ route('home') }}" class="font-medium">
                                        <span>&larr;</span> Back to tickets list
                                    </a>
                                </span>

                                <span class="mx-2 font-bold">&middot;</span>
                            @endauth

                            <span class="flex items-center py-1 rounded-lg">
                                <span class="h-3 w-3 bg-red-500 mr-2 rounded-full overflow-hidden"></span>
                                <span class="text-red-800">{{ $ticket->priority->title }} priority</span>
                            </span>

                            <span class="mx-2 font-bold">&middot;</span>

                            <span class="text-gray-600">
                                Last updated <span class="font-medium text-gray-700">{{ $ticket->updated_at->format('M j, Y') }}</span>
                            </span>

                            <span class="mx-2 font-bold">&middot;</span>

                            <span class="text-gray-600">
                                Agent assigned <span class="font-medium text-gray-700">{{ $ticket->user->name }}</span>
                            </span>
                        </div>

                        <div class="mt-6">
                            <div class="font-bold text-lg text-gray-700">
                                {{ $ticket->customer->name }} <span class="text-sm text-gray-500 ml-2">{{ $ticket->created_at->diffForHumans() }}</span>
                            </div>

                            <div class="text-sm">
                                <a href="mailto:{{ $ticket->customer->email }}">{{ $ticket->customer->email }}</a>
                                <span class="ml-1">(<span class="font-semibold">Tel:</span> {{ $ticket->customer->phone }})</span>
                            </div>

                            <p class="mt-4 text-xl">
                                {{ $ticket->description }}
                            </p>
                        </div>
                    </div>

                    <div class="mt-10">
                        <form action="{{ route('messages.store', ['ticket' => $ticket->uid]) }}" method="POST">
                            @csrf

                            <input type="hidden" name="{{ auth()->check() ? 'user_id' : 'customer_id' }}" value="{{ auth()->check() ? user('id') : $ticket->customer->id }}">

                            <div class="mb-6">
                                <label for="subject" class="block">
                                    <textarea class="mt-1 form-textarea w-full block bg-white border-2 border-gray-300" name="description" id="description" rows="5" placeholder="Type here to reply..."></textarea>
                                </label>

                                @error('subject')
                                    <span class="text-sm block mt-2 text-red-500" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-0 flex justify-between items-center">
                                <button type="submit" class="text-sm inline-block py-2 px-4 border border-transparent font-medium rounded-lg text-white bg-indigo-500 hover:bg-indigo-400 focus:outline-none focus:border-indigo-400 focus:shadow-outline-indigo active:bg-indigo-400 transition duration-150 ease-in-out">
                                    Post reply
                                </button>
                            </div>
                        </form>
                    </div>

                    <div class="mt-20 pl-10 border-l-4 border-gray-300">
                        <div>
                            @forelse ($ticket->messages as $message)
                                <div class="mb-10">
                                    <div class="text-gray-700">
                                        <span class="font-bold">{{ $message->customer->name ?? $message->user->name }}</span> <span class="text-sm text-gray-500 font-medium ml-2">{{ $message->created_at->diffForHumans() }}</span>
                                    </div>

                                    <p class="mt-2">
                                        {{ $message->description }}
                                    </p>
                                </div>
                            @empty
                                <div>
                                    <p class="text-gray-500">Ticket has not been attended to yet. Please check back later.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="deleteModal{{ $ticket->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalTitle{{ $ticket->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content border-none rounded-lg">
                <div class="modal-header pl-6 border-none">
                    <h3 class="text-lg modal-title leading-6 font-medium text-gray-900" id="deleteModalTitle{{ $ticket->id }}">
                        Delete ticket
                    </h3>

                    <button type="button" class="close font-normal" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body px-6 pb-6">
                    <p class="text-sm leading-5 text-gray-600">
                        Are you sure you want to delete ticket <span class="whitespace-normal font-medium text-gray-700">{{ '#' . $ticket->uid }}</span>? All of its data will be permanantly removed. This action cannot be undone.
                    </p>
                </div>

                <div class="modal-footer border-none bg-gray-100 pr-6">
                    <button type="button" class="btn bg-white text-gray-800 hover:bg-indigo-100 hover:text-gray-800 focus:bg-indigo-100 focus:text-gray-800" data-dismiss="modal">Cancel</button>

                    <form class="inline" action="{{ route('tickets.destroy', $ticket) }}" method="POST">
                        @csrf

                        @method('DELETE')

                        <button type="submit" class="btn hover:text-white focus:text-white bg-red-500 hover:bg-red-400">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
