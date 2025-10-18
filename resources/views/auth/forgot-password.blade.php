<x-layouts.layout :title="$title">

    @if (session('status'))
        <div class="flex justify-center py-8">
            <div class="tw-message-span">
                {{ session('status') }}
            </div>
        </div>
    @endif

    @if ($errors->any())
        <div class="auth-error-box p-7">
            <div class="flex">
                <span class="text-red-400">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-7">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                    </svg>
                </span>
                <div class="flex justify-end w-[100%]">
                    <button class="cursor-pointer hover:bg-gray-100 p-[5px]" id="button-error-close">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
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

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            let error_notification = document.querySelector('.auth-error-box')

            if (error_notification) {
                const audio = new Audio("{{ asset('sounds/error-notification.mp3') }}")
                audio.play()
            }
        })
    </script>

</x-layouts.layout>
