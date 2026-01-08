@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto py-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Nieuws beheer</h1>
        <a href="{{ route('admin.news.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            Nieuw artikel
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded shadow overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-3 text-left">Afbeelding</th>
                    <th class="px-4 py-3 text-left">Titel</th>
                    <th class="px-4 py-3 text-left">Auteur</th>
                    <th class="px-4 py-3 text-left">Gepubliceerd op</th>
                    <th class="px-4 py-3 text-left">Acties</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse($newsItems as $item)
                    <tr>
                        <td class="px-4 py-3">
                            @if($item->image_path)
                                <img src="{{ asset('storage/' . $item->image_path) }}" alt="{{ $item->title }}" class="w-16 h-12 object-cover rounded">
                            @else
                                <div class="w-16 h-12 bg-gray-200 rounded flex items-center justify-center text-gray-400">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                            @endif
                        </td>
                        <td class="px-4 py-3 font-medium">
                            <a href="{{ route('news.show', $item) }}" class="hover:underline">
                                {{ Str::limit($item->title, 50) }}
                            </a>
                        </td>
                        <td class="px-4 py-3">{{ $item->user?->name ?? 'Onbekend' }}</td>
                        <td class="px-4 py-3">
                            {{ $item->published_at ? \Carbon\Carbon::parse($item->published_at)->format('d/m/Y') : 'Niet gepubliceerd' }}
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex gap-2">
                                <a href="{{ route('admin.news.edit', $item) }}" class="text-blue-600 hover:underline">Bewerken</a>
                                <form action="{{ route('admin.news.destroy', $item) }}" method="POST" onsubmit="return confirm('Weet je zeker dat je dit nieuwsartikel wilt verwijderen?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Verwijderen</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-8 text-center text-gray-500">Geen nieuwsartikelen gevonden.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($newsItems->hasPages())
        <div class="mt-4">
            {{ $newsItems->links() }}
        </div>
    @endif
</div>
@endsection
