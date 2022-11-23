<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;

class GenreController extends Controller
{
    //
    public function getGenres(){
        $genre = Genre::all();

        return view('/genres')-> with('genre', $genre);
    }
    public function getGenreSongs($id)
    {
        $songs = Genre::find($id)->songs;

        return view('/genresongs')->with('songs', $songs);
    }
}
