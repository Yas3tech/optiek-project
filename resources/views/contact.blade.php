@extends('layouts.app')

@section('content')
<div style="padding: 64px 20px; background: #f9fafb; min-height: calc(100vh - 64px);">
    <div style="max-width: 600px; margin: 0 auto;">
        <h1 style="font-size: 2rem; font-weight: bold; margin-bottom: 8px; color: #1f2937; text-align: center;">
            Contact
        </h1>
        <p style="color: #6b7280; text-align: center; margin-bottom: 32px;">
            Heeft u vragen of wilt u een afspraak maken? Neem contact met ons op!
        </p>

        @if(session('success'))
            <div style="background: #dcfce7; border: 1px solid #22c55e; color: #166534; padding: 16px; border-radius: 8px; margin-bottom: 24px;">
                {{ session('success') }}
            </div>
        @endif

        <div style="background: white; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); padding: 32px;">
            <form method="POST" action="{{ route('contact.send') }}">
                @csrf

                <div style="margin-bottom: 20px;">
                    <label for="name" style="display: block; font-weight: 600; margin-bottom: 8px; color: #374151;">
                        Naam <span style="color: #ef4444;">*</span>
                    </label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required
                        style="width: 100%; padding: 12px; border: 1px solid #d1d5db; border-radius: 8px; font-size: 1rem; box-sizing: border-box;">
                    @error('name')
                        <p style="color: #ef4444; font-size: 0.875rem; margin-top: 4px;">{{ $message }}</p>
                    @enderror
                </div>

                <div style="margin-bottom: 20px;">
                    <label for="email" style="display: block; font-weight: 600; margin-bottom: 8px; color: #374151;">
                        E-mailadres <span style="color: #ef4444;">*</span>
                    </label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required
                        style="width: 100%; padding: 12px; border: 1px solid #d1d5db; border-radius: 8px; font-size: 1rem; box-sizing: border-box;">
                    @error('email')
                        <p style="color: #ef4444; font-size: 0.875rem; margin-top: 4px;">{{ $message }}</p>
                    @enderror
                </div>

                <div style="margin-bottom: 20px;">
                    <label for="phone" style="display: block; font-weight: 600; margin-bottom: 8px; color: #374151;">
                        Telefoonnummer
                    </label>
                    <input type="tel" id="phone" name="phone" value="{{ old('phone') }}"
                        style="width: 100%; padding: 12px; border: 1px solid #d1d5db; border-radius: 8px; font-size: 1rem; box-sizing: border-box;">
                    @error('phone')
                        <p style="color: #ef4444; font-size: 0.875rem; margin-top: 4px;">{{ $message }}</p>
                    @enderror
                </div>

                <div style="margin-bottom: 20px;">
                    <label for="subject" style="display: block; font-weight: 600; margin-bottom: 8px; color: #374151;">
                        Onderwerp <span style="color: #ef4444;">*</span>
                    </label>
                    <select id="subject" name="subject" required
                        style="width: 100%; padding: 12px; border: 1px solid #d1d5db; border-radius: 8px; font-size: 1rem; box-sizing: border-box; background: white;">
                        <option value="">Kies een onderwerp...</option>
                        <option value="Vraag over brillen" {{ old('subject') == 'Vraag over brillen' ? 'selected' : '' }}>Vraag over brillen</option>
                        <option value="Vraag over contactlenzen" {{ old('subject') == 'Vraag over contactlenzen' ? 'selected' : '' }}>Vraag over contactlenzen</option>
                        <option value="Oogtest" {{ old('subject') == 'Oogtest' ? 'selected' : '' }}>Oogtest</option>
                        <option value="Garantie / Retour" {{ old('subject') == 'Garantie / Retour' ? 'selected' : '' }}>Garantie / Retour</option>
                        <option value="Overige" {{ old('subject') == 'Overige' ? 'selected' : '' }}>Overige</option>
                    </select>
                    @error('subject')
                        <p style="color: #ef4444; font-size: 0.875rem; margin-top: 4px;">{{ $message }}</p>
                    @enderror
                </div>

                <div style="margin-bottom: 24px;">
                    <label for="message" style="display: block; font-weight: 600; margin-bottom: 8px; color: #374151;">
                        Uw bericht <span style="color: #ef4444;">*</span>
                    </label>
                    <textarea id="message" name="message" rows="5" required
                        style="width: 100%; padding: 12px; border: 1px solid #d1d5db; border-radius: 8px; font-size: 1rem; box-sizing: border-box; resize: vertical;">{{ old('message') }}</textarea>
                    @error('message')
                        <p style="color: #ef4444; font-size: 0.875rem; margin-top: 4px;">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" 
                    style="width: 100%; padding: 14px; background: #2563eb; color: white; font-weight: 600; font-size: 1rem; border: none; border-radius: 8px; cursor: pointer;">
                    Verstuur bericht
                </button>
            </form>
        </div>

        <div style="margin-top: 32px; text-align: center; color: #6b7280;">
            <p style="margin-bottom: 8px;"><strong>Opticalium</strong></p>
            <p>Rue du pont du Christ 41, 1300 Wavre</p>
            <p>Tel: 010 43 99 23</p>
            <p>info@opticalium.be</p>
        </div>
    </div>
</div>
@endsection
