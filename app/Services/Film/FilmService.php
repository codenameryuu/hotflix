<?php

namespace App\Services\Film;

use Illuminate\Support\Facades\Auth;

use App\Api\OmdbApi;

use App\Helpers\CheckHelper;
use App\Helpers\MessageHelper;

use App\Models\UserFavorite;

class FilmService
{
    /**
     ** Index service.
     *
     * @param $request
     * @return object
     */
    public function index($request)
    {
        $status = true;
        $message = MessageHelper::retrieveSuccess();

        $filter = [
            'search' => $request->search,
            'type' => null,
            'year' => null,
            'page' => 1,
        ];

        if (CheckHelper::isset($request->type)) {
            $filter['type'] = $request->type;
        }

        if (CheckHelper::isset($request->year)) {
            $filter['year'] = $request->year;
        }

        if (CheckHelper::isset($request->page)) {
            $filter['page'] = $request->page;
        }

        $filter = (object) $filter;

        $film = [];
        $pagination = [];

        if (CheckHelper::isset($filter->search)) {
            $payload = $filter;
            $omdbApi = new OmdbApi();
            $response = $omdbApi->searchFilm($payload);

            if ($response->status) {
                $film = $response->data;
                $pagination = $response->pagination;
            }
        }

        $result = (object) [
            'status' => $status,
            'message' => $message,
            'filter' => $filter,
            'film' => $film,
            'pagination' => $pagination,
        ];

        return $result;
    }

    /**
     ** Detail service.
     *
     * @param $request
     * @return object
     */
    public function loadMore($request)
    {
        $status = true;
        $message = MessageHelper::retrieveSuccess();

        $filter = (object) $request->all();

        $payload = (object) [
            'search' => $filter->search,
            'type' => $filter->type,
            'year' => $filter->year,
            'page' => $filter->page,
        ];

        $omdbApi = new OmdbApi();
        $response = $omdbApi->searchFilm($payload);

        $film = [];

        if ($response->status) {
            $film = $response->data;
        }

        $result = (object) [
            'status' => $status,
            'message' => $message,
            'film' => $film,
        ];

        return $result;
    }

    /**
     ** Add Favorite service.
     *  
     * @param $request
     * @return object
     */
    public function addFavorite($request)
    {
        $status = true;
        $message = MessageHelper::saveSuccess();

        $userFavorite = UserFavorite::where('user_id', Auth::user()->id)
            ->where('film_id', $request->film_id)
            ->first();

        if ($userFavorite) {
            $userFavorite->delete();
        } else {
            $data = [
                'user_id' => Auth::user()->id,
                'film_id' => $request->film_id,
            ];

            UserFavorite::create($data);
        }


        $result = (object) [
            'status' => $status,
            'message' => $message,
        ];

        return $result;
    }

    /**
     ** Detail service.
     *
     * @param $request
     * @return object
     */
    public function detail($request)
    {
        $status = true;
        $message = MessageHelper::retrieveSuccess();

        $omdbApi = new OmdbApi();
        $response = $omdbApi->detailFilm($request);

        $film = $response->data;

        $result = (object) [
            'status' => $status,
            'message' => $message,
            'film' => $film,
        ];

        return $result;
    }
}
