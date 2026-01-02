@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto py-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">FAQ Beheer</h1>
        <div class="flex gap-2">
            <a href="{{ route('admin.faq.create-category') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Nieuwe categorie
            </a>
            <a href="{{ route('admin.faq.create-faq') }}" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                Nieuwe vraag
            </a>
        </div>
    </div>

    @if (session('success'))
        <div class="mb-4 p-3 rounded bg-green-100 text-green-800">
            {{ session('success') }}
        </div>
    @endif

    @if ($categories->isEmpty())
        <p class="text-gray-600">Nog geen categorieën. Maak er een aan!</p>
    @else
        <div class="space-y-6">
            @foreach ($categories as $category)
                <div class="bg-white rounded shadow">
                    <div class="flex justify-between items-center p-4 bg-gray-50 border-b">
                        <h2 class="text-lg font-semibold">{{ $category->name }}</h2>
                        <div class="flex gap-2">
                            <a href="{{ route('admin.faq.edit-category', $category) }}" class="text-blue-600 hover:underline text-sm">Bewerken</a>
                            <form action="{{ route('admin.faq.destroy-category', $category) }}" method="POST" onsubmit="return confirm('Let op: alle vragen in deze categorie worden ook verwijderd!')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline text-sm">Verwijderen</button>
                            </form>
                        </div>
                    </div>
                    
                    <div class="divide-y">
                        @forelse ($category->faqs as $faq)
                            <div class="p-4 flex justify-between items-start">
                                <div>
                                    <p class="font-medium">{{ $faq->question }}</p>
                                    <p class="text-sm text-gray-600 mt-1">{{ Str::limit($faq->answer, 100) }}</p>
                                </div>
                                <div class="flex gap-2 flex-shrink-0">
                                    <a href="{{ route('admin.faq.edit-faq', $faq) }}" class="text-blue-600 hover:underline text-sm">Bewerken</a>
                                    <form action="{{ route('admin.faq.destroy-faq', $faq) }}" method="POST" onsubmit="return confirm('Weet je zeker dat je deze vraag wilt verwijderen?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline text-sm">Verwijderen</button>
                                    </form>
                                </div>
                            </div>
                        @empty
                            <p class="p-4 text-gray-500">Geen vragen in deze categorie.</p>
                        @endforelse
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
