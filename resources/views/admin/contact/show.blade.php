@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-6">
    <div class="mb-6">
        <a href="{{ route('admin.contact.index') }}" class="text-blue-600 hover:underline">
            ← Terug naar berichten
        </a>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <!-- Header -->
        <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-start">
            <div>
                <h1 class="text-xl font-bold text-gray-900">{{ $message->subject }}</h1>
                <p class="text-sm text-gray-500 mt-1">
                    Van: <strong>{{ $message->name }}</strong> ({{ $message->email }})
                    @if($message->phone)
                        · Tel: {{ $message->phone }}
                    @endif
                </p>
                <p class="text-sm text-gray-400">
                    Verzonden op {{ $message->created_at->format('d/m/Y om H:i') }}
                </p>
            </div>
            <div>
                @if ($message->isPending())
                    <span class="px-3 py-1 text-sm font-semibold rounded bg-yellow-100 text-yellow-800">
                        Onbeantwoord
                    </span>
                @else
                    <span class="px-3 py-1 text-sm font-semibold rounded bg-green-100 text-green-800">
                        Beantwoord
                    </span>
                @endif
            </div>
        </div>

        <!-- Message Content -->
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-sm font-semibold text-gray-600 uppercase mb-2">Bericht</h3>
            <div class="text-gray-800 whitespace-pre-wrap bg-gray-50 p-4 rounded">{{ $message->message }}</div>
        </div>

        <!-- Admin Response Section -->
        @if($message->isAnswered())
            <div class="px-6 py-4 bg-green-50 border-b border-gray-200">
                <h3 class="text-sm font-semibold text-green-700 uppercase mb-2">Uw antwoord</h3>
                <div class="text-gray-800 whitespace-pre-wrap bg-white p-4 rounded border border-green-200">{{ $message->admin_response }}</div>
                <p class="text-sm text-gray-500 mt-2">
                    Beantwoord door {{ $message->respondedBy?->name ?? 'Onbekend' }} 
                    op {{ $message->responded_at?->format('d/m/Y om H:i') }}
                </p>
            </div>
        @else
            <!-- Response Form -->
            <div class="px-6 py-4">
                <h3 class="text-sm font-semibold text-gray-600 uppercase mb-3">Beantwoorden</h3>
                <form action="{{ route('admin.contact.respond', $message) }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <textarea 
                            name="admin_response" 
                            rows="5" 
                            required
                            placeholder="Typ hier uw antwoord..."
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        >{{ old('admin_response') }}</textarea>
                        @error('admin_response')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex gap-3">
                        <button type="submit" class="px-6 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700">
                            Verstuur antwoord
                        </button>
                        <a href="{{ route('admin.contact.index') }}" class="px-6 py-2 bg-gray-200 text-gray-700 font-medium rounded-lg hover:bg-gray-300">
                            Annuleren
                        </a>
                    </div>
                </form>
            </div>
        @endif
    </div>
</div>
@endsection
