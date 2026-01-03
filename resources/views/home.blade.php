@extends('layouts.app')

@section('content')
<div style="background: linear-gradient(135deg, #2563eb 0%, #4f46e5 100%); color: white; padding: 80px 20px; text-align: center;">
    <div style="max-width: 800px; margin: 0 auto;">
        <h1 style="font-size: 2.5rem; font-weight: bold; margin-bottom: 16px; color: white;">
            Welkom bij Opticalium
        </h1>
        <p style="font-size: 1.25rem; margin-bottom: 32px; color: #dbeafe;">
            Uw specialist voor brillen, contactlenzen en professioneel oogadvies
        </p>
        <div style="display: flex; justify-content: center; gap: 16px; flex-wrap: wrap;">
            @guest
                <a href="{{ route('login') }}" style="padding: 12px 24px; background: white; color: #2563eb; font-weight: 600; border-radius: 8px; text-decoration: none;">
                    Inloggen
                </a>
                <a href="{{ route('register') }}" style="padding: 12px 24px; background: #3b82f6; color: white; font-weight: 600; border-radius: 8px; text-decoration: none; border: 2px solid white;">
                    Registreren
                </a>
            @else
                <a href="{{ route('dashboard') }}" style="padding: 12px 24px; background: white; color: #2563eb; font-weight: 600; border-radius: 8px; text-decoration: none;">
                    Naar Dashboard
                </a>
            @endguest
        </div>
    </div>
</div>

<div style="padding: 64px 20px; background: #f9fafb;">
    <div style="max-width: 1000px; margin: 0 auto;">
        <h2 style="font-size: 1.875rem; font-weight: bold; text-align: center; margin-bottom: 48px; color: #1f2937;">
            Onze diensten
        </h2>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 32px;">
            <div style="background: white; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); padding: 32px; text-align: center;">
                <div style="width: 64px; height: 64px; margin: 0 auto 16px; color: #2563eb;">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" style="width: 64px; height: 64px;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                </div>
                <h3 style="font-size: 1.25rem; font-weight: 600; margin-bottom: 8px; color: #1f2937;">Oogtest</h3>
                <p style="color: #6b7280;">Professionele oogmetingen door onze gediplomeerde optometristen voor een optimaal zicht.</p>
            </div>

            <div style="background: white; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); padding: 32px; text-align: center;">
                <div style="width: 64px; height: 64px; margin: 0 auto 16px; color: #16a34a;">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" style="width: 64px; height: 64px;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        <circle cx="10" cy="10" r="3" stroke-width="1.5"/>
                    </svg>
                </div>
                <h3 style="font-size: 1.25rem; font-weight: 600; margin-bottom: 8px; color: #1f2937;">Verkoop brillen</h3>
                <p style="color: #6b7280;">Ruime collectie brillen van topmerken. Van klassiek tot trendy, voor elk budget.</p>
            </div>

            <div style="background: white; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); padding: 32px; text-align: center;">
                <div style="width: 64px; height: 64px; margin: 0 auto 16px; color: #9333ea;">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" style="width: 64px; height: 64px;">
                        <circle cx="12" cy="12" r="3" stroke-width="1.5"/>
                        <circle cx="12" cy="12" r="7" stroke-width="1.5"/>
                    </svg>
                </div>
                <h3 style="font-size: 1.25rem; font-weight: 600; margin-bottom: 8px; color: #1f2937;">Contactlenzen</h3>
                <p style="color: #6b7280;">Dag-, maand- en jaarlenzen. Inclusief aanpassing en nazorg door onze specialisten.</p>
            </div>
        </div>
    </div>
</div>

<div style="background: white; padding: 64px 20px;">
    <div style="max-width: 800px; margin: 0 auto; text-align: center;">
        <h2 style="font-size: 1.875rem; font-weight: bold; margin-bottom: 24px; color: #1f2937;">Over ons</h2>
        <p style="font-size: 1.125rem; color: #6b7280; line-height: 1.75; margin-bottom: 32px;">
            Bij Opticalium staan we voor kwaliteit, expertise en persoonlijke service. 
            Met jarenlange ervaring in de optieksector helpen wij u graag bij het vinden van de 
            perfecte bril of contactlenzen.
        </p>
        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 32px;">
            <div>
                <div style="font-size: 2.25rem; font-weight: bold; color: #2563eb; margin-bottom: 8px;">15+</div>
                <div style="color: #6b7280;">Jaar ervaring</div>
            </div>
            <div>
                <div style="font-size: 2.25rem; font-weight: bold; color: #2563eb; margin-bottom: 8px;">1000+</div>
                <div style="color: #6b7280;">Tevreden klanten</div>
            </div>
            <div>
                <div style="font-size: 2.25rem; font-weight: bold; color: #2563eb; margin-bottom: 8px;">500+</div>
                <div style="color: #6b7280;">Brillen in collectie</div>
            </div>
        </div>
    </div>
</div>

<footer style="background: #111827; color: #9ca3af; padding: 32px 20px; text-align: center;">
    <p>&copy; {{ date('Y') }} Opticalium. Alle rechten voorbehouden.</p>
    <div style="display: flex; justify-content: center; gap: 24px; margin-top: 16px;">
        <a href="{{ route('news.index') }}" style="color: #9ca3af; text-decoration: none;">Nieuws</a>
        <a href="{{ route('faq.index') }}" style="color: #9ca3af; text-decoration: none;">FAQ</a>
        <a href="{{ route('contact.form') }}" style="color: #9ca3af; text-decoration: none;">Contact</a>
    </div>
</footer>
@endsection
