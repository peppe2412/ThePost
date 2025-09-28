<table class="table border border-black ">
    <thead>
        <tr>
            <th>#</th>
            <th>Titolo</th>
            <th>Sottotitolo</th>
            <th>Redattore</th>
            <th>Azioni</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($articles as $article)
            <tr>
                <td>{{ $article->id }}</td>
                <td>{{ $article->title }}</td>
                <td>{{ $article->subtitle }}</td>
                <td>{{ $article->user->name }}</td>
                <td>
                    @if (is_null($article->is_accepted))
                        <a href="{{ route('article-show', $article) }}"
                            class="hover:underline cursor-pointer text-sm font-bold">Leggi Articolo</a>
                    @else
                        <form action="{{ route('revisor-article-undo', $article) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-outline-primary p-1">Riporta
                                in revisione</button>
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>


