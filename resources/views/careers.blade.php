<x-layout>


    <header class="flex justify-center py-16">
        <h1 class="text-6xl">Lavora con noi</h1>
    </header>

    <div class="container">
        <div class="text-center mb-5">
            <h2 class="text-2xl">Compila il Form</h2>
        </div>
        <div class="flex justify-center">
            <form action="{{ route('careers-submit') }}" method="POST">
                @csrf
                <div class="mb-5">
                    <label for="role">In cosa ti stai candidando?</label>
                    <select name="role" id="role">
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
                    <label for="email">Email</label>
                    <input name="email" type="email">
                    @error('email')
                        <span class="tw-form-span-message">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="message">Messaggio</label>
                    <textarea name="message" id="message"></textarea>
                    @error('message')
                        <span class="tw-form-span-message">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit">Invia candidatura</button>
            </form>
        </div>
    </div>


</x-layout>
