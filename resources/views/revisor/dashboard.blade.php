<x-layout>

    <header class="flex justify-center py-16">
        <h1 class="text-6xl"><x-greeting-by-time/> {{ Auth::user()->name }}</h1>
    </header>

   @if (session('message'))
       <div class="bg-green-400">
            {{ session('message') }}
       </div>
   @endif

    <div class="container mt-10">
        <div class="flex flex-col">
            <h2 class="text-center text-2xl mb-10">
                Articoli da revisionare
            </h2>
            <x-articles-table :articles="$unserevisorArticles" />
        </div>
    </div>

    <div class="container mt-10">
        <div class="flex flex-col">
            <h2 class="text-center text-2xl mb-10">
                Articoli pubblicati
            </h2>
            <x-articles-table :articles="$acceptedArticles"/>
        </div>
    </div>

    <div class="container mt-10">
        <div class="flex flex-col">
            <h2 class="text-center text-2xl mb-10">
                Articoli respinti
            </h2>
            <x-articles-table :articles="$refuseArticles"/>
        </div>
    </div>

</x-layout>
