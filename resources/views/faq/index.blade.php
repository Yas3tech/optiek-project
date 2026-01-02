@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-6">
    <h1 class="text-3xl font-bold mb-6">Veelgestelde vragen</h1>

    @if ($categories->isEmpty())
        <p class="text-gray-600">Er zijn nog geen FAQ's beschikbaar.</p>
    @else
        <div class="space-y-8">
            @foreach ($categories as $category)
                <div class="bg-white rounded shadow">
                    <h2 class="text-xl font-semibold p-4 bg-gray-50 border-b">
                        {{ $category->name }}
                    </h2>
                    
                    <div class="divide-y">
                        @forelse ($category->faqs as $faq)
                            <details class="group">
                                <summary class="flex justify-between items-center p-4 cursor-pointer hover:bg-gray-50">
                                    <span class="font-medium text-gray-800">{{ $faq->question }}</span>
                                    <svg class="w-5 h-5 text-gray-500 group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                    </svg>
                                </summary>
                                <div class="px-4 pb-4 text-gray-600 whitespace-pre-line">
                                    {{ $faq->answer }}
                                </div>
                            </details>
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
