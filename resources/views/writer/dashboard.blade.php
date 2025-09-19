<x-layout>

    <header class="container py-24">
        <h1 class="text-6xl block text-center"><x-greeting-by-time /> {{ Auth::user()->name }}</h1>
        <div class="flex justify-center mt-10">
            <a href="{{ route('create-article') }}"
                class="bg-blue-400 text-white p-1 font-bold rounded hover:bg-blue-600">Inserisci articolo</a>
        </div>
    </header>

    @if (session('message'))
        <div class="bg-green-400">
            {{ session('message') }}
        </div>
    @endif


    <div class="container mt-10">
        <div class="flex flex-col">
            <h2 class="text-center text-2xl mb-10">
                Articoli in attesa di revisione
            </h2>
            <x-writer-articles-table :articles="$unrevisorArticles" />
        </div>
    </div>

    <div class="container mt-10">
        <div class="flex flex-col">
            <h2 class="text-center text-2xl mb-10">
                Articoli pubblicati
            </h2>
            <x-writer-articles-table :articles="$acceptArticles" />
        </div>
    </div>

    <div class="container mt-10">
        <div class="flex flex-col">
            <h2 class="text-center text-2xl mb-10">
                Articoli respinti
            </h2>
            <x-writer-articles-table :articles="$rejectArticles" />
        </div>
    </div>

</x-layout>
