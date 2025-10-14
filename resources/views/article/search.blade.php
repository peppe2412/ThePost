<x-layouts.layout :title="$title">


    <header class="flex justify-center py-16">
        <h1 class="text-6xl">Articoli per {{ $query }}</h1>
    </header>

    <div class="container py-5">
        <div class="grid md:grid-cols-1 gap-3">
            @forelse ($articles as $article)
                <x-article-card :article="$article"/>
            @empty
                <p class="text-center text-2xl mb-10">Sembra che non ci siano articoli corrispondenti alla ricerca</p>
                <div class="flex justify-center">
                    <a href="{{ route('article-index') }}" class="text-center text-lg bg-sky-300 p-[6px] rounded text-white hover:bg-sky-400">Sfoglia articoli</a>
                </div>
            @endforelse
        </div>
    </div>

</x-layouts.layout>
