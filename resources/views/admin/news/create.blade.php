@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto py-6">
    <h1 class="text-2xl font-bold mb-4">Nieuws toevoegen</h1>

    @if ($errors->any())
        <div class="mb-4 p-3 rounded bg-red-100 text-red-800">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ url('/admin/news') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <div>
            <label class="block font-medium">Titel</label>
            <input type="text" name="title" value="{{ old('title') }}" required class="w-full border rounded p-2">
        </div>

        <div>
            <label class="block font-medium">Publicatiedatum</label>
            <input type="date" name="published_at" value="{{ old('published_at') }}" required class="w-full border rounded p-2">
        </div>

        <div>
            <label class="block font-medium">Afbeelding (optioneel)</label>
            <input type="file" name="image" accept="image/*" class="w-full">
        </div>

        <div>
            <label class="block font-medium">Inhoud</label>
            <textarea name="content" rows="8" required class="w-full border rounded p-2">{{ old('content') }}</textarea>
        </div>

        <div class="flex gap-3">
            <button type="submit" class="px-4 py-2 border rounded">Opslaan</button>
            <a href="{{ route('news.index') }}" class="px-4 py-2 border rounded">Annuleren</a>
        </div>
    </form>
</div>
@endsection
