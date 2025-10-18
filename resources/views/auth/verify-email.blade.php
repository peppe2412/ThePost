<x-layouts.layout :title="$title">

    <header class="py-8">
        <div class="flex justify-center">
            <p class="text-4xl">Registrazione effettuata, è stato mandato un link di verifica alla tua email</p>
        </div>
    </header>

    @if (session('status') == 'verification-link-sent')
        <div class="relative">
            <div class="email-verification-message">
                <span class="text-green-400 absolute top-2 left-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                </span>
                E' stata reinviata l'email di verifica!
            </div>
        </div>
    @endif

    <div class="container py-8">
        <h1 class="text-2xl text-center mb-4">Non hai ricevuto l'email?</h1>
        <div class="flex justify-center">
            <form action="{{ route('verification.send') }}" method="POST">
                @csrf
                <div class="mb-5">
                    <button type="submit" class="tw-button-send-verify">Reinvia email di verificà</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            let emailVerification = document.querySelector(".email-verification-message");

            if (emailVerification) {
                const audio = new Audio("{{asset('sounds/request-email-verification.mp3')}}");
                audio.play();
            }
        });
    </script>

</x-layouts.layout>
