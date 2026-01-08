@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto py-6">
    <h1 class="text-2xl font-bold mb-6">Nieuwe gebruiker aanmaken</h1>

    @if ($errors->any())
        <div class="mb-4 p-3 rounded bg-red-100 text-red-800">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.users.store') }}" method="POST" class="space-y-4 bg-white p-6 rounded shadow">
        @csrf

        <div>
            <label for="name" class="block font-medium mb-1">Naam</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required
                   class="w-full border rounded p-2" maxlength="255">
        </div>

        <div>
            <label for="email" class="block font-medium mb-1">E-mailadres</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required
                   class="w-full border rounded p-2" maxlength="255">
        </div>

        <div>
            <label for="username" class="block font-medium mb-1">Gebruikersnaam</label>
            <input type="text" name="username" id="username" value="{{ old('username') }}" required
                   class="w-full border rounded p-2" maxlength="50">
        </div>

        <div>
            <label for="phone" class="block font-medium mb-1">Telefoonnummer</label>
            <input type="text" name="phone" id="phone" value="{{ old('phone') }}" required
                   class="w-full border rounded p-2" maxlength="20">
        </div>

        <div>
            <label for="birthday" class="block font-medium mb-1">Geboortedatum</label>
            <input type="date" name="birthday" id="birthday" value="{{ old('birthday') }}" required
                   class="w-full border rounded p-2">
        </div>

        <div>
            <label for="password" class="block font-medium mb-1">Wachtwoord</label>
            <input type="password" name="password" id="password" required
                   class="w-full border rounded p-2" minlength="8">
        </div>

        <div>
            <label for="password_confirmation" class="block font-medium mb-1">Wachtwoord bevestigen</label>
            <input type="password" name="password_confirmation" id="password_confirmation" required
                   class="w-full border rounded p-2" minlength="8">
        </div>

        <div class="flex items-center gap-2">
            <input type="checkbox" name="is_admin" id="is_admin" value="1" {{ old('is_admin') ? 'checked' : '' }}
                   class="rounded border-gray-300">
            <label for="is_admin" class="font-medium">Maak admin</label>
        </div>

        <div class="flex gap-3 pt-4">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Aanmaken
            </button>
            <a href="{{ route('admin.users.index') }}" class="px-4 py-2 border rounded hover:bg-gray-50">
                Annuleren
            </a>
        </div>
    </form>
</div>
@endsection
