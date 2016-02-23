<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\DVD;

use Validator;
use Response;

class DVDController extends Controller
{
    public function index()
    {
        $dvds = DVD::with(array('genre', 'rating'))->take(20)->get();
        $genres = $this->findUniqueGenres($dvds);
        $ratings = $this->findUniqueRatings($dvds);

        return [
            'dvds' => $dvds,
            'genres' => $genres,
            'ratings' => $ratings,
        ];
    }

    public function show($id)
    {
        $dvd = DVD::find($id);

        if (!$dvd) {
            return Response::json([
                'error' => 'DVD not found'
            ], 404);
        }

        $genres = $this->findUniqueGenres([$dvd]);
        $ratings = $this->findUniqueRatings([$dvd]);

        return [
            'dvd' => $dvd,
            'genres' => $genres,
            'ratings' => $ratings
        ];
    }

    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'title' => 'unique:dvds,title',
            'label_id' => 'required',
            'sound_id' => 'required',
            'genre_id' => 'required',
            'rating_id' => 'required',
            'format_id' => 'required',
        ]);

        if (!$validation->passes()) {
            return Response::json([
              'errors' => [
                  'title' => $validation->errors()->get('title'),
                  'label_id' => $validation->errors()->get('label_id'),
                  'sound_id' => $validation->errors()->get('sound_id'),
                  'genre_id' => $validation->errors()->get('genre_id'),
                  'rating_id' => $validation->errors()->get('rating_id'),
                  'format_id' => $validation->errors()->get('format_id')

              ]
            ], 422);
        }

        $dvd = new DVD();
        $dvd->title = $request->input('title');
        $dvd->label_id = $request->input('label_id');
        $dvd->sound_id = $request->input('sound_id');
        $dvd->genre_id = $request->input('genre_id');
        $dvd->rating_id = $request->input('rating_id');
        $dvd->format_id = $request->input('format_id');

        $dvd->save();
        return [
            'dvd' => $dvd
        ];
    }

    private function findUniqueGenres($dvds)
    {
        $added = [];
        $genres = [];

        foreach ($dvds as $dvd) {
            if (!array_key_exists($dvd->genre->id, $added)) {
                $added[$dvd->genre->id] = true;
                $genres[] = $dvd->genre;
            }
        }

        return $genres;
    }

    private function findUniqueRatings($dvds)
    {
        $added = [];
        $ratings = [];

        foreach ($dvds as $dvd) {
            if (!array_key_exists($dvd->rating->id, $added)) {
                $added[$dvd->rating->id] = true;
                $ratings[] = $dvd->rating;
            }
        }

        return $ratings;
    }
}
