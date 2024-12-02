<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Music;

class MusicController extends Controller
{
    public function index()
    {
        $musics = Music::all();
        return view('musics.index', compact('musics'));
    }

    public function create()
    {
        return view('musics.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'artist' => 'required',
            'file' => 'required|mimes:mp3,wav|max:20480', // 20MB max
        ]);

        $path = $request->file('file')->store('music', 'public');

        Music::create([
            'title' => $request->title,
            'artist' => $request->artist,
            'file_path' => $path,
        ]);

        return redirect()->route('musics.index')->with('success', 'Music uploaded successfully.');
    }

    public function play($id)
    {
        $music = Music::findOrFail($id);
        return view('musics.play', compact('music'));
    }
}
