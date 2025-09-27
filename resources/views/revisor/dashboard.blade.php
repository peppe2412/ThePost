<x-dashboards-layout>

    <header class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <h1 class="display-3 text-center"><x-greeting-by-time /> {{ Auth::user()->name }}</h1>
            </div>
        </div>
    </header>

    @if (session('message'))
        <div class="d-flex justify-content-center">
            <div class="alert alert-success w-25 text-center fs-5">
                {{ session('message') }}
            </div>
        </div>
    @endif

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-12">
                <h2 class="text-center mb-5">
                    Articoli da revisionare
                </h2>
                @if ($unrevisorArticles->isNotEmpty())
                    <x-articles-table :articles="$unrevisorArticles" />
                @else
                    <p class="text-center">Non sono presenti articoli da revisionare</p>
                @endif
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-12">
                <h2 class="text-center mb-5">
                    Articoli pubblicati
                </h2>
                @if ($acceptArticles->isNotEmpty())
                    <x-articles-table :articles="$acceptArticles" />
                @else
                    <p class="text-center">Non sono presenti articoli</p>
                @endif
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-12">
                <h2 class="text-center mb-5">
                    Articoli respinti
                </h2>
                @if ($rejectArticles->isNotEmpty())
                    <x-articles-table :articles="$rejectArticles" />
                @else
                    <p class="text-center">Non sono presenti articoli</p>
                @endif
            </div>
        </div>
    </div>

</x-dashboards-layout>
