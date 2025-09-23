<x-layout>

    <div class="container p-16">
        <h1 class="text-center text-xl">Invia la richiesta per resettare la password</h1>
        <div class="flex justify-center py-16">
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="mb-5">
                    <label for="email" class="tw-form-label-auth">Email</label>
                    <input name="email" type="email" id="email" value="{{ old('email') }}" class="tw-form-input-auth-login" />
                </div>
                <button type="submit">Invio</button>
            </form>
        </div>
    </div>

</x-layout>
