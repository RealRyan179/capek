@extends('layouts.app')

@section('content')
    <h2>Uploaded Music</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <ul>
        @foreach ($musics as $music)
            <li>
                {{ $music->title }} by {{ $music->artist }}
                <a href="{{ route('musics.play', $music->id) }}">Play</a>
            </li>
        @endforeach
    </ul>
@endsection