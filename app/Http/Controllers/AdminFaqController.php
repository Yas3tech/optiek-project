<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\FaqCategory;
use App\Http\Requests\StoreFaqCategoryRequest;
use App\Http\Requests\StoreFaqRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AdminFaqController extends Controller
{
    public function index(): View
    {
        $categories = FaqCategory::with('faqs')->orderBy('position')->get();
        
        return view('admin.faq.index', compact('categories'));
    }

    public function createCategory(): View
    {
        return view('admin.faq.create-category');
    }

    public function storeCategory(StoreFaqCategoryRequest $request): RedirectResponse
    {
        FaqCategory::create($request->validated());

        return redirect()
            ->route('admin.faq.index')
            ->with('success', 'Categorie succesvol aangemaakt.');
    }

    public function editCategory(FaqCategory $category): View
    {
        return view('admin.faq.edit-category', compact('category'));
    }

    public function updateCategory(StoreFaqCategoryRequest $request, FaqCategory $category): RedirectResponse
    {
        $category->update($request->validated());

        return redirect()
            ->route('admin.faq.index')
            ->with('success', 'Categorie succesvol bijgewerkt.');
    }

    public function destroyCategory(FaqCategory $category): RedirectResponse
    {
        $category->delete();

        return redirect()
            ->route('admin.faq.index')
            ->with('success', 'Categorie en bijbehorende vragen verwijderd.');
    }

    public function createFaq(): View
    {
        $categories = FaqCategory::orderBy('position')->get();
        
        return view('admin.faq.create-faq', compact('categories'));
    }

    public function storeFaq(StoreFaqRequest $request): RedirectResponse
    {
        Faq::create($request->validated());

        return redirect()
            ->route('admin.faq.index')
            ->with('success', 'Vraag succesvol aangemaakt.');
    }

    public function editFaq(Faq $faq): View
    {
        $categories = FaqCategory::orderBy('position')->get();
        
        return view('admin.faq.edit-faq', compact('faq', 'categories'));
    }

    public function updateFaq(StoreFaqRequest $request, Faq $faq): RedirectResponse
    {
        $faq->update($request->validated());

        return redirect()
            ->route('admin.faq.index')
            ->with('success', 'Vraag succesvol bijgewerkt.');
    }

    public function destroyFaq(Faq $faq): RedirectResponse
    {
        $faq->delete();

        return redirect()
            ->route('admin.faq.index')
            ->with('success', 'Vraag verwijderd.');
    }
}
