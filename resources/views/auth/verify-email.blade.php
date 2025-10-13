<x-layout :title="$title">

    <header class="py-8">
        <div class="flex justify-center">
            <p class="text-4xl">Registrazione effettuata, è stata mandato un link di verifica alla tua email</p>
        </div>
    </header>

    @if (session('status') == 'verification-link-sent')
        <div class="flex justify-center py-8">
            <div class="tw-message-span">
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

</x-layout>
