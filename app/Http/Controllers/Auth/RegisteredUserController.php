<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    public function create(): View
    {
        return view('auth.register-step1');
    }

    public function storeStep1(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:50'],
            'phone' => ['required', 'string', 'max:20'],
            'birthday' => ['required', 'date'],
        ]);

        $request->session()->put('registration', $validated);

        return redirect()->route('register.step2');
    }

    public function showStep2(Request $request): View|RedirectResponse
    {
        if (!$request->session()->has('registration')) {
            return redirect()->route('register');
        }

        return view('auth.register-step2');
    }

    public function store(Request $request): RedirectResponse
    {
        if (!$request->session()->has('registration')) {
            return redirect()->route('register');
        }

        $request->validate([
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $step1Data = $request->session()->get('registration');

        $user = User::create([
            'name' => $step1Data['first_name'] . ' ' . $step1Data['last_name'],
            'username' => $step1Data['username'] ?? null,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $step1Data['phone'] ?? null,
            'birthday' => $step1Data['birthday'] ?? null,
        ]);

        $request->session()->forget('registration');

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
