<x-layout>

    <div class="container p-16">
        <h1 class="text-center text-xl">Inserisci nuova password</h1>
        <div class="flex justify-center py-16">
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token"
                    value="{{ $token ?? (request()->route('token') ?? request('token')) }}">
                <div class="mb-5">
                    <label for="email" class="tw-form-label-auth">Email</label>
                    <input name="email" type="email" id="email" value="{{ old('email') }}"
                        class="tw-form-input-auth-login" />
                    @if ($errors->any())
                        <div class="alert alert-danger mb-4">
                            @foreach ($errors->all() as $error)
                                {{ $error }}
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="mb-5">
                    <label for="password" class="tw-form-label-auth">Password</label>
                    <input name="password" type="password" id="password" class="tw-form-input-auth-register" />
                    @if ($errors->any())
                        <div class="alert alert-danger mb-4">
                            @foreach ($errors->all() as $error)
                                {{ $error }}
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="mb-5">
                    <label for="password_confirmation" class="tw-form-label-auth">Conferma Password</label>
                    <input name="password_confirmation" type="password" id="password_confirmation"
                        class="tw-form-input-auth-register" />
                    @if ($errors->any())
                        <div class="alert alert-danger mb-4">
                            @foreach ($errors->all() as $error)
                                {{ $error }}
                            @endforeach
                        </div>
                    @endif
                </div>
                <button type="submit">Conferma</button>
            </form>
        </div>
    </div>

</x-layout>
