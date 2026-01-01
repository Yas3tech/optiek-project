@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-6">
    <h1 class="text-2xl font-bold mb-4">Nieuws</h1>

    @if (session('success'))
        <div class="mb-4 p-3 rounded bg-green-100 text-green-800">
            {{ session('success') }}
        </div>
    @endif

    @forelse ($newsItems as $item)
        <div class="mb-6 p-4 border rounded">
            <div class="flex items-start gap-4">
                @if ($item->image_path)
                    <img src="{{ asset('storage/'.$item->image_path) }}" alt="{{ $item->title }}" class="w-32 h-24 object-cover rounded">
                @endif

                <div class="flex-1">
                    <h2 class="text-xl font-semibold">
                        <a href="{{ route('news.show', $item) }}" class="underline">
                            {{ $item->title }}
                        </a>
                    </h2>

                    <p class="text-sm text-gray-600">
                        Gepubliceerd op {{ \Carbon\Carbon::parse($item->published_at)->format('d/m/Y') }}
                        @if($item->user)
                            — door {{ $item->user->name }}
                        @endif
                    </p>

                    <p class="mt-2 text-gray-800">
                        {{ \Illuminate\Support\Str::limit($item->content, 180) }}
                    </p>
                </div>
            </div>
        </div>
    @empty
        <p>Er zijn nog geen nieuwsitems.</p>
    @endforelse

    <div class="mt-6">
        {{ $newsItems->links() }}
    </div>
</div>
@endsection
