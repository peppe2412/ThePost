<x-layouts.errors-layout>

    <main class="container py-16">
        <div class="flex justify-center">
            <h1 class="text-8xl font-bold">404</h1>
        </div>
        <div class="flex justify-center mt-7">
            <h3 class="text-5xl">Pagina non trovata</h3>
        </div>
        <div class="flex justify-center mt-4">
            <img src="https://hackademy.it/img/404-aulab.svg" alt="Ghost">
        </div>
        <div class="flex justify-center mt-7">
            <a href="{{ route('home') }}" class="text-xl text-white uppercase bg-black hover:bg-gray-600 p-3">
                <i class="fa-solid fa-house"></i> Torna alla home
            </a>
        </div>
    </main>

</x-layouts.errors-layout>
