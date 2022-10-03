<?php

namespace App\Http\Controllers;

use App\Models\CategoryNote;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class NoteController extends Controller
{
    public function index(Request $request, ?CategoryNote $category = null): View
    {
        return view('notes.index', [
            'notes' => $category ? $category->notes : Note::all(),
        ]);
    }

    public function show(Request $request, Note $note): View
    {
        return view('notes.show', [
            'note' => $note,
        ]);
    }

    public function create(Request $request, ?CategoryNote $category = null): View
    {
        return view('notes.create', [
            'categories' => CategoryNote::all(),
            'selectedCategory' => $category,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        Note::create([
            'title' => $request->input('title'),
            'category_id' => $request->input('category_id'),
            'content' => $request->input('content'),
        ]);

        session()->flash('success', 'Notitie "' . $request->get('title') . '" is toegevoegd.');

        return redirect()->route('notes.index');
    }

    public function edit(Request $request, Note $note): View
    {
        return view('notes.edit', [
            'note' => $note,
            'categories' => CategoryNote::all(),
        ]);
    }

    public function update(Request $request, Note $note): RedirectResponse
    {
        session()->flash('success', 'Notitie "' . $request->get('title') . '" is aangepast.');

        $note->update([
            'title' => $request->input('title'),
            'category_id' => $request->input('category_id'),
            'content' => $request->input('content'),
        ]);

        return redirect()->route('notes.edit', $note);
    }

    public function delete(Request $request, Note $note): RedirectResponse
    {
        session()->flash('success', 'Notitie "' . $request->get('title') . '" is verwijderd.');

        $note->delete();

        return redirect()->route('notes.index');
    }

    public function search(Request $request): View
    {
        $request->validate(['query' => 'required']);

        $query = $request->get('query');

        return view('notes.index', [
            'notes' => Note::search($query)->get(),
            'query' => $query,
        ]);
    }
}
