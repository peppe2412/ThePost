<x-dashboards-layout>

    <div class="container py-5">
        <div class="row">
            <div class="col-12 col-md-3">
                <a class="btn btn-info fs-5 text-uppercase fw-bold" href="{{ route('home') }}">
                    <span><i class="bi bi-arrow-left"></i></span> Torna alla home</a>
            </div>
        </div>
    </div>

    <header class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <h1 class="display-3 text-center"><x-greeting-by-time /> {{ Auth::user()->name }}</h1>
            </div>
        </div>
    </header>

    @if (session('message'))
        <div class="alert alert-success w-50">
            {{ session('message') }}
        </div>
    @endif

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <h2 class="text-center mb-5">
                    Richieste Amministratore
                </h2>
                @if ($adminRequests->isNotEmpty())
                    <x-request-table :roleRequests="$adminRequests" role="admin" />
                @else
                    <p class="text-center">Non ci sono candidature al momento</p>
                @endif
            </div>
        </div>
    </div>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <h2 class="text-center mb-5">
                    Richieste Revisore
                </h2>
                @if ($revisorRequests->isNotEmpty())
                    <x-request-table :roleRequests="$revisorRequests" role="revisor" />
                @else
                    <p class="text-center">Non ci sono candidature al momento</p>
                @endif
            </div>
        </div>
    </div>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <h2 class="text-center mb-5">
                    Richieste Redattore
                </h2>
                @if ($writerRequests->isNotEmpty())
                    <x-request-table :roleRequests="$writerRequests" role="writer" />
                @else
                    <p class="text-center">Non ci sono candidature al momento</p>
                @endif
            </div>
        </div>
    </div>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">
                <h2 class="text-center mb-5">
                    Tag
                </h2>
                <x-metainfo-table :metaInfos="$tags" role="tags" />
            </div>
        </div>
    </div>

    <div class="container py-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">
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
    </div>

</x-dashboards-layout>
