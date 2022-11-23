<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;

class SongController extends Controller
{
    public function getSongDetails($id)
    {
        $song = Song::where('id',$id)->get();

        return view('/songdetail')->with('song', $song);
    }
}
