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
                <th colspan="2">Acties</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td><a href="{{ route('notes.categories.show', $category) }}">{{ $category->title }}</a></td>
                    <td>{{ $category->notes_count }}</td>
                    <td>{{ $category->created_at->format('d-m-Y H:i') }}</td>
                    <td>{{ $category->updated_at->format('d-m-Y H:i') }}</td>
                    <td class="action">
                        <a href="{{ route('notes.categories.edit', $category) }}">
                            <i class="fa fa-pencil"></i>
                        </a>
                    </td>
                    <td class="action">
                        <form action="{{ route('notes.categories.delete', $category) }}" method="POST">
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
                    <td colspan="7"><em>Er zijn geen categorieën gevonden.</em></td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <a href="{{ route('notes.categories.create') }}" class="btn btn-primary mb-2">
        <i class="fa fa-plus"></i> Categorie toevoegen
    </a>
@endsection
