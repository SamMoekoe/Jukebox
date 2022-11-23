<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Playlist;

class PlaylistController extends Controller
{
    public function getUserPlaylists(){

        $playlist = Playlist::where('userid', Auth::user()->id)->get();
        
        return view('/playlists')->with('playlist', $playlist);
    }
}
