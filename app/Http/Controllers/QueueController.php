<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;

class QueueController extends Controller
{
    public function add(Request $request, $id){ 

        app('App\Http\Controllers\SessionController')->sessionPush('playlists', $id, $request); 

        return redirect('/playlists');
    }

    public function getQueueSongs(Request $request){

        $song = Song::all();
        $value = app('App\Http\Controllers\SessionController')->sessionGetAll('playlists', $request);  

        return view('/queue')->with(['value' => $value, 'song' => $song]);
    }
    
}
