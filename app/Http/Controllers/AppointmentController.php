<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAppointmentRequest;
use App\Models\Appointment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AppointmentController extends Controller
{
    public function index(Request $request): View
    {
        $appointments = $request->user()->appointments()->latest()->get();
        return view('appointments.index', compact('appointments'));
    }

    public function create(): View
    {
        return view('appointments.create');
    }

    public function store(StoreAppointmentRequest $request): RedirectResponse
    {
        $request->user()->appointments()->create($request->validated());

        return redirect()->route('appointments.index')
            ->with('success', 'Uw afspraak is aangevraagd. U ontvangt bericht zodra deze is bevestigd.');
    }

    public function destroy(Appointment $appointment): RedirectResponse
    {
        if ($appointment->user_id !== auth()->id()) {
            abort(403);
        }

        if (!$appointment->isPending()) {
            return redirect()->route('appointments.index')
                ->with('error', 'U kunt alleen afspraken annuleren die nog niet bevestigd zijn.');
        }

        $appointment->delete();

        return redirect()->route('appointments.index')
            ->with('success', 'Afspraak geannuleerd.');
    }
}
