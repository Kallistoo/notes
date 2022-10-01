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
            </tr>
        </thead>
        <tbody>
            @forelse ($notes as $note)
                <tr>
                    <td>{{ $note->id }}</td>
                    <td><a href="{{ route('notes.edit', $note->id) }}">{{ $note->title }}</a></td>
                    <td>{{ $note->created_at->format('d-m-Y H:i') }}</td>
                    <td>{{ $note->updated_at->format('d-m-Y H:i') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4"><em>Er zijn geen notities in deze categorie.</em></td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
