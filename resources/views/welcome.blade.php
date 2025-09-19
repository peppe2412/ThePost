<x-layout>



    @if (session('message'))
        <div class="bg-green-300">
            {{ session('message') }}
        </div>
    @endif

    @if (session('alert'))
        <div class="bg-red-300">
            {{ session('alert') }}
        </div>
    @endif

    <div class="container py-16">
        <div class="flex justify-center">
            <div>
                <h1 class="text-4xl text-center mb-5">Ultimi Annunci</h1>
                @foreach ($articles as $article)
                   <x-article-card :article="$article"/>
                @endforeach
            </div>
        </div>
    </div>



</x-layout>
