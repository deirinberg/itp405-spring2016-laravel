<?php

namespace App\Services\API;

use Cache;

class Spotify {
    protected $clientID;
    const ENDPOINT = 'https://api.spotify.com';

    public function __construct(array $config)
    {
        // $this->clientID = $config['clientID'];
    }

    // http://api.spotify.com/v1/search?q={artist_name}&type=artist
    public function artistsSearch($artistName)
    {
        $endpoint = $this->buildRequestURL('/v1/search', array('q'=>$artistName, 'type'=>'artist'));

        return $this->getJSONFromEndpoint($endpoint);
    }

    public function artist($artistId)
    {
        $url = '/v1/artists/' . $artistId;
        $endpoint = $this->buildRequestURL($url, array('country'=>'US'));

        return $this->getJSONFromEndpoint($endpoint);
    }

    public function artistTopTracks($artistId)
    {
        $url = '/v1/artists/' . $artistId . '/top-tracks';
        $endpoint = $this->buildRequestURL($url, array('country'=>'US'));

        return $this->getJSONFromEndpoint($endpoint);
    }

    public function artistRelatedArtists($artistId)
    {
        $url = '/v1/artists/' . $artistId . '/related-artists';
        $endpoint = $this->buildRequestURL($url);

        return $this->getJSONFromEndpoint($endpoint);
    }

    protected function getJSONFromEndpoint($endpoint)
    {
        if (Cache::get($endpoint)) {
            $jsonString = Cache::get($endpoint);
        } else {
            $jsonString = file_get_contents($endpoint);
            Cache::put($endpoint, $jsonString, 30);
        }

        return json_decode($jsonString);
    }

    protected function buildRequestURL($resource, $qs = [])
    {
        $qs['client_id'] = $this->clientID;
        return self::ENDPOINT . $resource . '?' . http_build_query($qs);
    }
}
