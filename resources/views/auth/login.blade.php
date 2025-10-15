<x-layouts.layout :title="$title">

    @if (session('status'))
        <div class="flex justify-center py-8">
            <div class="tw-message-span">
                {{ session('status') }}
            </div>
        </div>
    @endif

    @if ($errors->any())
        <div class="auth-error">
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
        </div>
    @endif

    <div class="container py-24 mx-auto">
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
                <div class="mb-5 relative">
                    <label for="password" class="tw-form-label-auth">Password</label>
                    <input name="password" type="password" id="password" class="tw-form-input-auth-login" />
                    <span id="togglePassword" class="cursor-pointer absolute right-2 mt-3">
                        <svg id="eyeOpen" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                        <svg id="eyeClose" class="hidden w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                        </svg>
                    </span>
                </div>
                <button type="submit" class="tw-button-auth-login">Accedi</button>
                <div class="mt-7">
                    <a class="underline text-sky-500" href="{{ route('password.email') }}">Password dimenticata</a>
                </div>
                <div class="flex justify-center mt-10">
                    <div class="flex flex-col">
                        <h4 class="text-xl">Non hai un account?</h4>
                        <a class="text-center hover:underline text-sky-500 text-lg"
                            href="{{ route('register') }}">Registrati</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

</x-layouts.layout>
