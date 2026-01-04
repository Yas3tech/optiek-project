@extends('layouts.guest')

@section('content')
<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        <h2 class="text-xl font-bold text-center mb-6">Registreren - Stap 2 van 2</h2>
        <p class="text-sm text-gray-600 text-center mb-4">Account gegevens</p>

        <div class="flex justify-center mb-6">
            <div class="flex items-center">
                <div class="w-8 h-8 bg-green-600 text-white rounded-full flex items-center justify-center font-bold">✓</div>
                <div class="w-16 h-1 bg-blue-600"></div>
                <div class="w-8 h-8 bg-blue-600 text-white rounded-full flex items-center justify-center font-bold">2</div>
            </div>
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <label for="email" class="block font-medium text-sm text-gray-700">E-mailadres *</label>
                <input id="email" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" 
                       type="email" name="email" value="{{ old('email') }}" required autofocus>
                @error('email')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-4">
                <label for="password" class="block font-medium text-sm text-gray-700">Wachtwoord *</label>
                <input id="password" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" 
                       type="password" name="password" required>
                <p class="mt-1 text-xs text-gray-500">Minimaal 8 tekens</p>
                @error('password')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-4">
                <label for="password_confirmation" class="block font-medium text-sm text-gray-700">Bevestig wachtwoord *</label>
                <input id="password_confirmation" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" 
                       type="password" name="password_confirmation" required>
                @error('password_confirmation')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between mt-6">
                <a class="text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
                    ← Terug
                </a>
                <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                    Account aanmaken
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
