@extends('layouts.app')

@section('content')
    <h2>Now Playing: {{ $music->title }} by {{ $music->artist }}</