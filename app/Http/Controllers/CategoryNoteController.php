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
            'categories' => CategoryNote::query()
                ->withCount('notes')
                ->get()
                ->sortBy('title'),
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

        flash('Categorie "' . $request->input('title') . '" is toegevoegd.')->success();

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

        $category->update([
            'title' => $request->input('title'),
        ]);

        flash('Categorie "' . $request->input('title') . '" is aangepast.')->success();

        return redirect()->route('notes.categories.index', $category);
    }

    public function delete(Request $request, CategoryNote $category): RedirectResponse
    {
        if ($category->notes->isNotEmpty()) {
            flash('Categorie "' . $category->title . '" bevat nog tenminste één notitie en kan daarom niet worden verwijderd.')->error();

            return redirect()->back();
        }

        flash('Categorie "' . $category->title . '" is verwijderd.')->success();

        $category->delete();

        return redirect()->route('notes.categories.index');
    }
}
