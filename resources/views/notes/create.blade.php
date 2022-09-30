@extends('layouts.main')

@section('title', 'Notitie toevoegen')

@section('content')
    <h4 class="mb-3">Notitie toevoegen</h4>

    <form action="{{ route('notes.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label label-required">Titel</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" placeholder="Titel van de notitie">
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label label-required">Categorie</label>
            <select class="form-select" name="category_id">
                <option selected disabled>-- Selecteer een categorie --</option>
                @foreach (\App\Models\CategoryNote::all() as $category)
                    <option value="{{ $category->id }}"{{ old('category_id') === $category->id ? ' selected' : '' }}>{{ $category->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Inhoud</label>
            <textarea class="form-control" id="content" name="content" rows="3">{{ old('content') }}</textarea>
        </div>
        <div class="mb-3">
            <button class="btn btn-primary" name="save" type="submit">
                <i class="fa fa-save"></i> Opslaan
            </button>
            <a href="{{ redirect()->back()->getTargetUrl() }}" class="btn btn-link">
                <i class="fa fa-angle-left"></i> Ga terug
            </a>
        </div>
    </form>
@endsection
