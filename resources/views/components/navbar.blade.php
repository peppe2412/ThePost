<nav class="bg-white border-gray-200 dark:bg-gray-900">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Flowbite</span>
        </a>
        <div class="w-full py-8">
            <form action="{{ route('article-search') }}" method="GET">
                @csrf
                <div class="flex justify-center">
                    <input class="bg-white rounded-s-xs p-2 w-[400px] border border-gray-700" name="query" type="search" placeholder="Cerca articolo">
                    <button class="bg-white rounded-e-xs p-2 cursor-pointer border border-gray-700" type="submit">Cerca</button>
                </div>
            </form>
        </div>
        <div class="text-sm w-full md:text-lg md:block md:w-auto mt-7" id="navbar-default">
            <ul
                class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li>
                    <a href="{{ route('home') }}"
                        class="block py-2 px-3 text-white bg-blue-700 rounded-sm md:bg-transparent md:text-blue-700 md:p-0 dark:text-white md:dark:text-blue-500"
                        aria-current="page">Home</a>
                </li>
                <li>
                    <a href="{{ route('article-index') }}"
                        class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Articoli</a>
                </li>
                @guest
                    <li>
                        <a href="{{ route('register') }}"
                            class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Registrati</a>
                    </li>
                    <li>
                        <a href="{{ route('login') }}"
                            class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Accedi</a>
                    </li>
                @endguest
                <li>
                    <a href="#"
                        class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Pricing</a>
                </li>
                <li>
                    <a href="#"
                        class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Contact</a>
                </li>
                @auth
                    @if (Auth::user()->is_writer)
                        <li>

                            <a href="{{ route('create-article') }}"
                                class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Inserisci
                                Articolo</a>

                        </li>
                    @endif
                    <li class="relative">
                        <button id="dropdown-btn" onclick="toggleDropdown()"
                            class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">
                            Ciao, {{ Auth::user()->name }}
                        </button>
                        <div id="dropdown"
                            class="hidden absolute right-0 mt-2 w-40 py-2 bg-white border rounded shadow-2xl">
                            <div class="text-center text-lg">
                                {{-- <a href="" class="block mb-1 tw-dropdown-auth">Area riservata</a> --}}
                                @if (Auth::user()->is_admin)
                                    <a href="{{ route('admin-dashboard') }}" class="block mb-1 tw-dropdown-auth">Area
                                        riservata</a>
                                @endif
                                @if (Auth::user()->is_revisor)
                                    <a href="{{ route('revisor-dashboard') }}" class="block mb-1 tw-dropdown-auth">Area
                                        riservata</a>
                                @endif
                                @if (Auth::user()->is_writer)
                                    <a href="{{ route('writer-dashboard') }}" class="block mb-1 tw-dropdown-auth">Area
                                        riservata</a>
                                @endif
                                <a href="" class="block tw-dropdown-auth">Qualcosa</a>
                                <hr class="mb-2 mt-2">
                                <a href="" class="logout"
                                    onclick="event.preventDefault(); document.querySelector('#logout').submit();">Logout</a>
                                <form action="{{ route('logout') }}" method="POST" id="logout">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
