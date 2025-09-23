<x-layout>

    <div class="container py-24">
        <div class="text-center mb-5">
            <h1 class="text-6xl font-bold mb-4">Accedi</h1>
        </div>
        <div class="flex justify-center">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-5">
                    <label for="email" class="tw-form-label-auth">Email</label>
                    <input name="email" type="email" id="email" class="tw-form-input-auth-login" />
                </div>
                <div class="mb-5">
                    <label for="password" class="tw-form-label-auth">Password</label>
                    <input name="password" type="password" id="password" class="tw-form-input-auth-login" />
                </div>
                <div>
                    <button type="submit" class="tw-button-auth-login">Accedi</button>
                </div>
                <div>
                    <a href="{{ route('password.email') }}">Password dimenticata</a>
                </div>
                <div class="flex justify-center mt-10">
                    <div class="flex flex-col">
                        <h4 class="text-xl">Non hai un account?</h4>
                        <a class="text-center hover:underline text-sky-500 text-lg" href="{{ route('register') }}">Registrati</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

</x-layout>
