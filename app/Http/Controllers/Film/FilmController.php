<?php

namespace App\Http\Controllers\Film;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Controllers\Controller;

use App\Services\Film\FilmService;

class FilmController extends Controller
{
    /**
     ** Service instance.
     *
     * @var FilmService
     */
    protected $filmService;

    /**
     ** Constructor.
     *
     * @param FilmService $filmService
     */
    public function __construct(FilmService $filmService)
    {
        $this->filmService = $filmService;
    }

    /**
     ** Index.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $result = $this->filmService->index($request);

        return view('film.index', [
            'filter' => $result->filter,
            'film' => $result->film,
            'pagination' => $result->pagination,
        ]);
    }

    /**
     ** Load More.
     *
     * @param Request $request
     * @return Response
     */
    public function loadMore(Request $request)
    {
        $result = $this->filmService->loadMore($request);

        return response()->json($result);
    }

    /**
     ** Add Favorite.
     *
     * @param Request $request
     * @return Response
     */
    public function addFavorite(Request $request)
    {
        $result = $this->filmService->addFavorite($request);

        return response()->json($result);
    }

    /**
     ** Favorite.
     *
     * @param Request $request
     * @return Response
     */
    public function favorite(Request $request)
    {
        $result = $this->filmService->favorite($request);

        return view('film.favorite', [
            'film' => $result->film,
        ]);
    }

    /**
     ** Detail.
     *
     * @param Request $request
     * @return Response
     */
    public function detail(Request $request)
    {
        $result = $this->filmService->detail($request);

        return view('film.detail', [
            'film' => $result->film,
        ]);
    }
}
