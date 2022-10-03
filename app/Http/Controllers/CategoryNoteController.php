<?php

namespace App\Http\Controllers;

use App\Models\CategoryNote;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CategoryNoteController extends Controller
{
    public function index(Request $request): View
    {
        return view('notes.categories.index', [
            'categories' => CategoryNote::query()
                ->withCount('notes')
                ->get(),
        ]);
    }

    public function show(CategoryNote $category): View
    {
        return view('notes.categories.show', [
            'category' => $category,
            'notes' => $category->notes,
        ]);
    }

    public function create(): View
    {
        return view('notes.categories.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required|unique:category_notes|max:255',
        ]);

        CategoryNote::create([
            'title' => $request->input('title'),
        ]);

        session()->flash('success', 'Categorie "' . $request->get('title') . '" is toegevoegd.');

        return redirect()->route('notes.categories.index');
    }

    public function edit(Request $request, CategoryNote $category): View
    {
        return view('notes.categories.edit', [
            'category' => $category,
        ]);
    }

    public function update(Request $request, CategoryNote $category): RedirectResponse
    {
        $request->validate([
            'title' => 'required|unique:notes,title,' . $category->id . '|max:255',
        ]);

        session()->flash('success', 'Categorie "' . $request->get('title') . '" is aangepast.');

        $category->update([
            'title' => $request->input('title'),
        ]);

        return redirect()->route('notes.categories.edit', $category);
    }

    public function delete(Request $request, CategoryNote $category): RedirectResponse
    {
        session()->flash('success', 'Categorie "' . $request->get('title') . '" is verwijderd.');

        $category->delete(); // TODO: Wat te doen met onderliggende notities?

        return redirect()->route('notes.categories.index');
    }
}
