@extends('layouts.main')

@section('title', 'Notitie toevoegen')

@section('content')
    <h4 class="mb-3">Notitie toevoegen @if ($selectedCategory)aan de categorie "{{ $selectedCategory->title }}" @endif</h4>

    <form action="{{ route('notes.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label label-required">Titel</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" placeholder="Titel van de notitie">
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label label-required">Categorie</label>
            <select class="form-select @error('category_id') is-invalid @enderror" name="category_id">
                <option selected disabled>-- Selecteer een categorie --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"{{ old('category_id', $selectedCategory?->id) === $category->id ? ' selected' : '' }}>{{ $category->title }}</option>
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
            <a href="{{ redirect()->back()->getTargetUrl() }}" class="btn btn-light">
                <i class="fa fa-angle-left"></i> Ga terug
            </a>
        </div>
    </form>
@endsection
