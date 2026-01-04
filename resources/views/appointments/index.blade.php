@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-6 px-4">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Mijn Afspraken</h1>
        <a href="{{ route('appointments.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            Nieuwe afspraak
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    <div class="space-y-4">
        @forelse($appointments as $appointment)
            <div class="bg-white rounded-lg shadow p-4">
                <div class="flex justify-between items-start">
                    <div>
                        <div class="flex items-center gap-2 mb-2">
                            <span class="font-semibold text-lg">
                                {{ $appointment->date->format('d/m/Y') }}
                            </span>
                            <span class="text-gray-600">om {{ $appointment->time_slot }}</span>
                            @if($appointment->isPending())
                                <span class="bg-yellow-100 text-yellow-800 text-xs px-2 py-1 rounded">In afwachting</span>
                            @elseif($appointment->isApproved())
                                <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded">Bevestigd</span>
                            @else
                                <span class="bg-red-100 text-red-800 text-xs px-2 py-1 rounded">Afgewezen</span>
                            @endif
                        </div>
                        <p class="text-gray-600"><strong>Reden:</strong> {{ $appointment->reason }}</p>
                        @if($appointment->phone)
                            <p class="text-gray-500 text-sm mt-1">Tel: {{ $appointment->phone }}</p>
                        @endif
                    </div>

                    @if($appointment->isPending())
                        <form action="{{ route('appointments.destroy', $appointment) }}" method="POST" onsubmit="return confirm('Weet je zeker dat je deze afspraak wilt annuleren?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline text-sm">
                                Annuleren
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        @empty
            <div class="bg-white rounded-lg shadow p-8 text-center text-gray-500">
                <p>Je hebt nog geen afspraken.</p>
                <a href="{{ route('appointments.create') }}" class="text-blue-600 hover:underline mt-2 inline-block">
                    Maak je eerste afspraak
                </a>
            </div>
        @endforelse
    </div>
</div>
@endsection
