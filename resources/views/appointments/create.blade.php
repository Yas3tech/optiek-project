@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto py-6 px-4">
    <h1 class="text-2xl font-bold mb-6">Afspraak maken</h1>

    <form action="{{ route('appointments.store') }}" method="POST" class="bg-white rounded-lg shadow p-6 space-y-4">
        @csrf

        <div>
            <label for="date" class="block font-medium mb-1">Datum *</label>
            <input type="date" name="date" id="date" value="{{ old('date') }}" required
                   min="{{ date('Y-m-d') }}"
                   class="w-full border rounded p-2">
            @error('date')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="time_slot" class="block font-medium mb-1">Tijdslot *</label>
            <select name="time_slot" id="time_slot" required class="w-full border rounded p-2">
                <option value="">Kies een tijdslot...</option>
                <optgroup label="Voormiddag">
                    <option value="09:00" {{ old('time_slot') == '09:00' ? 'selected' : '' }}>09:00</option>
                    <option value="09:30" {{ old('time_slot') == '09:30' ? 'selected' : '' }}>09:30</option>
                    <option value="10:00" {{ old('time_slot') == '10:00' ? 'selected' : '' }}>10:00</option>
                    <option value="10:30" {{ old('time_slot') == '10:30' ? 'selected' : '' }}>10:30</option>
                    <option value="11:00" {{ old('time_slot') == '11:00' ? 'selected' : '' }}>11:00</option>
                    <option value="11:30" {{ old('time_slot') == '11:30' ? 'selected' : '' }}>11:30</option>
                </optgroup>
                <optgroup label="Namiddag">
                    <option value="14:00" {{ old('time_slot') == '14:00' ? 'selected' : '' }}>14:00</option>
                    <option value="14:30" {{ old('time_slot') == '14:30' ? 'selected' : '' }}>14:30</option>
                    <option value="15:00" {{ old('time_slot') == '15:00' ? 'selected' : '' }}>15:00</option>
                    <option value="15:30" {{ old('time_slot') == '15:30' ? 'selected' : '' }}>15:30</option>
                    <option value="16:00" {{ old('time_slot') == '16:00' ? 'selected' : '' }}>16:00</option>
                    <option value="16:30" {{ old('time_slot') == '16:30' ? 'selected' : '' }}>16:30</option>
                    <option value="17:00" {{ old('time_slot') == '17:00' ? 'selected' : '' }}>17:00</option>
                </optgroup>
            </select>
            @error('time_slot')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="reason" class="block font-medium mb-1">Reden van bezoek *</label>
            <select name="reason" id="reason" required class="w-full border rounded p-2">
                <option value="">Kies een reden...</option>
                <option value="Oogtest" {{ old('reason') == 'Oogtest' ? 'selected' : '' }}>Oogtest</option>
                <option value="Nieuwe bril" {{ old('reason') == 'Nieuwe bril' ? 'selected' : '' }}>Nieuwe bril</option>
                <option value="Contactlenzen aanpassing" {{ old('reason') == 'Contactlenzen aanpassing' ? 'selected' : '' }}>Contactlenzen aanpassing</option>
                <option value="Reparatie" {{ old('reason') == 'Reparatie' ? 'selected' : '' }}>Reparatie</option>
                <option value="Adviesgesprek" {{ old('reason') == 'Adviesgesprek' ? 'selected' : '' }}>Adviesgesprek</option>
                <option value="Andere" {{ old('reason') == 'Andere' ? 'selected' : '' }}>Andere</option>
            </select>
            @error('reason')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="phone" class="block font-medium mb-1">Telefoonnummer (optioneel)</label>
            <input type="tel" name="phone" id="phone" value="{{ old('phone') }}"
                   placeholder="+32 ..." maxlength="20"
                   class="w-full border rounded p-2">
            @error('phone')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex gap-3 pt-4">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Afspraak aanvragen
            </button>
            <a href="{{ route('appointments.index') }}" class="px-4 py-2 border rounded hover:bg-gray-50">
                Annuleren
            </a>
        </div>
    </form>
</div>
@endsection
