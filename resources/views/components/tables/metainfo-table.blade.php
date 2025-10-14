<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            @foreach ($metaInfos as $metaInfo)
                @if ($metaInfo == 'tag')
                    <th>Nome Tag</th>
                @else
                    <th>Nome Categoria</th>
                    @break
                @endif
            @endforeach
            <th>Articoli collegati</th>
            <th>Aggiorna</th>
            <th>Elimina</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($metaInfos as $metaInfo)
            <tr>
                <td>{{ $metaInfo->id }}</td>
                <td>{{ $metaInfo->name }}</td>
                <td>{{ $metaInfo->articles->count() }}</td>
                @if ($metaInfo == 'tags')
                    <td>
                        <form action="{{ route('edit-tag', ['tag' => $metaInfo]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="text" name="name" placeholder="Nuovo nome">
                            <button type="submit" class="btn btn-outline-success">Aggiorna</button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('delete-tag', ['tag' => $metaInfo]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger">Elimina</button>
                        </form>
                    </td>
                @else
                    <td>
                        <form action="{{ route('edit-category', ['category' => $metaInfo]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="text" name="name" placeholder="Nuovo nome">
                            <button type="submit" class="btn btn-outline-success p-1 mx-2 mx-md-0 p-md-0">Aggiorna</button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('delete-category', ['category' => $metaInfo]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger">Elimina</button>
                        </form>
                    </td>
                @endif
            </tr>
        @endforeach
    </tbody>
</table>




