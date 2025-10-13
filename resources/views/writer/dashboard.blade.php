<x-dashboards-layout :title="$title">


    <header class="container py-5 fs-main">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <h1 class="display-3 text-center"><x-greeting-by-time /> {{ Auth::user()->name }}</h1>
            </div>
            <div class="d-flex justify-content-center mt-4 mb-4">
                <a href="{{ route('create-article') }}" class="btn btn-outline-info">Inserisci articolo</a>
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
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-12 col-md-12 col-lg-12">
                    <h2 class="text-center mb-5">
                        Articoli in attesa di revisione
                    </h2>
                    @if ($unrevisorArticles->isNotEmpty())
                        <x-writer-articles-table :articles="$unrevisorArticles" />
                    @else
                        <p class="text-center">Non ci sono articoli in revisione</p>
                    @endif
                </div>
            </div>
        </div>

        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-12 col-md-12 col-lg-12">
                    <h2 class="text-center mb-5">
                        Articoli pubblicati
                    </h2>
                    @if ($acceptArticles->isNotEmpty())
                        <x-writer-articles-table :articles="$acceptArticles" />
                    @else
                        <p class="text-center">Non ci sono ancora articoli pubblicati da te</p>
                    @endif
                </div>
            </div>
        </div>

        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-12 col-md-12 col-lg-12">
                    <h2 class="text-center mb-5">
                        Articoli respinti
                    </h2>
                    @if ($rejectArticles->isNotEmpty())
                        <x-writer-articles-table :articles="$rejectArticles" />
                    @else
                        <p class="text-center">Non sono presenti articoli respinti</p>
                    @endif
                </div>
            </div>
        </div>
    </main>

</x-dashboards-layout>
