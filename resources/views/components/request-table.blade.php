<div class="flex justify-center">
    <table class="w-[700px] border border-gray-800 table-fixed">
        <thead class="border border-gray-400">
            @foreach ($roleRequests as $user)
                <tr class="uppercase">
                    <th>{{ $user->id }}</th>
                    <th>{{ $user->name }}</th>
                    <th>{{ $user->email }}</th>
                </tr>
        </thead>
        <tbody>
            <tr class="border-b">
                <td>
                    @switch($role)
                        @case('admin')
                            <form action="{{ route('set-admin', $user) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button class="hover:underline hover:text-green-400 cursor-pointer" type="submit">Attiva {{ $role }}</button>
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
</div>
