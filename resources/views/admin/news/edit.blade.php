@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto py-6">
    <h1 class="text-2xl font-bold mb-4">Nieuwsitem bewerken</h1>

    @if ($errors->any())
        <div class="mb-4 p-3 rounded bg-red-100 text-red-800">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ url('/admin/news/'.$news->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block font-medium">Titel</label>
            <input type="text" name="title" value="{{ old('title', $news->title) }}" required class="w-full border rounded p-2">
        </div>

        <div>
            <label class="block font-medium">Publicatiedatum</label>
            <input type="date" name="published_at" value="{{ old('published_at', $news->published_at) }}" required class="w-full border rounded p-2">
        </div>

        <div>
            <label class="block font-medium">Huidige afbeelding</label>
            @if ($news->image_path)
                <div class="mt-2">
                    <img src="{{ asset('storage/'.$news->image_path) }}" alt="{{ $news->title }}" class="w-48 h-32 object-cover rounded border">
                </div>
            @else
                <p class="text-sm text-gray-600">Geen afbeelding.</p>
            @endif
        </div>

        <div>
            <label class="block font-medium">Nieuwe afbeelding (optioneel)</label>
            <input type="file" name="image" accept="image/*" class="w-full">
            <p class="text-sm text-gray-600 mt-1">Als je een nieuwe uploadt, wordt de oude vervangen.</p>
        </div>

        <div>
            <label class="block font-medium">Content</label>
            <textarea name="content" rows="8" required class="w-full border rounded p-2">{{ old('content', $news->content) }}</textarea>
        </div>

        <div class="flex gap-3 pt-4">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white font-medium rounded hover:bg-blue-700">
                Opslaan
            </button>
            <a href="{{ route('admin.news.index') }}" class="px-4 py-2 border rounded hover:bg-gray-50">
                Annuleren
            </a>
        </div>
    </form>

    <form action="{{ url('/admin/news/'.$news->id) }}" method="POST" class="mt-8 pt-6 border-t">
        @csrf
        @method('DELETE')
        <button type="submit" class="px-4 py-2 bg-red-600 text-white font-medium rounded hover:bg-red-700"
                onclick="return confirm('Ben je zeker dat je dit nieuwsitem wil verwijderen?')">
            Nieuwsitem verwijderen
        </button>
    </form>
</div>
@endsection
