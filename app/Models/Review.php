<?php

namespace App\Models;

use DB;

/**
 * Created by PhpStorm.
 * User: davidtang
 * Date: 2/1/16
 * Time: 10:18 PM
 */
class Review
{
    public function __construct(array $data)
    {
        $this->rating = $data['rating'];
        $this->title = $data['title'];
        $this->description = $data['description'];
        $this->dvd_id = $data['dvd_id'];
    }

    public function save()
    {
        DB::table('reviews')->insert([
            'rating' => $this->rating,
            'title' => $this->title,
            'description' => $this->description,
            'dvd_id' => $this->dvd_id
        ]);
    }

    public static function all()
    {
        return DB::table('reviews')
            ->orderBy('rating')
            ->get();
    }
}