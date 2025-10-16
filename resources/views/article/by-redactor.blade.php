<x-layouts.layout :title="$title">

    <header class="flex justify-center py-16">
        <h1 class="text-6xl">{{ $user->name }}</h1>
    </header>

    <div class="lg:container py-5">
        <div class="lg:grid lg:grid-cols-1 lg:gap-3 p-4">
            @foreach ($articles as $article)
                <x-article-card :article="$article" />
            @endforeach
        </div>
    </div>

</x-layouts.layout>
