<?php

namespace App\Http\Controllers;

use App\Models\Glass;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GlassController extends Controller
{
    public function index(Request $request): View
    {
        $query = Glass::with('tags');

        if ($request->has('tag')) {
            $query->whereHas('tags', function ($q) use ($request) {
                $q->where('tags.id', $request->tag);
            });
        }

        $glasses = $query->latest()->get();
        $tags = Tag::orderBy('name')->get();

        return view('glasses.index', compact('glasses', 'tags'));
    }

    public function show(Glass $glass): View
    {
        $glass->load('tags');
        return view('glasses.show', compact('glass'));
    }
}
