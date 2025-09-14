<div class="flex justify-center">
    <table class="w-[700px] border border-gray-800 table-fixed">
        <thead class="border border-gray-400">
            <tr class="uppercase">
                <th>#</th>
                <th>Titolo</th>
                <th>Sottotitolo</th>
                <th>Redattore</th>
                <th>Azioni</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($articles as $article)
                <tr class="border-b">
                    <td class="px-16">{{ $article->id }}</td>
                    <td class="px-2 py-4">{{ $article->title }}</td>
                    <td class="px-2 py-4">{{ $article->subtitle }}</td>
                    <td class="px-10">{{ $article->user->name }}</td>
                    <td>
                        @if (is_null($article->is_accepted))
                            <a href="{{ route('article-show', $article) }}" class="hover:underline cursor-pointer text-sm font-bold">Leggi Articolo</a>
                        @else
                            <form action="{{ route('revisor-article-undo', $article) }}" method="POST">
                                @csrf
                                <button type="submit" class="hover:underline cursor-pointer text-sm font-bold">Riporta in revisione</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

