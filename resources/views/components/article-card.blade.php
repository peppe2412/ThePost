 <a href="{{ route('article-show', $article) }}">
    <div class="md:flex md:justify-center flex justify-center">
        <div class="lg:w-[50%] md:w-[400px] w-[300px] lg:mx-auto mb-10 p-4 border border-gray-400">
            <div class="mt-2 flex justify-center">
                <img class="rounded" src="{{ Storage::url($article->image) }}" alt="{{ $article->title }}">
            </div>
            <div class="mt-3 mb-5">
                <h3 class="text-3xl mb-4">{{ $article->title }}</h3>
            </div>
            <div class="mt-5">
                @if ($article->category)
                    <p>Categoria: <a
                            href="{{ route('article-category', $article->category) }}">{{ $article->category->name }}</a>
                    </p>
                @else
                    <p>Nessuna Categoria</p>
                @endif
                <p>Redatto il: {{ $article->created_at->format('d/m/Y') }}</p>
                <p>Da: <a href="{{ route('article-redactor', $article->user) }}">{{ $article->user->name }}</a>
                </p>
                <small>
                    @foreach ($article->tags as $tag)
                        #{{ $tag->name }}
                    @endforeach
                </small>
            </div>
        </div>

    </div>
 </a>
