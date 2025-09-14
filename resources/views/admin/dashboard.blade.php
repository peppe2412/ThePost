<x-layout>

    <header class="flex justify-center py-16">
        <h1 class="text-6xl"><x-greeting-by-time/> {{ Auth::user()->name }}</h1>
    </header>

    @if (session('message'))
        <div class="bg-green-300">
            {{ session('message') }}
        </div>
    @endif

    <div class="container">
        <div class="flex justify-center">
            <h2>
                Richieste Amministratore
            </h2>
            <x-request-table :roleRequests="$adminRequests" role="admin" />
        </div>
    </div>

    <div class="container">
        <div class="flex justify-center">
            <h2>
                Richieste Revisore
            </h2>
            <x-request-table :roleRequests="$revisorRequests" role="revisor" />
        </div>
    </div>

    <div class="container">
        <div class="flex justify-center">
            <h2>
                Richieste Redattore
            </h2>
            <x-request-table :roleRequests="$writerRequests" role="writer" />
        </div>
    </div>

</x-layout>
