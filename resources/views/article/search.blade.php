<x-layout>


    <header class="flex justify-center py-16">
        <h1 class="text-6xl">Articoli per {{ $query }}</h1>
    </header>

    <div class="container py-5">
        <div class="flex justify-evenly mx-5">
            @foreach ($articles as $article)
                <a href="{{ route('article-show', $article) }}">
                    <div class="shadow-lg w-[600px] p-4 rounded-2xl">
                        <div class="mt-2">
                            <img class="rounded" src="{{ Storage::url($article->image) }}" alt="{{ $article->title }}">
                        </div>
                        <div class="mt-3 mb-5">
                            <h3 class="text-3xl mb-4">{{ $article->title }}</h3>
                            <h4 class="text-2xl">{{ $article->subtitle }}</h4>
                        </div>
                        <p class="text-lg text-wrap">{{ $article->body }}</p>
                        <div class="mt-5">
                            @if ($article->category)
                                <p>Categoria: <a
                                        href="{{ route('article-category', $article->category) }}">{{ $article->category->name }}</a>
                                </p>
                            @else
                                <p>Nessuna Categoria</p>
                            @endif
                            <p>Redatto il: {{ $article->created_at->format('d/m/Y') }}</p>
                            <p>Da: <a
                                    href="{{ route('article-redactor', $article->user) }}">{{ $article->user->name }}</a>
                            </p>
                            <small>
                                @foreach ($tags as $tag)
                                    #{{ $tag->name }}
                                @endforeach
                            </small>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

</x-layout>
