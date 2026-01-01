<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AdminUserController extends Controller
{
    
    public function index(): View
    {
        $users = User::orderBy('name')->paginate(15);

        return view('admin.users.index', compact('users'));
    }

    public function create(): View
    {
        return view('admin.users.create');
    }
    
    public function store(StoreUserRequest $request): RedirectResponse
    {
        $data = $request->validated();

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'is_admin' => $request->boolean('is_admin'),
        ]);

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'Gebruiker succesvol aangemaakt.');
    }

    public function toggleAdmin(User $user): RedirectResponse
    {
        // Prevent admin from demoting themselves
        if ($user->id === auth()->id()) {
            return redirect()
                ->route('admin.users.index')
                ->with('error', 'Je kunt je eigen admin-status niet wijzigen.');
        }

        $user->is_admin = !$user->is_admin;
        $user->save();

        $status = $user->is_admin ? 'gepromoveerd tot' : 'gedegradeerd van';

        return redirect()
            ->route('admin.users.index')
            ->with('success', "Gebruiker {$user->name} is {$status} admin.");
    }

    public function destroy(User $user): RedirectResponse
    {
       
        if ($user->id === auth()->id()) {
            return redirect()
                ->route('admin.users.index')
                ->with('error', 'Je kunt je eigen account niet verwijderen.');
        }

        $user->delete();

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'Gebruiker succesvol verwijderd.');
    }
}
