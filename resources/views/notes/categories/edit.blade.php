@extends('layouts.main')

@section('title', 'Categorie wijzigen')

@section('content')
    <h4 class="mb-3">Categorie wijzigen</h4>

    <form action="{{ route('notes.categories.update', $category) }}" method="POST">
        @method('PATCH')
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label label-required">Titel</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{ old('title', $category->title) }}" placeholder="Titel van de categorie">
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
