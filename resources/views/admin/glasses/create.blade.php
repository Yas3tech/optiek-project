@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto py-6">
    <h1 class="text-2xl font-bold mb-6">Nieuwe bril toevoegen</h1>

    <form action="{{ route('admin.glasses.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4 bg-white p-6 rounded shadow">
        @csrf

        <div>
            <label for="name" class="block font-medium mb-1">Naam *</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required
                   class="w-full border rounded p-2" maxlength="255">
            @error('name')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="brand" class="block font-medium mb-1">Merk *</label>
            <input type="text" name="brand" id="brand" value="{{ old('brand') }}" required
                   class="w-full border rounded p-2" maxlength="255">
            @error('brand')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label for="price" class="block font-medium mb-1">Prijs (€) *</label>
                <input type="number" name="price" id="price" value="{{ old('price') }}" required
                       class="w-full border rounded p-2" step="0.01" min="0">
                @error('price')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="stock" class="block font-medium mb-1">Voorraad *</label>
                <input type="number" name="stock" id="stock" value="{{ old('stock', 0) }}" required
                       class="w-full border rounded p-2" min="0">
                @error('stock')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div>
            <label for="description" class="block font-medium mb-1">Beschrijving</label>
            <textarea name="description" id="description" rows="3" class="w-full border rounded p-2">{{ old('description') }}</textarea>
            @error('description')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="image" class="block font-medium mb-1">Afbeelding</label>
            <input type="file" name="image" id="image" accept="image/*" class="w-full border rounded p-2">
            @error('image')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block font-medium mb-2">Tags</label>
            <div class="flex flex-wrap gap-3">
                @foreach($tags as $tag)
                    <label class="flex items-center gap-1">
                        <input type="checkbox" name="tags[]" value="{{ $tag->id }}"
                            {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }}>
                        <span>{{ $tag->name }}</span>
                    </label>
                @endforeach
            </div>
            @error('tags')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex gap-3 pt-4">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Toevoegen
            </button>
            <a href="{{ route('admin.glasses.index') }}" class="px-4 py-2 border rounded hover:bg-gray-50">
                Annuleren
            </a>
        </div>
    </form>
</div>
@endsection
