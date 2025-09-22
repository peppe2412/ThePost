<x-layout>

    <header class="flex justify-center py-16">
        <h1 class="text-6xl"><x-greeting-by-time /> {{ Auth::user()->name }}</h1>
    </header>

    @if (session('message'))
        <div class="flex justify-center py-8">
            <div class="tw-message-span">
                {{ session('message') }}
            </div>
        </div>
    @endif

    <div class="container mt-10">
        <div class="flex flex-col">
            <h2 class="text-center text-2xl mb-10">
                Articoli da revisionare
            </h2>
            <x-articles-table :articles="$unrevisorArticles" />
        </div>
    </div>

    <div class="container mt-10">
        <div class="flex flex-col">
            <h2 class="text-center text-2xl mb-10">
                Articoli pubblicati
            </h2>
            <x-articles-table :articles="$acceptArticles" />
        </div>
    </div>

    <div class="container mt-10">
        <div class="flex flex-col">
            <h2 class="text-center text-2xl mb-10">
                Articoli respinti
            </h2>
            <x-articles-table :articles="$rejectArticles" />
        </div>
    </div>

</x-layout>
