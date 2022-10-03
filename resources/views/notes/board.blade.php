@extends('layouts.main')

@section('title', 'Notities')

@section('content')
    <div id="notes-board">
        <ul>
            @forelse ($notes as $note)
                <li>
                    <h2>{{ $note->title }}</h2>
                    <p>{!! $note->content !!}</p>
                </li>
            @empty
                <li>
                    <h2>Foutmelding</h2>
                    <p>Geen notities gevonden.</p>
                </li>
            @endforelse
        </ul>
    </div>
@endsection
