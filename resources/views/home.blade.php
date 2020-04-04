@extends('layouts.app')

@section('content')
<section class="pt-12 pb-64 bg-gray-800">
    <div class="container">
        <div class="flex items-center justify-between">
            <div class="flex-1 min-w-0">
                <h2 class="text-2xl font-bold leading-7 text-white sm:text-3xl sm:leading-9  ">
                    Dashboard
                </h2>

                <div class="mt-1 flex flex-col max-w-sm">
                    <div class="mt-2 flex items-center text-gray-500 font-semibold sm:mr-6">
                        Welcome, {{ user('name') }}
                    </div>
                </div>
            </div>

            <div class="mt-5 flex lg:mt-0 lg:ml-4">
                <a href="#" class="btn hover:text-white focus:text-white flex items-center leading-none py-3" data-toggle="modal" data-target="#newTicket" role="button">
                    <span class="mr-1">&plus;</span> Add new ticket
                </a>
            </div>
        </div>
    </div>
</section>

<section class="py-12 -mt-64">
    <div class="container">
        <div class="row justify-center">
            <div class="col-12">
                <div class="overflow-hidden rounded-lg shadow-lg bg-white">
                    <div class="inline-block min-w-full rounded-lg overflow-auto">
                        <div class="px-5 py-3 bg-white flex items-center justify-between">
                            <div class="mr-64 flex items-center">
                                @if (request()->query() || request('priority'))
                                    <a href="{{ route('home') }}" class="mr-4 btn bg-gray-200 text-gray-800 hover:text-gray-800 hover:bg-gray-100 focus:text-gray-800 focus:bg-gray-100 dropdown-toggle">
                                        Show all
                                    </a>
                                @endif

                                <div class="dropdown">
                                    <button class="btn bg-gray-200 text-gray-800 hover:text-gray-800 hover:bg-gray-200 focus:text-gray-800 focus:bg-gray-200 dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{ ucfirst(request('priority')->title ?? null)  ?:  'All priorities' }}
                                    </button>

                                    <div class="dropdown-menu border-none rounded-lg shadow-lg" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item text-sm font-medium py-2" href="{{ route('home') }}">All priorities</a>

                                        @foreach ($priorities as $priority)
                                            <a class="dropdown-item text-sm font-medium py-2" href="{{ route('home', ['priority' => $priority->slug]) }}">{{ $priority->title }}</a>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="dropdown ml-4">
                                    <button class="btn bg-gray-200 text-gray-800 hover:text-gray-800 hover:bg-gray-200 focus:text-gray-800 focus:bg-gray-200 dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{ request('status')  ?:  'All status' }}
                                    </button>

                                    <div class="dropdown-menu border-none rounded-lg shadow-lg" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item text-sm font-medium py-2" href="{{ route('home') }}">All status</a>

                                        @foreach (['Open', 'Close'] as $status)
                                            <a class="dropdown-item text-sm font-medium py-2" href="{{ route('home', ['status' => $status]) }}">{{ $status }}</a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="w-2/5">
                                <form class="w-full flex items-center justify-between" method="GET" action="{{ route('tickets.search') }}">
                                    <div class="relative flex-1">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                                            </svg>
                                        </div>

                                        <input type="search" id="q" name="q" class="form-input w-full pl-10" placeholder="Type and hit enter to search..." value="{{ old('q') ?? request()->q }}">

                                        @if (! is_null(request()->q))
                                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                                <a href="{{ route('home') }}" class="ml-3 btn bg-transparent text-gray-800 hover:text-gray-800 hover:bg-transparent focus:text-gray-800 focus:bg-transparent px-0">
                                                    <svg fill="none" class="h-4 w-4" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                                    </svg>
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                </form>
                            </div>
                        </div>

                        <table class="min-w-full leading-normal">
                            <thead>
                                <tr>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Customer / Ticket ID
                                </th>

                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Subject / Description
                                </th>

                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Status
                                </th>

                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Last updated
                                </th>

                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100"></th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($tickets as $ticket)
                                    <tr>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <div class="flex items-center">
                                                <div>
                                                    <p class="text-indigo-500 font-semibold whitespace-no-wrap">
                                                        <a href="{{ route('home', ['customer' => $ticket->customer->id]) }}">
                                                            {{ $ticket->customer->name }}
                                                        </a>
                                                    </p>

                                                    <p class="text-gray-500 whitespace-no-wrap">
                                                        {{ $ticket->customer->email }}
                                                    </p>

                                                    <p class="mt-1 text-gray-800 font-semibold whitespace-no-wrap">
                                                        <a href="{{ $ticket->path() }}" class="text-gray-800 hover:text-gray-700">
                                                            {{ '#' . $ticket->uid }}
                                                        </a>
                                                    </p>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <p class="whitespace-no-wrap font-semibold">
                                                {{ $ticket->subject }}
                                            </p>

                                            <p class="whitespace-normal truncate text-sm text-gray-500 max-w-xs">
                                                {{ $ticket->description }}
                                            </p>

                                            <div>
                                                <span class="flex items-center py-1 rounded-lg">
                                                    <span class="h-3 w-3 bg-red-500 mr-2 rounded-full overflow-hidden"></span>
                                                    <span class="text-red-800">{{ $ticket->priority->title }}</span>
                                                </span>
                                            </div>
                                        </td>

                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <p class="whitespace-no-wrap">
                                                <span class="relative inline-block px-3 py-1 font-semibold text-{{ $ticket->status == 'Open' ? 'green' : 'red' }}-800 leading-tight">
                                                    <span aria-hidden="" class="absolute inset-0 bg-{{ $ticket->status == 'Open' ? 'green' : 'red' }}-200 opacity-50 rounded-full"></span>
                                                    <span class="relative">{{ $ticket->status }}</span>
                                                </span>
                                            </p>
                                        </td>

                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <p class="whitespace-no-wrap">{{ $ticket->updated_at->format('M j, Y') }}</p>
                                            <p class="text-gray-600 whitespace-no-wrap">{{ $ticket->updated_at->diffForHumans() }}</p>
                                        </td>

                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-right">
                                            <div class="dropdown">
                                                <button class="dropdown-toggle inline-block text-gray-500 hover:text-gray-700" id="bookDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg class="inline-block h-6 w-6 fill-current" viewBox="0 0 24 24">
                                                        <path d="M12 6a2 2 0 110-4 2 2 0 010 4zm0 8a2 2 0 110-4 2 2 0 010 4zm-2 6a2 2 0 104 0 2 2 0 00-4 0z"></path>
                                                    </svg>
                                                </button>

                                                <div class="dropdown-menu dropdown-menu-right w-48 rounded-lg shadow-lg mt-2 border-none"  aria-labelledby="bookDropdown">
                                                    <a href="{{ $ticket->path() }}" class="whitespace-no-wrap block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-700 focus:text-gray-700 transition ease-in-out duration-150">View</a>

                                                    @if ($ticket->status === 'Open')
                                                        <a href="{{ route('tickets.update', ['priority' => $ticket->priority->slug, 'ticket' => $ticket, 'status' => 'Close']) }}" class="whitespace-no-wrap block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-700 focus:text-gray-700 transition ease-in-out duration-150">Close</a>
                                                    @else
                                                        <a href="{{ route('tickets.update', ['priority' => $ticket->priority->slug, 'ticket' => $ticket, 'status' => 'Open']) }}" class="whitespace-no-wrap block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-700 focus:text-gray-700 transition ease-in-out duration-150">Open</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <div class="text-gray-600">
                                            There are no tickets opened.
                                        </div>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="px-4 pt-3 pb-5 sm:px-6">
                        <div class="row">
                            <div class="col-12">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <span class="text-gray-600">
                                            Showing {{ $tickets->firstItem() }} to {{ $tickets->lastItem() }} of {{ $tickets->total() }}
                                        </span>
                                    </div>

                                    <div>
                                        {{ $tickets->links('components.pagination.default') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="newTicket" data-backdrop="static" aria-labelledby="newTicketLabel" aria-hidden="true" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-center" role="document">
        <div class="modal-content border-none rounded-lg">
            <div class="modal-header border-none pl-6">
                <h5 class="modal-title font-semibold text-xl" id="newTicketLabel">Open New Ticket</h5>

                <button type="button" class="close font-normal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body p-0">
                @include('components.forms._create')
            </div>
        </div>
    </div>
</div>
@endsection
