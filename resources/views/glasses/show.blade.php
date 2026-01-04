@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-6 px-4">
    <a href="{{ route('glasses.index') }}" class="text-blue-600 hover:underline mb-4 inline-block">
        ← Terug naar overzicht
    </a>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="md:flex">
            <div class="md:w-1/2 bg-gray-100">
                @if($glass->image)
                    <img src="{{ asset('storage/' . $glass->image) }}" alt="{{ $glass->name }}" class="w-full h-full object-cover">
                @else
                    <div class="w-full h-64 md:h-full flex items-center justify-center text-gray-400">
                        <svg class="w-24 h-24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                @endif
            </div>

            <div class="md:w-1/2 p-6">
                <p class="text-gray-500 text-sm">{{ $glass->brand }}</p>
                <h1 class="text-2xl font-bold mb-2">{{ $glass->name }}</h1>

                <div class="flex flex-wrap gap-2 mb-4">
                    @foreach($glass->tags as $tag)
                        <span class="bg-blue-100 text-blue-800 text-sm px-3 py-1 rounded">{{ $tag->name }}</span>
                    @endforeach
                </div>

                <p class="text-3xl font-bold text-blue-600 mb-4">
                    €{{ number_format($glass->price, 2, ',', '.') }}
                </p>

                <div class="mb-4">
                    @if($glass->stock > 0)
                        <span class="text-green-600">✓ Op voorraad ({{ $glass->stock }})</span>
                    @else
                        <span class="text-red-600">✗ Niet op voorraad</span>
                    @endif
                </div>

                @if($glass->description)
                    <div class="border-t pt-4 mt-4">
                        <h2 class="font-semibold mb-2">Beschrijving</h2>
                        <p class="text-gray-600">{{ $glass->description }}</p>
                    </div>
                @endif

                <div class="border-t pt-4 mt-4">
                    <p class="text-sm text-gray-500">
                        Interesse in dit product? <a href="{{ route('contact.form') }}" class="text-blue-600 hover:underline">Neem contact op</a> of maak een afspraak in onze winkel.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
