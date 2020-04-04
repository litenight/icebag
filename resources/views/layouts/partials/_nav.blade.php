<nav>
    <div class="container">
        <div class="max-w-7xl mx-auto">
            <div class="border-b border-gray-700">
                <div class="flex items-center justify-between h-16 px-4 sm:px-0">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <a href="/" class="block h-8">
                                <img class="h-8 w-auto" src="{{ asset('img/logo.png') }}" alt="{{ config('app.name') }}">
                            </a>
                        </div>
                    </div>

                    <div class="block">
                        <div class="ml-4 flex items-center md:ml-6">
                            @auth
                                <div class="dropdown ml-6 relative">
                                    <button class="dropdown-toggle max-w-xs flex items-center text-sm rounded-full focus:outline-none focus:shadow-solid-white transition ease-in-out duration-150" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img class="h-8 w-8 rounded-full" src="{{ asset('img/avatars/default.svg') }}" alt="{{ user('username') }}">
                                    </button>

                                    <div class="dropdown-menu dropdown-menu-right w-48 rounded-lg shadow-lg mt-2 border-none"  aria-labelledby="dropdownMenuLink">
                                        <a href="#" class="whitespace-no-wrap block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-700 focus:text-gray-700 transition ease-in-out duration-150">
                                            Settings <span class="text-xs text-gray-500">(Disabled)</span>
                                        </a>

                                        <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-700 focus:text-gray-700 transition ease-in-out duration-150" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        {{ __('Sign out') }}</a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            @else
                                <a href="{{ route('login') }}" class="{{ is_active('login', 'bg-gray-900') }} ml-4 px-3 py-2 rounded-lg text-sm font-medium text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 transition ease-in-out duration-150">Sign in</a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
