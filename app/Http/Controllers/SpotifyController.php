<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Services\API\Spotify; 
use DB;

class SpotifyController extends Controller
{
    public function search()
    {
        return view('spotify-search');
    }

    public function results(Request $request)
    {
        $artist_name = $request->input('artist_name');

        $spotify = new Spotify([
    		'clientID' => 'fab1869f594107d250ff7afcd029dfc4'
	    ]);

        $results = $spotify->artistsSearch($artist_name);
        $artists = [];

	    if ($results->artists && $results->artists->items) {
	    	$artists = $results->artists->items;
		}


	    return view('spotify-artists', [
	    	'artist_name' => $artist_name,
	        'artists' => $artists,
            'title' => 'Search Results',
	    ]);
    }

    public function artist(Request $request, $id)
    {
        $spotify = new Spotify([
            'clientID' => 'fab1869f594107d250ff7afcd029dfc4'
        ]);

        $artist = $spotify->artist($id);
        $title = $artist->name . ' Songs';

        $results = $spotify->artistTopTracks($id);
        $tracks = [];

        if ($results->tracks) {
            $tracks = $results->tracks;
        }

        return view('spotify-artist', [
            'artist' => $artist,
            'tracks' => $tracks,
            'title' => $title,
        ]);
    }
}