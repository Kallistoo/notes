@extends('layouts.main')

@section('title', 'Overzicht notities')

@section('content')
    <h4 class="mb-3">Overzicht notities uit categorie "{{ $category->title }}"</h4>

    <table class="table table-striped">
        <thead>
            <tr>
                <th class="id">ID</th>
                <th>Titel</th>
                <th class="timestamp">Toegevoegd op</th>
                <th class="timestamp">Gewijzigd op</th>
                <th colspan="2">Acties</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($notes as $note)
                <tr>
                    <td>{{ $note->id }}</td>
                    <td><a href="{{ route('notes.edit', $note) }}">{{ $note->title }}</a></td>
                    <td>{{ $note->created_at->format('d-m-Y H:i') }}</td>
                    <td>{{ $note->updated_at->format('d-m-Y H:i') }}</td>
                    <td class="action">
                        <a href="{{ route('notes.edit', $note) }}">
                            <i class="fa fa-pencil"></i>
                        </a>
                    </td>
                    <td class="action">
                        <form action="{{ route('notes.delete', $note) }}" method="POST" onsubmit="return confirm('Weet je het zeker?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-link p-0 border-0 align-baseline">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6"><em>Er zijn geen notities in deze categorie.</em></td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <a href="{{ route('notes.create', $category) }}" class="btn btn-primary mb-3">
        <i class="fa fa-plus"></i> Notitie aan deze categorie toevoegen
    </a>
@endsection
