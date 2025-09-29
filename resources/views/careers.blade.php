<x-layout :title="$title">

    <div class="ml-5" id="link-form-careers">
        <a class="link-form-careers text-lg bg-sky-300 rounded" href="#careers-form">Compila il form <span class="mx-2"><svg
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 13.5 12 21m0 0-7.5-7.5M12 21V3" />
                </svg>
            </span>
        </a>
    </div>

    <header class="flex justify-center py-16">
        <h1 class="text-6xl">Lavora con noi</h1>
    </header>

    <div class="flex justify-center py-16">
        <div class="w-[50%]">
            <p class="text-center text-3xl">Vuoi entrare a far parte del nostro progetto? Cerchiamo appassionati di
                scrittura, persone con voglia di mettersi in gioco e contribuire alla crescita della community. Che tu
                voglia scrivere articoli, aiutare nella gestione o occuparti delle revisioni, qui troverai il tuo spazio
            </p>
        </div>
    </div>

    <div class="container py-16">
        <h2 class="text-4xl text-center mb-10">
            Admin
        </h2>
        <div class="flex">
            <img class="tw-img-careers opacity-0 careers-img"
                src="https://media.istockphoto.com/id/531792312/photo/office-work.jpg?s=612x612&w=0&k=20&c=F2XAB0GE9kV6d140abYeHcq6kciYa5wsYkn8K0P7cuY="
                alt="Admin">
            <div class="w-full flex items-center px-10">
                <p class="text-2xl">Vuoi contribuire alla crescita del progetto anche dietro le quinte? Come admin avrai
                    un ruolo
                    fondamentale nell'organizzazione e nella gestione del sito. Dall’approvazione dei contenuti al
                    supporto
                    dei writer, sarai parte integrante del cuore della piattaforma.</p>
            </div>
        </div>
    </div>

    <div class="container py-16">
        <h2 class="text-4xl text-center mb-10">
            Revisor
        </h2>
        <div class="flex">
            <div class="w-full flex items-center px-10">
                <p class="text-2xl">Precisione e attenzione ai dettagli sono il tuo punto di forza? Allora diventa
                    revisore. Ti occuperai di controllare e migliorare i testi dei writer, garantendo qualità, chiarezza
                    e correttezza dei contenuti pubblicati</p>
            </div>
            <img class="tw-img-careers opacity-0 careers-img"
                src="https://img.freepik.com/foto-premium/computer-portatile-e-donna-che-digitano-ragioniere-e-lavorano-su-un-progetto-internet-nel-posto-di-lavoro-in-ufficio-computer-revisore-e-felice-professionista-femminile-che-scrive-rapporto-o-ricerca-via-e-mail-per-la-contabilita_590464-190829.jpg"
                alt="Revisor">
        </div>
    </div>

    <div class="container py-16">
        <h2 class="text-4xl text-center mb-10">
            Writer
        </h2>
        <div class="flex">
            <img class="tw-img-careers opacity-0 careers-img"
                src="https://t4.ftcdn.net/jpg/03/70/74/29/360_F_370742959_oafsXZ5nJ0gneXindh0pk6VE5lbtpfBT.jpg"
                alt="Writer">
            <div class="w-full flex items-center px-10">
                <p class="text-2xl">Se ami scrivere e raccontare il mondo attraverso le parole, questo è il ruolo che fa per te. Potrai pubblicare articoli su temi come politica, economia, sport, musica, tecnologia e motori, condividendo le tue idee con una community attiva e appassionata.</p>
            </div>
        </div>
    </div>


    <div id="careers-form" class="container py-24">
        <div class="text-center mb-10">
            <h2 class="text-5xl">Compila il Form</h2>
        </div>
        <div class="flex justify-center">
            <form action="{{ route('careers-submit') }}" method="POST" class="tw-form-careers">
                @csrf
                <div class="mb-5">
                    <label class="tw-label-careers" for="role">In cosa ti stai candidando?</label>
                    <select class="border border-gray-400 w-full rounded p-2" name="role" id="role">
                        <option selected disabled>Seleziona il ruolo</option>
                        @if (!Auth::user()->is_admin)
                            <option value="admin">Amministratore</option>
                        @endif
                        @if (!Auth::user()->is_revisor)
                            <option value="revisor">Revisore</option>
                        @endif
                        @if (!Auth::user()->is_writer)
                            <option value="writer">Writer</option>
                        @endif
                    </select>
                    @error('role')
                        <span class="tw-form-span-message">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-5">
                    <label class="tw-label-careers" for="email">Email</label>
                    <input class="border border-gray-400 w-full p-2 rounded" name="email" type="email">
                    @error('email')
                        <span class="tw-form-span-message">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-5">
                    <label class="tw-label-careers" for="message">Messaggio</label>
                    <textarea class="border border-gray-400 w-full p-2 rounded" name="message" id="message"></textarea>
                    @error('message')
                        <span class="tw-form-span-message">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit"
                    class="cursor-pointer border border-sky-600 p-2 rounded-3xl text-sm hover:bg-sky-400">Invia
                    candidatura</button>
            </form>
        </div>
    </div>


</x-layout>
