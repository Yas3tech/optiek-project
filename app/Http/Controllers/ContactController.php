<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Mail\ContactFormMail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
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

        Mail::to('admin@ehb.be')
            ->send(new ContactFormMail($validated));

        return redirect()->route('contact.form')
            ->with('success', 'Bedankt voor uw bericht! Wij nemen zo snel mogelijk contact met u op.');
    }
}
