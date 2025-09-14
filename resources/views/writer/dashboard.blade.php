<x-layout>

    <header class="container py-24">
        <h1 class="text-6xl block text-center"><x-greeting-by-time/> {{ Auth::user()->name }}</h1>
        <div class="flex justify-center mt-10">
            <a href="{{ route('create-article') }}" class="bg-blue-400 text-white p-1 font-bold rounded hover:bg-blue-600">Inserisci articolo</a>
        </div>
    </header>

    <div class="">
        <h2 class="text-2xl uppercase text-center">I tuoi articoli</h2>
        <div class="flex justify-center py-8">
            <div>
                <table class="w-[700px] border border-gray-800 table-fixed">
                    <thead class="border border-gray-400">
                        <tr class="uppercase">
                            <th>#</th>
                            <th>Titolo</th>
                            <th>Sottotitolo</th>
                            <th>Azioni</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (Auth::user()->articles as $article)
                            <tr class="border-b">
                                <td class="px-24">{{ $article->id }}</td>
                                <td class="px-2 py-4">{{ $article->title }}</td>
                                <td class="px-2 py-4">{{ $article->subtitle }}</td>
                                <td class="px-9 py-4"><a class="hover:underline cursor-pointer text-sm font-bold"
                                        href="{{ route('article-show', $article) }}">Leggi articolo</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>


        </div>
    </div>

</x-layout>
