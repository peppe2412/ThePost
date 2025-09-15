<x-layout>

    <header class="flex justify-center py-16">
        <h1 class="text-6xl"><x-greeting-by-time /> {{ Auth::user()->name }}</h1>
    </header>

    @if (session('message'))
        <div class="bg-green-300">
            {{ session('message') }}
        </div>
    @endif

    <div class="container py-6">
        <div class="flex flex-col">
            <h2 class="text-center mb-6">
                Richieste Amministratore
            </h2>
            <x-request-table :roleRequests="$adminRequests" role="admin" />
        </div>
    </div>

    <div class="container py-6">
        <div class="flex flex-col">
            <h2 class="text-center mb-6">
                Richieste Revisore
            </h2>
            <x-request-table :roleRequests="$revisorRequests" role="revisor" />
        </div>
    </div>

    <div class="container py-6">
        <div class="flex flex-col">
            <h2 class="text-center mb-6">
                Richieste Redattore
            </h2>
            <x-request-table :roleRequests="$writerRequests" role="writer" />
        </div>
    </div>

    <div class="container py-6">
        <div class="flex flex-col">
            <h2 class="text-center mb-6">
                Tag
            </h2>
            <x-metainfo-table :metaInfos="$tags" role="tag" />
        </div>
    </div>

    <div class="container py-6">
        <div class="flex flex-col">
            <h2 class="text-center mb-6">
                Categorie
            </h2>
            <form action="{{ route('create-category') }}" method="POST">
                @csrf
                <div class="mb-5">
                    <input name="name" type="text" placeholder="Inserisci nuova categoria">
                    <button class="submit">Inserisci</button>
                    @error('name')
                        <span class="tw-form-span-message">{{ $message }}</span>
                    @enderror
                </div>
            </form>
            <x-metainfo-table :metaInfos="$categories" role="category" />
        </div>
    </div>

</x-layout>
