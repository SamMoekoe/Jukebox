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

    public function getAllPlaylists(){

        $playlist = Playlist::all();

        return view('/selectplaylist')-> with('playlist', $playlist);
    }

    public function storeSong(Request $request, $id){

        app('App\Http\Controllers\SessionController')->sessionPut('song', $id, $request);

        return redirect('/selectplaylist');
    }

    public function saveSong(Request $request){

        $list = Playlist::where('title', $request->playlist)->get();

        $songid = app('App\Http\Controllers\SessionController')->sessionGetAll('song', $request);

        $savedSong = new Saved_Song;

        $savedSong->listid = $list[0]->id;

        $savedSong->songid = $songid;

        $savedSong->save();

        return redirect('/playlistdetail/'. $list[0]->id);
    }

    public function deleteSong($id){

        Saved_Song::where('id', $id)->delete();

        return back();
    }

    public function storeName(Request $request, $id){

        app('App\Http\Controllers\SessionController')->sessionPut('name', $id, $request);

        return redirect('/playlistrename');
    }

    public function rename(Request $request){

        $name = app('App\Http\Controllers\SessionController')->sessionGetAll('name', $request);

        Playlist::where('id', $name)->update(['title' => $request->name]);

        return redirect('/playlists');
    }
}
