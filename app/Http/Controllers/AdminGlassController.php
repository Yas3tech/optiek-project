<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGlassRequest;
use App\Models\Glass;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class AdminGlassController extends Controller
{
    public function index(): View
    {
        $glasses = Glass::with('tags')->latest()->get();
        return view('admin.glasses.index', compact('glasses'));
    }

    public function create(): View
    {
        $tags = Tag::orderBy('name')->get();
        return view('admin.glasses.create', compact('tags'));
    }

    public function store(StoreGlassRequest $request): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('glasses', 'public');
        }

        $glass = Glass::create($data);

        if ($request->has('tags')) {
            $glass->tags()->attach($request->tags);
        }

        return redirect()->route('admin.glasses.index')
            ->with('success', 'Bril succesvol toegevoegd.');
    }

    public function edit(Glass $glass): View
    {
        $tags = Tag::orderBy('name')->get();
        return view('admin.glasses.edit', compact('glass', 'tags'));
    }

    public function update(StoreGlassRequest $request, Glass $glass): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            if ($glass->image) {
                Storage::disk('public')->delete($glass->image);
            }
            $data['image'] = $request->file('image')->store('glasses', 'public');
        }

        $glass->update($data);
        $glass->tags()->sync($request->tags ?? []);

        return redirect()->route('admin.glasses.index')
            ->with('success', 'Bril succesvol bijgewerkt.');
    }

    public function destroy(Glass $glass): RedirectResponse
    {
        if ($glass->image) {
            Storage::disk('public')->delete($glass->image);
        }

        $glass->delete();

        return redirect()->route('admin.glasses.index')
            ->with('success', 'Bril verwijderd.');
    }
}
