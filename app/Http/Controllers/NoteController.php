<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class NoteController extends Controller
{
    public function index(): View
    {
        return view('notes.index');
    }

    public function create(): View
    {
        return view('notes.create');
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
        $note->load('category');

        return view('notes.edit', [
            'note' => $note,
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

    public function delete(Request $request): RedirectResponse
    {
        session()->flash('success', 'Notitie "' . $request->get('title') . '" is verwijderd.');

        return redirect()->route('notes.index');
    }
}
