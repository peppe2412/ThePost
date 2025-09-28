 <table class="table">
     <thead>
         <tr>
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
             <tr>
                 <td>{{ $article->id }}</td>
                 <td>{{ $article->title }}</td>
                 <td>{{ $article->subtitle }}</td>
                 <td>{{ $article->category->name ?? 'Nessuna categoria' }}</td>
                 <td>
                     @foreach ($article->tags as $tag)
                         #{{ $tag->name }}
                     @endforeach
                 </td>
                 <td>{{ $article->created_at->format('d/m/Y') }}</td>
                 <td><a class="hover:underline cursor-pointer text-sm font-bold"
                         href="{{ route('article-show', $article) }}">Leggi
                     </a>
                 </td>
                 <td>
                     <a class="icon-link" href="{{ route('article-edit', $article) }}">Modifica</a>
                 </td>
                 <td>
                     <form action="{{ route('article-delete', $article) }}" method="POST">
                         @csrf
                         @method('DELETE')
                         <button type="submit" class="btn btn-outline-danger p-md-1">Elimina</button>
                     </form>
                 </td>
             </tr>
         @endforeach
     </tbody>
 </table>

