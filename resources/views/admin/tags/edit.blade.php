@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto py-6">
    <h1 class="text-2xl font-bold mb-6">Tag bewerken</h1>

    <form action="{{ route('admin.tags.update', $tag) }}" method="POST" class="space-y-4 bg-white p-6 rounded shadow">
        @csrf
        @method('PUT')

        <div>
            <label for="name" class="block font-medium mb-1">Naam *</label>
            <input type="text" name="name" id="name" value="{{ old('name', $tag->name) }}" required
                   class="w-full border rounded p-2" maxlength="255">
            @error('name')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex gap-3 pt-4">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Opslaan
            </button>
            <a href="{{ route('admin.tags.index') }}" class="px-4 py-2 border rounded hover:bg-gray-50">
                Annuleren
            </a>
        </div>
    </form>
</div>
@endsection
