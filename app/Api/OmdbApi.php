<?php

namespace App\Api;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Psr7\Request as GuzzleRequest;

use App\Helpers\MessageHelper;
use App\Models\UserFavorite;
use Illuminate\Support\Facades\Auth;

class OmdbApi
{
    /**
     ** Search film.
     *
     * @param $request
     * @return object
     */
    public function searchFilm($request)
    {
        $status = false;
        $message = MessageHelper::retrieveFail();
        $data = [];
        $pagination = [];

        $url = config('omdb.api_base_url');
        $apiKey = config('omdb.api_key');

        $client = new GuzzleClient();

        $payload = [
            'apikey' => $apiKey,
            's' => $request->search,
            'page' => $request->page,
        ];

        if ($request->type) {
            $payload['type'] = $request->type;
        }

        if ($request->year) {
            $payload['y'] = $request->year;
        }

        $guzzleRequest = new GuzzleRequest('GET', $url);
        $response = $client->sendAsync($guzzleRequest, [
            'query' => $payload
        ])
            ->wait();

        $statusCode = $response->getStatusCode();

        if ($statusCode == 200) {
            $content = json_decode($response->getBody()->getContents());

            if ($content->Response == 'True') {
                $status = true;
                $message = MessageHelper::retrieveSuccess();
                $data = $content->Search;

                for ($i = 0; $i < count($data); $i++) {
                    $filmId = $data[$i]->imdbID;

                    $isFavorite = UserFavorite::where('user_id', Auth::user()->id)
                        ->where('film_id', $filmId)
                        ->first();

                    if ($isFavorite) {
                        $data[$i]->is_favorite = true;
                    } else {
                        $data[$i]->is_favorite = false;
                    }
                }

                $pagination = (object) [
                    'page' => $request->page,
                    'per_page' => 10,
                    'last_page' => ceil($content->totalResults / 10),
                    'total' => $content->totalResults,
                ];
            }
        }

        $result = (object) [
            'status' => $status,
            'message' => $message,
            'data' => $data,
            'pagination' => $pagination,
        ];

        return $result;
    }

    /**
     ** Detail film.
     *
     * @param $request
     * @return object
     */
    public function detailFilm($request)
    {
        $url = config('omdb.api_base_url');
        $apiKey = config('omdb.api_key');

        $client = new GuzzleClient();

        $data = [
            'query' => [
                'apikey' => $apiKey,
                'i' => $request->id,
            ]
        ];

        $guzzleRequest = new GuzzleRequest('GET', $url);
        $response = $client->sendAsync($guzzleRequest, $data)->wait();

        $statusCode = $response->getStatusCode();

        if ($statusCode == 200) {
            $status = true;
            $message = MessageHelper::retrieveSuccess();

            $data = json_decode($response->getBody()->getContents());

            $isFavorite = UserFavorite::where('user_id', Auth::user()->id)
                ->where('film_id', $data->imdbID)
                ->first();

            if ($isFavorite) {
                $data->is_favorite = true;
            } else {
                $data->is_favorite = false;
            }
        } else {
            $status = false;
            $message = MessageHelper::registerFail();
            $data = [];
        }

        $result = (object) [
            'status' => $status,
            'message' => $message,
            'data' => $data,
        ];

        return $result;
    }
}
