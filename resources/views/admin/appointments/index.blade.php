@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto py-6 px-4">
    <h1 class="text-2xl font-bold mb-6">Afspraken beheer</h1>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="flex gap-2 mb-6">
        <a href="{{ route('admin.appointments.index') }}" 
           class="px-3 py-1 rounded {{ !request('status') ? 'bg-blue-600 text-white' : 'bg-gray-200 hover:bg-gray-300' }}">
            Alle
        </a>
        <a href="{{ route('admin.appointments.index', ['status' => 'pending']) }}" 
           class="px-3 py-1 rounded {{ request('status') == 'pending' ? 'bg-yellow-500 text-white' : 'bg-gray-200 hover:bg-gray-300' }}">
            In afwachting
        </a>
        <a href="{{ route('admin.appointments.index', ['status' => 'approved']) }}" 
           class="px-3 py-1 rounded {{ request('status') == 'approved' ? 'bg-green-600 text-white' : 'bg-gray-200 hover:bg-gray-300' }}">
            Bevestigd
        </a>
        <a href="{{ route('admin.appointments.index', ['status' => 'rejected']) }}" 
           class="px-3 py-1 rounded {{ request('status') == 'rejected' ? 'bg-red-600 text-white' : 'bg-gray-200 hover:bg-gray-300' }}">
            Afgewezen
        </a>
    </div>

    <div class="bg-white rounded shadow overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-3 text-left">Klant</th>
                    <th class="px-4 py-3 text-left">Datum</th>
                    <th class="px-4 py-3 text-left">Tijd</th>
                    <th class="px-4 py-3 text-left">Reden</th>
                    <th class="px-4 py-3 text-left">Telefoon</th>
                    <th class="px-4 py-3 text-left">Status</th>
                    <th class="px-4 py-3 text-left">Acties</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse($appointments as $appointment)
                    <tr>
                        <td class="px-4 py-3">
                            <a href="{{ route('users.show', $appointment->user) }}" class="text-blue-600 hover:underline">
                                {{ $appointment->user->name }}
                            </a>
                            <div class="text-sm text-gray-500">{{ $appointment->user->email }}</div>
                        </td>
                        <td class="px-4 py-3">{{ $appointment->date->format('d/m/Y') }}</td>
                        <td class="px-4 py-3">{{ $appointment->time_slot }}</td>
                        <td class="px-4 py-3">{{ $appointment->reason }}</td>
                        <td class="px-4 py-3">{{ $appointment->phone ?: '-' }}</td>
                        <td class="px-4 py-3">
                            @if($appointment->isPending())
                                <span class="bg-yellow-100 text-yellow-800 text-xs px-2 py-1 rounded">In afwachting</span>
                            @elseif($appointment->isApproved())
                                <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded">Bevestigd</span>
                            @else
                                <span class="bg-red-100 text-red-800 text-xs px-2 py-1 rounded">Afgewezen</span>
                            @endif
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex gap-2">
                                @if($appointment->isPending())
                                    <form action="{{ route('admin.appointments.approve', $appointment) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="bg-green-600 text-white px-3 py-1 rounded text-sm hover:bg-green-700">
                                            Bevestigen
                                        </button>
                                    </form>
                                    <form action="{{ route('admin.appointments.reject', $appointment) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded text-sm hover:bg-red-700">
                                            Afwijzen
                                        </button>
                                    </form>
                                @endif
                                <form action="{{ route('admin.appointments.destroy', $appointment) }}" method="POST" onsubmit="return confirm('Weet je zeker dat je deze afspraak wilt verwijderen?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-gray-500 hover:underline">Verwijderen</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-4 py-8 text-center text-gray-500">Geen afspraken gevonden.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
