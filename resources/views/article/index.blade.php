<x-layout :title="$title">


    <header class="flex justify-center py-16">
        <h1 class="lg:text-8xl text-6xl  title-article-index">Articoli</h1>
    </header>

    <div class="lg:container py-5">
        <div class="lg:grid lg:grid-cols-1 lg:gap-3 p-4">
            @foreach ($articles as $article)
                <x-article-card :article="$article" />
            @endforeach
        </div>
    </div>

</x-layout>
