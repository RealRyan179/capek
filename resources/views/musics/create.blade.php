@extends('layouts.app')

@section('content')
    <h2>Upload Music</h2>

    <form action="{{ route('musics.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" required>
        </div>
        <div>
            <label for="artist">Artist:</label>
            <input type="text" name="artist" id="artist" required>
        </div>
        <div>
            <label for="file">Music File:</label>
            <input type="file" name="file" id="file" accept=".mp3,.wav" required>
        </div>
        <button type="submit">Upload</button>
    </form>
@endsection