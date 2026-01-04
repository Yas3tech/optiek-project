<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminAppointmentController extends Controller
{
    public function index(Request $request): View
    {
        $query = Appointment::with('user')->latest();

        if ($request->has('status') && in_array($request->status, ['pending', 'approved', 'rejected'])) {
            $query->where('status', $request->status);
        }

        $appointments = $query->get();
        return view('admin.appointments.index', compact('appointments'));
    }

    public function approve(Appointment $appointment): RedirectResponse
    {
        $appointment->update(['status' => 'approved']);

        return redirect()->route('admin.appointments.index')
            ->with('success', 'Afspraak goedgekeurd.');
    }

    public function reject(Appointment $appointment): RedirectResponse
    {
        $appointment->update(['status' => 'rejected']);

        return redirect()->route('admin.appointments.index')
            ->with('success', 'Afspraak afgewezen.');
    }

    public function destroy(Appointment $appointment): RedirectResponse
    {
        $appointment->delete();

        return redirect()->route('admin.appointments.index')
            ->with('success', 'Afspraak verwijderd.');
    }
}
