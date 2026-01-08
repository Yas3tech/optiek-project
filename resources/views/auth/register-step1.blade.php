@extends('layouts.guest')

@section('content')
<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        <h2 class="text-xl font-bold text-center mb-6">Registreren - Stap 1 van 2</h2>
        <p class="text-sm text-gray-600 text-center mb-4">Persoonlijke gegevens</p>

        <div class="flex justify-center mb-6">
            <div class="flex items-center">
                <div class="w-8 h-8 bg-blue-600 text-white rounded-full flex items-center justify-center font-bold">1</div>
                <div class="w-16 h-1 bg-gray-300"></div>
                <div class="w-8 h-8 bg-gray-300 text-gray-500 rounded-full flex items-center justify-center font-bold">2</div>
            </div>
        </div>

        <form method="POST" action="{{ route('register.step1') }}">
            @csrf

            <div>
                <label for="first_name" class="block font-medium text-sm text-gray-700">Voornaam *</label>
                <input id="first_name" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" 
                       type="text" name="first_name" value="{{ old('first_name') }}" required autofocus maxlength="255">
                @error('first_name')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-4">
                <label for="last_name" class="block font-medium text-sm text-gray-700">Achternaam *</label>
                <input id="last_name" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" 
                       type="text" name="last_name" value="{{ old('last_name') }}" required maxlength="255">
                @error('last_name')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-4">
                <label for="username" class="block font-medium text-sm text-gray-700">Gebruikersnaam (weergavenaam) *</label>
                <input id="username" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" 
                       type="text" name="username" value="{{ old('username') }}" required maxlength="50">
                @error('username')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-4">
                <label for="phone" class="block font-medium text-sm text-gray-700">Telefoonnummer *</label>
                <input id="phone" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" 
                       type="tel" name="phone" value="{{ old('phone') }}" placeholder="+32 ..." required maxlength="20">
                @error('phone')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-4">
                <label for="birthday" class="block font-medium text-sm text-gray-700">Geboortedatum *</label>
                <input id="birthday" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" 
                       type="date" name="birthday" value="{{ old('birthday') }}" required>
                @error('birthday')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between mt-6">
                <a class="text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    Al een account?
                </a>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Volgende →
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
