     <div class="flex justify-center py-8">
         <div>
             <table class="w-full border border-gray-800 table-fixed">
                 <thead class="border border-gray-400">
                     <tr class="uppercase">
                         <th>#</th>
                         <th>Titolo</th>
                         <th>Sottotitolo</th>
                         <th>Categoria</th>
                         <th>Tags</th>
                         <th>Inserito il</th>
                         <th>Azioni</th>
                     </tr>
                 </thead>
                 <tbody>
                     @foreach (Auth::user()->articles as $article)
                         <tr class="border-b">
                             <td class="px-24">{{ $article->id }}</td>
                             <td class="px-2 py-4">{{ $article->title }}</td>
                             <td class="px-2 py-4">{{ $article->subtitle }}</td>
                             <td class="px-2 py-4">{{ $article->category->name ?? 'Nessuna categoria' }}</td>
                             <td class="px-2 py-4">
                                 @foreach ($article->tags as $tag)
                                     #{{ $tag->name }}
                                 @endforeach
                             </td>
                             <td class="px-2 py-4">{{ $article->created_at->format('d/m/Y') }}</td>
                             <td class="px-9 py-4"><a class="hover:underline cursor-pointer text-sm font-bold"
                                     href="{{ route('article-show', $article) }}">Leggi
                                 </a>
                             </td>
                             <td>
                                <a href="{{ route('article-edit', $article) }}">Modifica</a>
                             </td>
                             <td>
                                <form action="{{ route('article-delete', $article) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-400 hover:bg-red-600">Elimina</button>
                                </form>
                             </td>
                         </tr>
                     @endforeach
                 </tbody>
             </table>
         </div>


     </div>
