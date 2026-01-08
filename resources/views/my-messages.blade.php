<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Mijn berichten
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            
            @if($messages->isEmpty())
                <div class="bg-white rounded-lg shadow p-8 text-center">
                    <div style="width: 64px; height: 64px; background: #f3f4f6; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 16px;">
                        <svg style="width: 32px; height: 32px; color: #9ca3af;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <p class="text-gray-600 mb-4">U heeft nog geen berichten verstuurd.</p>
                    <a href="{{ route('contact.form') }}" class="inline-block px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                        Contact opnemen
                    </a>
                </div>
            @else
                <div class="space-y-4">
                    @foreach($messages as $message)
                        <div class="bg-white rounded-lg shadow overflow-hidden">
                            <!-- Message Header -->
                            <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-start">
                                <div>
                                    <h3 class="font-semibold text-gray-900">{{ $message->subject }}</h3>
                                    <p class="text-sm text-gray-500">Verzonden op {{ $message->created_at->format('d/m/Y om H:i') }}</p>
                                </div>
                                <div>
                                    @if ($message->isPending())
                                        <span class="px-2 py-1 text-xs font-semibold rounded bg-yellow-100 text-yellow-800">
                                            Wacht op antwoord
                                        </span>
                                    @else
                                        <span class="px-2 py-1 text-xs font-semibold rounded bg-green-100 text-green-800">
                                            Beantwoord
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <!-- Original Message -->
                            <div class="px-6 py-4 {{ $message->isAnswered() ? 'border-b border-gray-200' : '' }}">
                                <p class="text-sm font-medium text-gray-600 mb-1">Uw bericht:</p>
                                <p class="text-gray-800 whitespace-pre-wrap">{{ $message->message }}</p>
                            </div>

                            <!-- Admin Response -->
                            @if($message->isAnswered())
                                <div class="px-6 py-4 bg-green-50">
                                    <p class="text-sm font-medium text-green-700 mb-1">Antwoord van Opticalium:</p>
                                    <p class="text-gray-800 whitespace-pre-wrap">{{ $message->admin_response }}</p>
                                    <p class="text-xs text-gray-500 mt-2">
                                        Ontvangen op {{ $message->responded_at?->format('d/m/Y om H:i') }}
                                    </p>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
