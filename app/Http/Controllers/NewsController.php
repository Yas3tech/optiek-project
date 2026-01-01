<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $newsItems = News::query()
            ->with('user')
            ->orderByDesc('published_at')
            ->paginate(10);

        return view('news.index', compact('newsItems'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
              return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNewsRequest $request)
    {
         $data = $request->validated();

        $imagePath = null;
        if ($request->hasFile('image')) {
            // IMAGES ZET IK IN storage/app/public/news
            $imagePath = $request->file('image')->store('news', 'public');
        }

        $news = News::create([
            'user_id' => $request->user()->id,
            'title' => $data['title'],
            'content' => $data['content'],
            'published_at' => $data['published_at'],
            'image_path' => $imagePath,
        ]);

        return redirect()
            ->route('news.show', $news)
            ->with('success', 'News created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        $news->load('user');

        return view('news.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNewsRequest $request, News $news)
    {
        $data = $request->validated();

        // If a new image is uploaded, delete old one
        if ($request->hasFile('image')) {
            if ($news->image_path) {
                Storage::disk('public')->delete($news->image_path);
            }

            $news->image_path = $request->file('image')->store('news', 'public');
        }

        $news->title = $data['title'];
        $news->content = $data['content'];
        $news->published_at = $data['published_at'];
        $news->save();

        return redirect()
            ->route('news.show', $news)
            ->with('success', 'News updated successfully.');
    }


    public function destroy(News $news)
    {
        if ($news->image_path) {
            Storage::disk('public')->delete($news->image_path);
        }

        $news->delete();

        return redirect()
            ->route('news.index')
            ->with('success', 'News deleted successfully.');
    }
}
