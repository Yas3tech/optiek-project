@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto py-6">
    <div class="bg-white rounded shadow p-6">
        <div class="flex items-start gap-6">
            {{-- Avatar --}}
            <div class="flex-shrink-0">
                @if ($user->avatar)
                    <img src="{{ asset('storage/' . $user->avatar) }}" 
                         alt="{{ $user->name }}" 
                         class="w-24 h-24 rounded-full object-cover">
                @else
                    <div class="w-24 h-24 rounded-full bg-gray-200 flex items-center justify-center">
                        <span class="text-3xl text-gray-500">{{ strtoupper(substr($user->name, 0, 1)) }}</span>
                    </div>
                @endif
            </div>

            {{-- Profile Info --}}
            <div class="flex-1">
                <h1 class="text-2xl font-bold">{{ $user->name }}</h1>
                
                @if ($user->birthday)
                    <p class="text-gray-600 mt-1">
                        <span class="font-medium">Verjaardag:</span> 
                        {{ $user->birthday->format('d/m/Y') }}
                    </p>
                @endif

                @if ($user->about_me)
                    <div class="mt-4">
                        <h2 class="font-medium text-gray-700">Over mij</h2>
                        <p class="mt-1 text-gray-600 whitespace-pre-line">{{ $user->about_me }}</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="mt-4">
        <a href="{{ url()->previous() }}" class="text-blue-600 hover:underline">&larr; Terug</a>
    </div>
</div>
@endsection
