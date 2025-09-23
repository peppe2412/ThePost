<x-layout>


    <header class="flex justify-center py-16">
        <h1 class="text-6xl">Articoli per {{ $query }}</h1>
    </header>

    <div class="container py-5">
        <div class="grid md:grid-cols-1 gap-3">
            @forelse ($articles as $article)
                <x-article-card :article="$article"/>
            @empty
                <p class="text-center text-2xl">Sembra che non ci siano articoli corrispondenti alla ricerca</p>
            @endforelse
        </div>
    </div>

</x-layout>
