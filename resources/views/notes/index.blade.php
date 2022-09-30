@extends('layouts.main')

@section('title', 'Overzicht notities')

@section('content')
    <h4 class="mb-3">Overzicht notities</h4>

    <table class="table table-striped">
        <thead>
            <tr>
                <th class="id">ID</th>
                <th>Categorie</th>
                <th>Titel</th>
                <th class="timestamp">Toegevoegd op</th>
                <th class="timestamp">Gewijzigd op</th>
            </tr>
        </thead>
        <tbody>
            @foreach (\App\Models\Note::all() as $note)
                <tr>
                    <td>{{ $note->id }}</td>
                    <td>{{ $note->category->title }}</td>
                    <td><a href="{{ route('notes.edit', $note->id) }}">{{ $note->title }}</a></td>
                    <td>{{ $note->created_at->format('d-m-Y H:i') }}</td>
                    <td>{{ $note->updated_at->format('d-m-Y H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
