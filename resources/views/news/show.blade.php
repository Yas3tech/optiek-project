@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-6">
    <a href="{{ route('news.index') }}" class="underline">&larr; Terug naar nieuws</a>

    @if (session('success'))
        <div class="mt-4 mb-4 p-3 rounded bg-green-100 text-green-800">
            {{ session('success') }}
        </div>
    @endif

    <h1 class="text-3xl font-bold mt-4">{{ $news->title }}</h1>

    <p class="text-sm text-gray-600 mt-1">
        Gepubliceerd op {{ \Carbon\Carbon::parse($news->published_at)->format('d/m/Y') }}
        @if($news->user)
            — door {{ $news->user->name }}
        @endif
    </p>

    @if ($news->image_path)
        <div style="display: flex; justify-content: center; margin-top: 1rem;">
            <img src="{{ asset('storage/'.$news->image_path) }}" 
                 alt="{{ $news->title }}" 
                 style="max-width: 100%; height: auto; max-height: 500px; object-fit: cover; border-radius: 0.5rem; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);"
                 class="shadow-md">
        </div>
    @endif

    <div class="mt-6 text-gray-900 whitespace-pre-line">
        {{ $news->content }}
    </div>
</div>
@endsection
