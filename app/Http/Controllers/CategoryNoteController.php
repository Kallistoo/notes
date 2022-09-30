<?php

namespace App\Http\Controllers;

use App\Models\CategoryNote;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CategoryNoteController extends Controller
{
    public function index(): View
    {
        return view('notes.categories.index', [
            'categories' => CategoryNote::all(),
        ]);
    }

    public function create(): View
    {
        return view('notes.categories.create');
    }

    public function store(Request $request): RedirectResponse
    {
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
        session()->flash('success', 'Categorie "' . $request->get('title') . '" is aangepast.');

        $category->update([
            'title' => $request->input('title'),
        ]);

        return redirect()->route('notes.categories.edit', $category);
    }

    public function delete(Request $request): RedirectResponse
    {
        session()->flash('success', 'Categorie "' . $request->get('title') . '" is verwijderd.');

        return redirect()->route('notes.categories.index');
    }
}
