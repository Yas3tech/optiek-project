@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto py-6 px-4">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Onze Brillen</h1>
    </div>

    <div class="flex flex-wrap gap-2 mb-6">
        <a href="{{ route('glasses.index') }}" 
           class="px-3 py-1 rounded {{ !request('tag') ? 'bg-blue-600 text-white' : 'bg-gray-200 hover:bg-gray-300' }}">
            Alle
        </a>
        @foreach($tags as $tag)
            <a href="{{ route('glasses.index', ['tag' => $tag->id]) }}" 
               class="px-3 py-1 rounded {{ request('tag') == $tag->id ? 'bg-blue-600 text-white' : 'bg-gray-200 hover:bg-gray-300' }}">
                {{ $tag->name }}
            </a>
        @endforeach
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($glasses as $glass)
            <a href="{{ route('glasses.show', $glass) }}" class="bg-white rounded-lg shadow hover:shadow-lg transition overflow-hidden">
                <div class="aspect-square bg-gray-100">
                    @if($glass->image)
                        <img src="{{ asset('storage/' . $glass->image) }}" alt="{{ $glass->name }}" class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full flex items-center justify-center text-gray-400">
                            <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                    @endif
                </div>
                <div class="p-4">
                    <p class="text-sm text-gray-500">{{ $glass->brand }}</p>
                    <h2 class="font-semibold text-lg">{{ $glass->name }}</h2>
                    <p class="text-blue-600 font-bold mt-2">€{{ number_format($glass->price, 2, ',', '.') }}</p>
                    <div class="flex flex-wrap gap-1 mt-2">
                        @foreach($glass->tags as $tag)
                            <span class="text-xs bg-gray-100 text-gray-600 px-2 py-1 rounded">{{ $tag->name }}</span>
                        @endforeach
                    </div>
                </div>
            </a>
        @empty
            <div class="col-span-full text-center py-12 text-gray-500">
                Geen brillen gevonden.
            </div>
        @endforelse
    </div>
</div>
@endsection
