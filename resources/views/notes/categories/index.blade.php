@extends('layouts.main')

@section('title', 'Overzicht categorieën')

@section('content')
    <h4 class="mb-3">Overzicht categorieën</h4>

    <table class="table table-striped">
        <thead>
            <tr>
                <th class="id">ID</th>
                <th>Titel</th>
                <th>Aantal notities</th>
                <th class="timestamp">Toegevoegd op</th>
                <th class="timestamp">Gewijzigd op</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td><a href="{{ route('notes.categories.edit', $category->id) }}">{{ $category->title }}</a></td>
                    <td><a href="{{ route('notes.categories.notes', $category->id) }}">{{ $category->notes_count }}</a></td>
                    <td>{{ $category->created_at->format('d-m-Y H:i') }}</td>
                    <td>{{ $category->updated_at->format('d-m-Y H:i') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5"><em>Er zijn geen categorieën gevonden.</em></td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
