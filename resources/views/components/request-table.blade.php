<table class="table-auto">
    <thead>
        @foreach ($roleRequests as $user)
            <tr>
                <th>{{ $user->id }}</th>
                <th>{{ $user->name }}</th>
                <th>{{ $user->email }}</th>
            </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                @switch($role)
                    @case('admin')
                        <form action="{{ route('set-admin', $user) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit">Attiva {{ $role }}</button>
                        </form>
                    @break

                    @case('revisor')
                        <form action="{{ route('set-revisor', $user) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit">Attiva {{ $role }}</button>
                        </form>
                    @break

                    @case('writer')
                        <form action="{{ route('set-writer', $user) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit">Attiva {{ $role }}</button>
                        </form>
                    @break

                    @default
                @endswitch
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
