<x-layouts.dashboards-layout :title="$title">

    <header class="container py-5 fs-main">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <h1 class="display-3 text-center"><x-greeting-by-time /> {{ Auth::user()->name }}</h1>
            </div>
        </div>
    </header>

    @if (session('message'))
        <div class="alert-dasboards-box">
            <div class="alert-dashboards">
                {{ session('message') }}
            </div>
        </div>
    @endif

    <main class="fs-tables">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6">
                    <h2 class="text-center mb-5">
                        Richieste Amministratore
                    </h2>
                    @if ($adminRequests->isNotEmpty())
                        <x-tables.request-table :roleRequests="$adminRequests" role="admin" />
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
                        <x-tables.request-table :roleRequests="$revisorRequests" role="revisor" />
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
                        <x-tables.request-table :roleRequests="$writerRequests" role="writer" />
                    @else
                        <p class="text-center">Non ci sono candidature al momento</p>
                    @endif
                </div>
            </div>
        </div>
    
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-12 col-md-12 col-lg-12">
                    <h2 class="text-center mb-5">
                        Tag
                    </h2>
                    <x-tables.metainfo-table :metaInfos="$tags" role="tags" />
                </div>
            </div>
        </div>
    
        <div class="container py-5 mb-5">
            <div class="row justify-content-center">
                <div class="col-12 col-md-12 col-lg-12">
                    <h2 class="text-center mb-5">
                        Categorie
                    </h2>
                    <form action="{{ route('create-category') }}" method="POST">
                        @csrf
                        <div class="mb-5">
                            <input name="name" type="text" placeholder="Inserisci nuova categoria">
                            <button type="submit" class="btn btn-primary p-1">Inserisci</button>
                            @error('name')
                                <span class="tw-form-span-message">{{ $message }}</span>
                            @enderror
                        </div>
                    </form>
                    <x-tables.metainfo-table :metaInfos="$categories" role="category" />
                </div>
            </div>
        </div>
    </main>

</x-layouts.dashboards-layout>
