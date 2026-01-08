<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Welcome Banner -->
            <div style="background: linear-gradient(135deg, #2563eb 0%, #4f46e5 100%); border-radius: 16px; padding: 32px; margin-bottom: 24px; color: white;">
                <h1 style="font-size: 1.75rem; font-weight: 700; margin-bottom: 8px;">
                    Welkom terug, {{ Auth::user()->name }}!
                </h1>
                <p style="color: #dbeafe; font-size: 1rem;">
                    @if(Auth::user()->is_admin)
                        Beheer de website en bekijk het laatste nieuws.
                    @else
                        Beheer uw afspraken en bekijk onze brillen collectie.
                    @endif
                </p>
            </div>

            <!-- Quick Actions -->
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 16px; margin-bottom: 32px;">
                @if(!Auth::user()->is_admin)
                <a href="{{ route('appointments.create') }}" style="display: flex; align-items: center; gap: 12px; background: white; padding: 20px; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.07); text-decoration: none; transition: transform 0.2s, box-shadow 0.2s;" onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 6px 12px rgba(0,0,0,0.12)';" onmouseout="this.style.transform=''; this.style.boxShadow='0 4px 6px rgba(0,0,0,0.07)';">
                    <div style="width: 48px; height: 48px; background: linear-gradient(135deg, #2563eb, #4f46e5); border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                        <svg style="width: 24px; height: 24px; color: white;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <div>
                        <div style="font-weight: 600; color: #1f2937;">Afspraak maken</div>
                        <div style="font-size: 0.875rem; color: #6b7280;">Plan een oogtest</div>
                    </div>
                </a>
                @endif
                
                <a href="{{ route('glasses.index') }}" style="display: flex; align-items: center; gap: 12px; background: white; padding: 20px; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.07); text-decoration: none; transition: transform 0.2s, box-shadow 0.2s;" onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 6px 12px rgba(0,0,0,0.12)';" onmouseout="this.style.transform=''; this.style.boxShadow='0 4px 6px rgba(0,0,0,0.07)';">
                    <div style="width: 48px; height: 48px; background: linear-gradient(135deg, #16a34a, #059669); border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                        <svg style="width: 24px; height: 24px; color: white;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                    </div>
                    <div>
                        <div style="font-weight: 600; color: #1f2937;">Brillen bekijken</div>
                        <div style="font-size: 0.875rem; color: #6b7280;">Shop onze collectie</div>
                    </div>
                </a>
                
                @if(!Auth::user()->is_admin)
                <a href="{{ route('appointments.index') }}" style="display: flex; align-items: center; gap: 12px; background: white; padding: 20px; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.07); text-decoration: none; transition: transform 0.2s, box-shadow 0.2s;" onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 6px 12px rgba(0,0,0,0.12)';" onmouseout="this.style.transform=''; this.style.boxShadow='0 4px 6px rgba(0,0,0,0.07)';">
                    <div style="width: 48px; height: 48px; background: linear-gradient(135deg, #9333ea, #7c3aed); border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                        <svg style="width: 24px; height: 24px; color: white;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                    </div>
                    <div>
                        <div style="font-weight: 600; color: #1f2937;">Mijn afspraken</div>
                        <div style="font-size: 0.875rem; color: #6b7280;">Bekijk overzicht</div>
                    </div>
                </a>
                @endif
            </div>

            <div style="display: grid; grid-template-columns: 1fr; lg:grid-template-columns: 2fr 1fr; gap: 24px;">
                <!-- Left Column -->
                <div style="display: flex; flex-direction: column; gap: 24px;">
                    
                    @if(!Auth::user()->is_admin)
                    <!-- Next Appointment -->
                    <div style="background: white; border-radius: 16px; box-shadow: 0 4px 6px rgba(0,0,0,0.07); overflow: hidden;">
                        <div style="padding: 20px 24px; border-bottom: 1px solid #e5e7eb;">
                            <h3 style="font-size: 1.125rem; font-weight: 600; color: #1f2937; margin: 0;">Volgende afspraak</h3>
                        </div>
                        <div style="padding: 24px;">
                            @if($nextAppointment)
                                <div style="display: flex; align-items: center; gap: 16px;">
                                    <div style="width: 64px; height: 64px; background: linear-gradient(135deg, #2563eb, #4f46e5); border-radius: 12px; display: flex; flex-direction: column; align-items: center; justify-content: center; color: white;">
                                        <span style="font-size: 1.5rem; font-weight: 700; line-height: 1;">{{ $nextAppointment->date->format('d') }}</span>
                                        <span style="font-size: 0.75rem; text-transform: uppercase;">{{ $nextAppointment->date->translatedFormat('M') }}</span>
                                    </div>
                                    <div>
                                        <div style="font-weight: 600; color: #1f2937; font-size: 1.125rem;">
                                            {{ $nextAppointment->date->translatedFormat('l, d F Y') }}
                                        </div>
                                        <div style="color: #6b7280; margin-top: 4px;">
                                            {{ $nextAppointment->time_slot }} - {{ $nextAppointment->reason }}
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div style="text-align: center; padding: 24px 0;">
                                    <div style="width: 64px; height: 64px; background: #f3f4f6; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 16px;">
                                        <svg style="width: 32px; height: 32px; color: #9ca3af;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                    <p style="color: #6b7280; margin-bottom: 16px;">Geen geplande afspraken</p>
                                    <a href="{{ route('appointments.create') }}" style="display: inline-block; background: #2563eb; color: white; padding: 10px 20px; border-radius: 8px; text-decoration: none; font-weight: 500;">
                                        Afspraak maken
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                    @endif

                    @if(!Auth::user()->is_admin)
                    <!-- Appointments Overview -->
                    <div style="background: white; border-radius: 16px; box-shadow: 0 4px 6px rgba(0,0,0,0.07); overflow: hidden;">
                        <div style="padding: 20px 24px; border-bottom: 1px solid #e5e7eb;">
                            <h3 style="font-size: 1.125rem; font-weight: 600; color: #1f2937; margin: 0;">Afspraken overzicht</h3>
                        </div>
                        <div style="padding: 24px;">
                            <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px;">
                                <div style="text-align: center; padding: 20px; background: #fef3c7; border-radius: 12px;">
                                    <div style="font-size: 2rem; font-weight: 700; color: #d97706;">{{ $appointmentCounts['pending'] }}</div>
                                    <div style="font-size: 0.875rem; color: #92400e; margin-top: 4px;">In afwachting</div>
                                </div>
                                <div style="text-align: center; padding: 20px; background: #dcfce7; border-radius: 12px;">
                                    <div style="font-size: 2rem; font-weight: 700; color: #16a34a;">{{ $appointmentCounts['approved'] }}</div>
                                    <div style="font-size: 0.875rem; color: #166534; margin-top: 4px;">Goedgekeurd</div>
                                </div>
                                <div style="text-align: center; padding: 20px; background: #fee2e2; border-radius: 12px;">
                                    <div style="font-size: 2rem; font-weight: 700; color: #dc2626;">{{ $appointmentCounts['rejected'] }}</div>
                                    <div style="font-size: 0.875rem; color: #991b1b; margin-top: 4px;">Afgewezen</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>

                <!-- Right Column: Recent News -->
                <div style="background: white; border-radius: 16px; box-shadow: 0 4px 6px rgba(0,0,0,0.07); overflow: hidden; height: fit-content;">
                    <div style="padding: 20px 24px; border-bottom: 1px solid #e5e7eb; display: flex; justify-content: space-between; align-items: center;">
                        <h3 style="font-size: 1.125rem; font-weight: 600; color: #1f2937; margin: 0;">Laatste nieuws</h3>
                        <a href="{{ route('news.index') }}" style="font-size: 0.875rem; color: #2563eb; text-decoration: none;">Alles bekijken →</a>
                    </div>
                    <div style="padding: 16px 24px;">
                        @forelse($recentNews as $news)
                            <a href="{{ route('news.show', $news) }}" style="display: block; padding: 12px 0; border-bottom: 1px solid #f3f4f6; text-decoration: none; transition: background 0.15s;" onmouseover="this.style.background='#f9fafb'" onmouseout="this.style.background=''">
                                <div style="font-weight: 500; color: #1f2937; margin-bottom: 4px;">{{ Str::limit($news->title, 40) }}</div>
                                <div style="font-size: 0.75rem; color: #9ca3af;">{{ $news->published_at ? $news->published_at->diffForHumans() : '' }}</div>
                            </a>
                        @empty
                            <p style="color: #6b7280; text-align: center; padding: 24px 0;">Geen nieuws beschikbaar</p>
                        @endforelse
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
