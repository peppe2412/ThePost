<x-layout :title="$title">



    @if (session('message'))
        <div class="flex justify-center py-8">
            <div class="tw-message-span">
                {{ session('message') }}
            </div>
        </div>
    @endif

    @if (request()->has('verified'))
        <div class="flex justify-center py-8">
            <div class="tw-message-span">
                Verifica eseguita!
            </div>
        </div>
    @endif

    @if (request()->has('logout'))
        <div class="flex justify-center py-8">
            <div class="tw-message-span">
                Disconnessione riuscita! Ci vediamo alla prossima!
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

    <header class="lg:container py-10">
        <div class="flex justify-center">
            <h1 class="lg:text-[200px] text-center md:text-8xl text-6xl font-bold fs-main">THE POST</h1>
        </div>
    </header>

    <div class="py-16">
        <div class="lg:ml-8 px-2">
            <div class="lg:w-full">
                <div class="lg:flex lg:justify-evenly">
                    <div class="lg:w-[500px] ml-5">
                        <p class="lg:text-3xl text-xl md:text-4xl md:ml-4">Benvenuto su <strong class="fs-main">THE
                                POST</strong>, la piattaforma pensata per chi
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

                    <img class="lg:w-[500px] py-8 rounded-2xl" id="imgWriterHome"
                        src="https://blog-cdn.reedsy.com/directories/admin/featured_image/335/how-to-become-a-writer-1b28eb.webp"
                        alt="Writer">
                </div>
            </div>
        </div>
    </div>


    <div class="py-24 scroll">
        <div class="container-scroll" id="containerScroll"></div>
    </div>

    <div class="lg:flex lg:justify-center">
        <div class="lg:w-[50%] ml-5">
            <p class="lg:text-2xl text-lg md:text-4xl">Su <strong class="fs-main">THE POST</strong> diamo spazio a ogni
                voce. Politica,
                economia, sport, musica,
                tecnologia, motori e molto altro: tanti mondi diversi uniti dalla stessa passione per la scrittura. Qui
                ogni
                autore trova il proprio spazio per raccontare, analizzare e condividere.</p>
        </div>
    </div>


    <div class="lg:container py-24">
        <h2 class="lg:text-6xl text-3xl md:text-6xl text-center mb-5">Ultimi Annunci</h2>
        <div class="flex justify-center">
            <div class="grid md:grid-cols-1 gap-3">
                @foreach ($articles as $article)
                    <x-article-card :article="$article" />
                @endforeach
            </div>
        </div>
    </div>





</x-layout>
