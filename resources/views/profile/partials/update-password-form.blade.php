<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            Wachtwoord wijzigen
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            Zorg ervoor dat je account een lang, willekeurig wachtwoord gebruikt om veilig te blijven.
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <label for="update_password_current_password" class="block font-medium text-sm text-gray-700">Huidig wachtwoord</label>
            <input id="update_password_current_password" name="current_password" type="password" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" autocomplete="current-password">
            @error('current_password', 'updatePassword')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="update_password_password" class="block font-medium text-sm text-gray-700">Nieuw wachtwoord</label>
            <input id="update_password_password" name="password" type="password" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" autocomplete="new-password">
            @error('password', 'updatePassword')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="update_password_password_confirmation" class="block font-medium text-sm text-gray-700">Bevestig wachtwoord</label>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" autocomplete="new-password">
            @error('password_confirmation', 'updatePassword')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Opslaan</button>

            @if (session('status') === 'password-updated')
                <p class="text-sm text-gray-600">Opgeslagen.</p>
            @endif
        </div>
    </form>
</section>
