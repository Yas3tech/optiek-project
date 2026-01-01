<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            Account verwijderen
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            Zodra je account is verwijderd, worden alle gegevens permanent verwijderd.
        </p>
    </header>

    <form method="post" action="{{ route('profile.destroy') }}" class="mt-6" onsubmit="return confirm('Weet je zeker dat je je account wilt verwijderen? Dit kan niet ongedaan worden gemaakt.')">
        @csrf
        @method('delete')

        <div class="mb-4">
            <label for="delete_password" class="block font-medium text-sm text-gray-700">Wachtwoord ter bevestiging</label>
            <input id="delete_password" name="password" type="password" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Je wachtwoord" required>
            @error('password', 'userDeletion')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
            Account verwijderen
        </button>
    </form>
</section>
