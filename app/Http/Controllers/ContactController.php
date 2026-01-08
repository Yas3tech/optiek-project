<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Models\ContactMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function showForm(): View
    {
        return view('contact');
    }

    public function send(StoreContactRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        
        ContactMessage::create([
            'user_id' => auth()->id(),
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'subject' => $validated['subject'],
            'message' => $validated['message'],
        ]);

        return redirect()->route('contact.form')
            ->with('success', 'Bedankt voor uw bericht! Wij nemen zo snel mogelijk contact met u op.');
    }

    public function myMessages(Request $request): View
    {
        $messages = ContactMessage::where('user_id', $request->user()->id)
            ->latest()
            ->get();

        return view('my-messages', compact('messages'));
    }
}
