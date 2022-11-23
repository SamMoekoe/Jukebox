<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Playlist;
use App\Models\Saved_Song;
use App\Models\Song;

class QueueController extends Controller
{
    public function add(Request $request, $id){ 

        app('App\Http\Controllers\SessionController')->sessionPush('playlists', $id, $request); 

        return redirect('/queue');
    }

    public function getQueueSongs(Request $request){

        $song = Song::all();
        $value = app('App\Http\Controllers\SessionController')->sessionGetAll('playlists', $request);  

        return view('/queue')->with(['value' => $value, 'song' => $song]);
    }
    
    public function remove(Request $request, $id){ 

        app('App\Http\Controllers\SessionController')->sessionPull('playlists', $id, $request); 

        return redirect('/queue');
    }

    public function create(Request $request)
    {
        $playlist = new Playlist;

        $playlist->title = $request->name;

        $playlist->userid = Auth::user()->id;

        $playlist->save();

        $name = Playlist::where('title', $request->name)->get();

        $songs = app('App\Http\Controllers\SessionController')->sessionPullAll('playlists', $request);

        foreach ($songs as $song => $count){
            $savedSong = new Saved_Song;

            $savedSong->listid = $name[0]->id;

            $savedSong->songid = $songs[$song];

            $savedSong->save();
        }

        return redirect('/dashboard');
    }
}
