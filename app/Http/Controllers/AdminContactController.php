<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminContactController extends Controller
{
    public function index(Request $request): View
    {
        $query = ContactMessage::with(['user', 'respondedBy'])->latest();

        if ($request->has('status') && in_array($request->status, ['pending', 'answered'])) {
            $query->where('status', $request->status);
        }

        $messages = $query->paginate(15);

        return view('admin.contact.index', compact('messages'));
    }

    public function show(ContactMessage $message): View
    {
        $message->load(['user', 'respondedBy']);
        return view('admin.contact.show', compact('message'));
    }

    public function respond(Request $request, ContactMessage $message): RedirectResponse
    {
        $validated = $request->validate([
            'admin_response' => 'required|string|min:5|max:5000',
        ], [
            'admin_response.required' => 'Vul een antwoord in.',
            'admin_response.min' => 'Het antwoord moet minimaal 5 tekens bevatten.',
        ]);

        $message->update([
            'admin_response' => $validated['admin_response'],
            'responded_by' => auth()->id(),
            'responded_at' => now(),
            'status' => 'answered',
        ]);

        return redirect()->route('admin.contact.index')
            ->with('success', 'Antwoord succesvol verzonden.');
    }
}
