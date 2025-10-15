<x-layouts.layout :title="$title">

    @if (session('status'))
        <div class="flex justify-center py-8">
            <div class="tw-message-span">
                {{ session('status') }}
            </div>
        </div>
    @endif

    <div class="container mt-24 md:mx-auto flex justify-center">
        <div class="lg:w-[50%] w-[400px] shadow-lg rounded-b-lg">
            <div class="bg-gray-100 rounded-t-lg p-2 mb-10">
                <h1 class="text-center lg:text-2xl text-lg uppercase font-bold">Invia la richiesta per resettare la
                    password</h1>
            </div>
            <div class="flex justify-center mb-10">
                <form class="w-full flex justify-center" method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="grid grid-cols-1 w-[50%]">
                        <div class="mb-5">
                            <input placeholder="Inserisci la tua email" name="email" type="email" id="email"
                                value="{{ old('email') }}" class="tw-form-input-auth-reset-password-request" />
                        </div>
                        <button class="bg-sky-400 p-1 w-24 rounded text-white text-lg cursor-pointer hover:bg-sky-300"
                            type="submit">Invio</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

</x-layouts.layout>
