@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto py-6">
    <h1 class="text-2xl font-bold mb-6">Nieuwe vraag</h1>

    <form action="{{ route('admin.faq.store-faq') }}" method="POST" class="space-y-4 bg-white p-6 rounded shadow">
        @csrf

        <div>
            <label for="faq_category_id" class="block font-medium mb-1">Categorie</label>
            <select name="faq_category_id" id="faq_category_id" required class="w-full border rounded p-2">
                <option value="">Selecteer een categorie</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('faq_category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('faq_category_id')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="question" class="block font-medium mb-1">Vraag</label>
            <input type="text" name="question" id="question" value="{{ old('question') }}" required
                   class="w-full border rounded p-2" maxlength="500">
            @error('question')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="answer" class="block font-medium mb-1">Antwoord</label>
            <textarea name="answer" id="answer" rows="5" required class="w-full border rounded p-2">{{ old('answer') }}</textarea>
            @error('answer')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="position" class="block font-medium mb-1">Positie (volgorde)</label>
            <input type="number" name="position" id="position" value="{{ old('position', 0) }}" min="0"
                   class="w-full border rounded p-2">
            @error('position')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex gap-3 pt-4">
            <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                Aanmaken
            </button>
            <a href="{{ route('admin.faq.index') }}" class="px-4 py-2 border rounded hover:bg-gray-50">
                Annuleren
            </a>
        </div>
    </form>
</div>
@endsection
