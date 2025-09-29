<x-layout :title="$title">

    <header class="flex justify-center py-16">
        <h1 class="text-6xl">{{ $user->name }}</h1>
    </header>

    <div class="container py-5">
        <div class="flex justify-evenly mx-5">
            @foreach ($articles as $article)
               <x-article-card :article="$article"/>
            @endforeach
        </div>
    </div>

</x-layout>
