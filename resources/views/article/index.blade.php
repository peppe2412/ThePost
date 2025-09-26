<x-layout>


    <header class="flex justify-center py-16">
        <h1 class="text-8xl title-article-index">Articoli</h1>
    </header>

    <div class="container py-5">
        <div class="grid md:grid-cols-1 gap-3">
            @foreach ($articles as $article)
                <x-article-card :article="$article" />
            @endforeach

        </div>
    </div>

</x-layout>
