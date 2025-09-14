<x-layout>

    <div class="container py-24">
        <div class="text-center mb-5">
            <h1 class="text-6xl font-bold mb-4">Registrati</h1>
            <h5 class="text-gray-500 text-xl">Crea un nuovo account</h5>
        </div>
        <div class="flex justify-center">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mb-5">
                    <label for="name" class="tw-form-label-auth">Username</label>
                    <input name="name" type="text" id="username" class="tw-form-input-auth" />
                </div>
                <div class="mb-5">
                    <label for="email" class="tw-form-label-auth">Email</label>
                    <input name="email" type="email" id="email" class="tw-form-input-auth" />
                </div>
                <div class="mb-5">
                    <label for="password" class="tw-form-label-auth">Password</label>
                    <input name="password" type="password" id="password" class="tw-form-input-auth" />
                </div>
                <div class="mb-5">
                    <label for="password_confirmation" class="tw-form-label-auth">Conferma Password</label>
                    <input name="password_confirmation" type="password_confirmation" id="password_confirmation"
                        class="tw-form-input-auth" />
                </div>
                <button type="submit"
                    class="bg-sky-500 font-bold w-full cursor-pointer p-2 rounded text-white">Registrati</button>
                <div class="flex justify-center mt-7">
                    <div class="flex flex-col">
                        <p>Hai già un account?</p>
                        <a class="text-center hover:underline text-sky-500"
                            href="{{ route('login') }}">Accedi</a>
                    </div>
                </div>
            </form>
        </div>
    </div>



</x-layout>
