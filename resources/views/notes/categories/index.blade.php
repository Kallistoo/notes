@extends('layouts.main')

@section('title', 'Overzicht categorieën')

@section('content')
    <h4 class="mb-3">Overzicht categorieën</h4>

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
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td><a href="{{ route('notes.categories.edit', $category->id) }}">{{ $category->title }}</a></td>
                    <td>{{ $category->created_at->format('d-m-Y H:i') }}</td>
                    <td>{{ $category->updated_at->format('d-m-Y H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
