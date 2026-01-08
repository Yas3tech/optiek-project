@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto py-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Contactberichten</h1>
        <div class="flex gap-2">
            <a href="{{ route('admin.contact.index') }}" 
               class="px-4 py-2 rounded {{ !request('status') ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}">
                Alle
            </a>
            <a href="{{ route('admin.contact.index', ['status' => 'pending']) }}" 
               class="px-4 py-2 rounded {{ request('status') === 'pending' ? 'bg-yellow-500 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}">
                Onbeantwoord
            </a>
            <a href="{{ route('admin.contact.index', ['status' => 'answered']) }}" 
               class="px-4 py-2 rounded {{ request('status') === 'answered' ? 'bg-green-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}">
                Beantwoord
            </a>
        </div>
    </div>

    @if (session('success'))
        <div class="mb-4 p-3 rounded bg-green-100 text-green-800">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded shadow overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Naam</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Onderwerp</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Datum</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actie</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($messages as $message)
                    <tr class="{{ $message->isPending() ? 'bg-yellow-50' : '' }}">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="font-medium text-gray-900">{{ $message->name }}</div>
                            <div class="text-sm text-gray-500">{{ $message->email }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-gray-900">{{ Str::limit($message->subject, 30) }}</div>
                            <div class="text-sm text-gray-500">{{ Str::limit($message->message, 50) }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $message->created_at->format('d/m/Y H:i') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if ($message->isPending())
                                <span class="px-2 py-1 text-xs font-semibold rounded bg-yellow-100 text-yellow-800">
                                    Onbeantwoord
                                </span>
                            @else
                                <span class="px-2 py-1 text-xs font-semibold rounded bg-green-100 text-green-800">
                                    Beantwoord
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <a href="{{ route('admin.contact.show', $message) }}" 
                               class="px-3 py-1 text-sm rounded bg-blue-600 text-white hover:bg-blue-700">
                                Bekijken
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                            Geen berichten gevonden.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $messages->links() }}
    </div>
</div>
@endsection
