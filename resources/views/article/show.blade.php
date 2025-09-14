<x-layout>

    <header class="flex flex-col py-16 ml-4">
        <h1 class="text-6xl mb-7">{{ $article->title }}</h1>
        <h2 class="text-3xl">{{ $article->subtitle }}</h2>
    </header>

    <div class="container">
        <div>
            <div class="flex justify-center">
                <img src="{{ Storage::url($article->image) }}" alt="{{ $article->title }}">
            </div>
            <div class="mt-10">
                <div class="text-center p-10">
                    <p class="text-xl">{{ $article->body }}</p>
                </div>
                @if (Auth::user() && Auth::user()->is_revisor)
                    <div class="mt-5 mb-5 flex justify-evenly">
                        <form action="{{ route('revisor-article-accept', $article) }}" method="POST">
                            @csrf
                            <button>Accetta articolo</button>
                        </form>
                        <form action="{{ route('revisor-article-reject', $article) }}" method="POST">
                            @csrf
                            <button>Rifiuta articolo</button>
                        </form>
                    </div>
                @endif
                <div class="ml-4 mt-4">
                    <p>Categoria: <a
                            href="{{ route('article-category', $article->category) }}">{{ $article->category->name }}</a>
                    </p>
                    <p>Redatto il: {{ $article->created_at->format('d/m/Y') }}</p>
                    <p>Da: <a href="">{{ $article->user->name }}</a></p>
                </div>
            </div>
        </div>
    </div>



</x-layout>
