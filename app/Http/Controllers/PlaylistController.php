<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Playlist;
use App\Models\Saved_Song;
use App\Models\Song;

class PlaylistController extends Controller
{
    public function getUserPlaylists(){

        $playlist = Playlist::where('userid', Auth::user()->id)->get();
        
        return view('/playlists')->with('playlist', $playlist);
    }

    public function getPlaylistDetails($id){
        $name = Playlist::where('id', $id)->get();

        $select = Saved_Song::where('listid', $id)->get();

        $song = Song::all();

        return view('playlistdetail')->with(['name'=> $name, 'select' => $select, 'song' => $song]);
    }
    
    public function deletePlaylist($id){

        Playlist::where('id', $id)->delete();
        Saved_Song::where('listid', $id)->delete();
        
        
        return redirect('/playlists');
    }
}
