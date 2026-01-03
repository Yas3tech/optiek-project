<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            Profielinformatie
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            Werk je profielinformatie en e-mailadres bij.
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div>
            <label for="avatar" class="block font-medium text-sm text-gray-700">Avatar</label>
            <div class="mt-2 flex items-center gap-4">
                @if ($user->avatar)
                    <img src="{{ asset('storage/' . $user->avatar) }}" alt="Avatar" class="w-16 h-16 rounded-full object-cover">
                @else
                    <div class="w-16 h-16 rounded-full bg-gray-200 flex items-center justify-center">
                        <span class="text-xl text-gray-500">{{ strtoupper(substr($user->name, 0, 1)) }}</span>
                    </div>
                @endif
                <input type="file" name="avatar" id="avatar" accept="image/*" class="text-sm">
            </div>
            @error('avatar')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="name" class="block font-medium text-sm text-gray-700">Naam</label>
            <input id="name" name="name" type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('name', $user->name) }}" required autofocus>
            @error('name')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="username" class="block font-medium text-sm text-gray-700">Gebruikersnaam (weergavenaam)</label>
            <input id="username" name="username" type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('username', $user->username) }}">
            @error('username')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="email" class="block font-medium text-sm text-gray-700">E-mailadres</label>
            <input id="email" name="email" type="email" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('email', $user->email) }}" required>
            @error('email')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        Je e-mailadres is niet geverifieerd.

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md">
                            Klik hier om de verificatie-e-mail opnieuw te versturen.
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            Een nieuwe verificatielink is naar je e-mailadres gestuurd.
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div>
            <label for="birthday" class="block font-medium text-sm text-gray-700">Verjaardag</label>
            <input id="birthday" name="birthday" type="date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('birthday', $user->birthday?->format('Y-m-d')) }}">
            @error('birthday')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="about_me" class="block font-medium text-sm text-gray-700">Over mij</label>
            <textarea id="about_me" name="about_me" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" maxlength="1000">{{ old('about_me', $user->about_me) }}</textarea>
            @error('about_me')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Opslaan</button>

            @if (session('status') === 'profile-updated')
                <p class="text-sm text-gray-600">Opgeslagen.</p>
            @endif
        </div>
    </form>
</section>
