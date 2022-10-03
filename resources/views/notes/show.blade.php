@extends('layouts.main')

@section('title', 'Notitie bekijken')

@section('content')
    <h4 class="mb-3">Notitie bekijken</h4>

    <table class="table table-borderless">
        <tr>
            <td class="fw-bold" style="width: 200px;">Titel</td>
            <td>{{ $note->title }}</td>
        </tr>
        <tr>
            <td class="fw-bold">Categorie</td>
            <td>{{ $note->category->title }}</td>
        </tr>
        <tr>
            <td class="fw-bold">Toegevoegd op</td>
            <td>{{ $note->created_at->format('d-m-Y H:i') }}</td>
        </tr>
        <tr>
            <td class="fw-bold">Gewijzigd op</td>
            <td>{{ $note->updated_at->format('d-m-Y H:i') }}</td>
        </tr>
        <tr class="border-top bg-white">
            <td colspan="2">{!! $note->content !!}</td>
        </tr>
    </table>
@endsection
