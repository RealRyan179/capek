<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SongController extends Controller
{
        public function index()
    {
        $songs = Song::all();
        return view('songs.index', compact('songs'));
    }

    public function create()
    {
        return view('songs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'artist' => 'required',
            'url' => 'required|url',
        ]);

        $song = new Song();
        $song->title = $request->title;
        $song->artist = $request->artist;
        $song->url = $request->url;
        $song->user_id = auth()->id();
        $song->save();

        return redirect()->route('songs.index');
    }   
}
