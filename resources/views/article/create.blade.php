<x-layouts.layout :title="$title">

    <header class="flex justify-center py-16">
        <h1 class="text-6xl">Inserisci Articolo</h1>
    </header>

    <div class="container mt-7">
        <div class="flex justify-center">
            <div class="border-3 w-[50%] border-gray-950 p-10 rounded-3xl shadow-lg">
                <form action="{{ route('article-store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-5">
                        <label for="title" class="tw-form-label-create-article">Titolo</label>
                        <input name="title" type="text" id="title" class="tw-form-input-create-article" />
                        @error('title')
                            <span class="tw-form-span-message">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label for="subtitle" class="tw-form-label-create-article">Sottotitolo</label>
                        <input name="subtitle" type="text" id="subtitle" class="tw-form-input-create-article" />
                        @error('subtitle')
                            <span class="tw-form-span-message">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label for="body" class="tw-form-label-create-article">Descrizione</label>
                        <textarea name="body" id="body" class="border-2 border-gray-950 w-full rounded"></textarea>
                        @error('body')
                            <span class="tw-form-span-message">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label for="image" class="tw-form-label-create-article">Immagine</label>
                        <input name="image" type="file" id="image" class="tw-form-input-create-article" />
                        @error('image')
                            <span class="tw-form-span-message">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label for="category" class="tw-form-label-create-article">Categoria</label>
                        <select name="category" id="category">
                            <option selected disabled>Seleziona Categoria</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category')
                            <span class="tw-form-span-message">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label for="tag" class="tw-form-label-create-article">Tag</label>
                        <input name="tags" type="text" id="tags" value="{{ old('tags') }}" class="tw-form-input-create-article" />
                        <small>Dividi ogni tag con una virgola</small>
                        @error('tag')
                            <span class="tw-form-span-message">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit"
                        class="bg-blue-600 text-white p-2 rounded w-full cursor-pointer text-lg mt-4">Inserisci
                        Articolo</button>
                </form>
            </div>
        </div>
    </div>

</x-layouts.layout>
