@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Tags beheer</h1>
        <a href="{{ route('admin.tags.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            Nieuwe tag
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded shadow overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-3 text-left">Naam</th>
                    <th class="px-4 py-3 text-left">Aantal brillen</th>
                    <th class="px-4 py-3 text-left">Acties</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse($tags as $tag)
                    <tr>
                        <td class="px-4 py-3 font-medium">{{ $tag->name }}</td>
                        <td class="px-4 py-3">{{ $tag->glasses_count }}</td>
                        <td class="px-4 py-3">
                            <div class="flex gap-2">
                                <a href="{{ route('admin.tags.edit', $tag) }}" class="text-blue-600 hover:underline">Bewerken</a>
                                <form action="{{ route('admin.tags.destroy', $tag) }}" method="POST" onsubmit="return confirm('Weet je zeker dat je deze tag wilt verwijderen?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Verwijderen</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="px-4 py-8 text-center text-gray-500">Geen tags gevonden.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        <a href="{{ route('admin.glasses.index') }}" class="text-blue-600 hover:underline">← Terug naar brillen</a>
    </div>
</div>
@endsection
