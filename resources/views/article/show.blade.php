<x-layouts.layout :title="$title">

    <header class="flex flex-col py-16">
        <h1 class="lg:text-6xl md:text-4xl text-3xl mb-7 text-center">{{ $article->title }}</h1>
        <div class="md:flex md:justify-center">
            <h2 class="lg:text-3xl md:text-2xl md:w-[50%] text-xl text-center text-gray-600">{{ $article->subtitle }}
            </h2>
        </div>
    </header>

    <div class="w-full">
        <div class="flex justify-center">
            <img src="{{ Storage::url($article->image) }}" alt="{{ $article->title }}" class="lg:w-[700px] w-[400px]">
        </div>
        <div class="mt-10">
            <div class="lg:text-center lg:p-10 p-5">
                <p class="lg:text-xl text-lg">{{ $article->body }}</p>
            </div>
            @if (Auth::user() && Auth::user()->is_revisor)
                <div class="mt-5 mb-5 flex justify-evenly">
                    <form action="{{ route('revisor-article-accept', $article) }}" method="POST">
                        @csrf
                        <button class="bg-green-400 p-2 rounded cursor-pointer hover:bg-green-200 text-lg">Accetta
                            articolo</button>
                    </form>
                    <form action="{{ route('revisor-article-reject', $article) }}" method="POST">
                        @csrf
                        <button class="bg-red-400 p-2 rounded cursor-pointer hover:bg-red-200 text-lg">Rifiuta
                            articolo</button>
                    </form>
                </div>
            @endif
            <div class="ml-4 mt-4">
                @if ($article->category)
                    <p>Categoria: <a
                            href="{{ route('article-category', $article->category) }}">{{ $article->category->name }}</a>
                    </p>
                @else
                    <p>Nessuna Categoria</p>
                @endif
                <p>Redatto il: {{ $article->created_at->format('d/m/Y') }}</p>
                <p>Da: <a href="">{{ $article->user->name }}</a></p>
                <small>
                    @foreach ($article->tags as $tag)
                        #{{ $tag->name }}
                    @endforeach
                </small>
                <div>
                    <small>
                        Tempo di lettura: {{ $article->readDuration() }} min
                    </small>
                </div>
            </div>
        </div>
    </div>




</x-layouts.layout>
