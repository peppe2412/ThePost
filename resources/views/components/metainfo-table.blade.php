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
                            <button type="submit" class="text-success text-decoration-underline">Aggiorna</button>
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




{{-- <div class="flex justify-center">
    <table class="w-full border border-gray-800 table-fixed">
        <thead class="border border-gray-400">
            <tr class="uppercase">
                <th>#</th>
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
                <tr class="border-b">
                    <td class="px-[150px]">{{ $metaInfo->id }}</td>
                    <td class="px-24 py-4">{{ $metaInfo->name }}</td>
                    <td class="px-[150px] py-4">{{ $metaInfo->articles->count() }}</td>
                    @if ($metaInfo == 'tags')
                        <td class="px-[150px] py-4">
                            <form action="{{ route('edit-tag', ['tag' => $metaInfo]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="text" name="name" placeholder="Nuovo nome">
                                <button type="submit" class="bg-green-500 hover:bg-green-600">Aggiorna</button>
                            </form>
                        </td>
                        <td class="px-[150px] py-4">
                            <form action="{{ route('delete-tag', ['tag' => $metaInfo]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-600">Elimina</button>
                            </form>
                        </td>
                    @else
                        <td class="px-[150px] py-4">
                            <form action="{{ route('edit-category', ['category' => $metaInfo]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="text" name="name" placeholder="Nuovo nome">
                                <button type="submit" class="hover:underline">Aggiorna</button>
                            </form>
                        </td>
                        <td class="px-[150px] py-4">
                            <form action="{{ route('delete-category', ['category' => $metaInfo]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 rounded p-1">Elimina</button>
                            </form>
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
</div> --}}
