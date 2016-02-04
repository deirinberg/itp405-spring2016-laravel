<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class DVDController extends Controller
{
    public function search()
    {
        $genres = DB::table('genres')
            ->get();
        $ratings = DB::table('ratings')
            ->get();

        return view('search', [
            'genres' => $genres,
            'ratings' => $ratings,
        ]);
    }

    public function results(Request $request)
    {
        $dvd_title = $request->input('dvd_title');
        $genre_id = $request->input('genre_id');
        $rating_id = $request->input('rating_id');

        $genre_name = '';
        $rating_name = '';

        $dvdsQuery = DB::table('dvds')
            ->select('title', 'rating_name', 'genre_name', 'label_name', 'sound_name', 'format_name')
            ->leftJoin('ratings', 'dvds.rating_id', '=', 'ratings.id')
            ->leftJoin('genres', 'dvds.genre_id', '=', 'genres.id')
            ->leftJoin('labels', 'dvds.label_id', '=', 'labels.id')
            ->leftJoin('sounds', 'dvds.sound_id', '=', 'sounds.id')
            ->leftJoin('formats', 'dvds.format_id', '=', 'formats.id');

        if ($dvd_title) {
            $dvdsQuery = $dvdsQuery->where('title', 'like', "%$dvd_title%");
        }

        if ($genre_id && strcmp($genre_id, 'all') !== 0) {
            $dvdsQuery = $dvdsQuery->where('dvds.genre_id', "$genre_id");
            $genre = DB::table('genres')
                ->where('id', "$genre_id")
                ->get();

            if(!empty($genre)) {
                $genre_name = array_values($genre)[0]->genre_name;
            }
        }

        if ($rating_id && strcmp($rating_id, 'all') !== 0) {
            $dvdsQuery = $dvdsQuery->where('dvds.rating_id', "$rating_id");
            $rating = DB::table('ratings')
                ->where('id', "$rating_id")
                ->get();

            if(!empty($rating)) {
                $rating_name = array_values($rating)[0]->rating_name;
            }
        }

        $dvds = $dvdsQuery->get();

        return view('results', [
            'dvds' => $dvds,
            'dvd_title' => $dvd_title,
            'genre_name' => $genre_name,
            'rating_name' => $rating_name,
        ]);

        return view('results');
    }
}
