<x-layout>



    @if (session('message'))
        <div class="flex justify-center py-8">
            <div class="tw-message-span">
                {{ session('message') }}
            </div>
        </div>
    @endif

    @if (session('alert'))
        <div class="flex justify-center py-8">
            <div class="tw-alert-span">
                {{ session('alert') }}
            </div>
        </div>
    @endif

    <header class="container py-10">
        <div class="flex justify-center">
            <h1 class="text-[300px] font-bold">THE POST</h1>
        </div>
    </header>

    <div class="py-16">
        <div class="ml-8">
            <div class="w-full">
                <div class="flex justify-evenly">
                    <div class="w-[500px]">
                        <p class="text-3xl">Benvenuto su <strong>THE POST</strong>, la piattaforma pensata per chi
                            scrive.
                            Qui
                            trovi
                            strumenti, risorse e uno spazio dedicato alla condivisione delle tue opere. Che tu sia
                            autore
                            emergente
                            o già affermato, il nostro obiettivo è valorizzare il tuo talento e offrirti visibilità
                            verso un
                            pubblico sempre più ampio.</p>
                    </div>

                    <img class="w-[500px] rounded-2xl" id="imgWriterHome"
                        src="https://blog-cdn.reedsy.com/directories/admin/featured_image/335/how-to-become-a-writer-1b28eb.webp"
                        alt="Writer">
                </div>
            </div>
        </div>
    </div>


    <div class="py-24 scroll">
        <div id="containerScroll"></div>
    </div>

    <div class="flex justify-center">
        <div class="w-[50%]">
            <p class="text-2xl">Su <strong>THE POST</strong> diamo spazio a ogni voce. Politica,
                economia, sport, musica,
                tecnologia, motori e molto altro: tanti mondi diversi uniti dalla stessa passione per la scrittura. Qui
                ogni
                autore trova il proprio spazio per raccontare, analizzare e condividere.</p>
        </div>
    </div>


    <div class="container py-24">
        <div class="flex justify-center">
            <div class="mt-10">
                <h2 class="text-6xl text-center mb-5">Ultimi Annunci</h2>
                @foreach ($articles as $article)
                    <x-article-card :article="$article" />
                @endforeach
            </div>
        </div>
    </div>



</x-layout>
