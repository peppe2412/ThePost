<nav class="bg-white border-gray-200 shadow">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <h4 class="text-5xl mb-4">The Post</h4>
        <div class="w-full py-8">
            <form action="{{ route('article-search') }}" method="GET">
                @csrf
                <div class="flex justify-center">
                    <input class="bg-white rounded-s-xl p-4 w-[700px] border border-gray-700" name="query" type="search"
                        placeholder="Cerca articolo">
                    <button class="bg-white rounded-e-xl w-[70px] p-4 cursor-pointer border border-gray-700"
                        type="submit"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="size-7">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                        </svg>
                    </button>
                </div>
            </form>
        </div>
        <div class="text-sm w-full md:text-lg md:block md:w-auto mt-7" id="navbar-default">
            <ul
                class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white">
                <li>
                    <a href="{{ route('home') }}" class="text-lg h-14 flex items-center tw-hover-underline-nav"
                        aria-current="page">Home</a>
                </li>
                <li>
                    <a href="{{ route('article-index') }}"
                        class="h-14 flex items-center text-lg tw-hover-underline-nav">Articoli</a>
                </li>
                @guest
                    <button command="show-modal" commandfor="dialog"
                        class="cursor-pointer rounded-2xl p-2 hover:bg-gray-200 text-lg">Accedi
                        | Registrati</button>
                    <el-dialog>
                        <dialog id="dialog" aria-labelledby="dialog-title"
                            class="fixed inset-0 size-auto max-h-none max-w-none overflow-y-auto bg-transparent backdrop:bg-transparent">
                            <el-dialog-backdrop
                                class="fixed inset-0 bg-gray-500/75 transition-opacity data-closed:opacity-0 data-enter:duration-300 data-enter:ease-out data-leave:duration-200 data-leave:ease-in"></el-dialog-backdrop>

                            <div tabindex="0"
                                class="flex min-h-full items-end justify-center text-center focus:outline-none sm:items-center sm:p-0">
                                <el-dialog-panel
                                    class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all data-closed:translate-y-4 data-closed:opacity-0 data-enter:duration-300 data-enter:ease-out data-leave:duration-200 data-leave:ease-in sm:my-8 sm:w-full sm:max-w-lg data-closed:sm:translate-y-0 data-closed:sm:scale-95">
                                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                        <div class="sm:flex sm:items-start">
                                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                                <div class="flex justify-end">
                                                    <button type="button" command="close" commandfor="dialog"
                                                        class="mb-4 cursor-pointer hover:bg-gray-100 p-[5px]"><svg
                                                            xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="size-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M6 18 18 6M6 6l12 12" />
                                                        </svg>
                                                    </button>
                                                </div>
                                                <img class="rounded-2xl"
                                                    src="https://blog-cdn.reedsy.com/directories/admin/attachments/large_how-to-become-a-writer-use-writing-tools-e95662.jpg"
                                                    alt="">
                                                <h3 id="dialog-title" class="text-4xl text-center mb-10 mt-4">
                                                    Iscriviti ed inizia a pubblicare i tuoi post!</h3>
                                                <div class="text-center mb-4">
                                                    <a class="border border-black p-2 rounded google-auth hover:border-none"
                                                        href="{{ route('google-redirect') }}">
                                                        <i class="fa-brands fa-google"></i> Accedi con Google
                                                    </a>
                                                </div>
                                                <div class="text-center mb-4">
                                                    <a href="{{ route('github-redirect') }}">Accedi con GitHub</a>
                                                </div>
                                                <div class="flex items-center gap-2 mb-5 mt-7">
                                                    <hr class="flex-grow">
                                                    <span class="text-sm">Oppure</span>
                                                    <hr class="flex-grow">
                                                </div>
                                                <div class="text-xl text-center">
                                                    <p>Iscriviti tramite <a class=" hover:underline text-sky-500"
                                                            href="{{ route('register') }}">email</a></p>
                                                    <p>Hai già un account? <a class=" hover:underline text-sky-500"
                                                            href="{{ route('login') }}">Accedi</a></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </el-dialog-panel>
                            </div>
                        </dialog>
                    </el-dialog>
                @endguest
                @auth
                    @if (Auth::user()->is_writer)
                        <li>

                            <a href="{{ route('create-article') }}"
                                class="text-lg h-14 flex items-center tw-hover-underline-nav">Inserisci
                                Articolo</a>

                        </li>
                    @endif
                    <li class="relative">
                        <button id="dropdown-btn" onclick="toggleDropdown()"
                            class="text-lg h-14 flex items-center cursor-pointer">
                            Ciao, {{ Auth::user()->name }}
                        </button>
                        <div id="dropdown"
                            class="hidden absolute right-0 mt-2 w-40 py-2 bg-white border rounded shadow-2xl">
                            <div class="text-center text-lg">
                                {{-- <a href="" class="block mb-1 tw-dropdown-auth">Area riservata</a> --}}
                                @if (Auth::user()->is_admin)
                                    <a href="{{ route('admin-dashboard') }}" class="block mb-1 tw-dropdown-auth">Area
                                        riservata</a>
                                    <hr class="mb-2 mt-2">
                                @endif
                                @if (Auth::user()->is_revisor)
                                    <a href="{{ route('revisor-dashboard') }}" class="block mb-1 tw-dropdown-auth">Area
                                        riservata</a>
                                    <hr class="mb-2 mt-2">
                                @endif
                                @if (Auth::user()->is_writer)
                                    <a href="{{ route('writer-dashboard') }}" class="block mb-1 tw-dropdown-auth">Area
                                        riservata</a>
                                    <hr class="mb-2 mt-2">
                                @endif
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
