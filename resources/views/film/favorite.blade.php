@extends('layouts.main')

@section('content')
    <section class="section section--first">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section__wrap">
                        <h1 class="section__title section__title--head">
                            List Favorite Film
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div>
        <div class="section section--catalog">
            <div class="container">
                @if (!empty($film))
                    <div class="row" id="filmList">
                        @foreach ($film as $row)
                            <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                                <div class="item">
                                    <div class="item__cover">
                                        <img src="{{ $row->Poster != 'N/A' ? $row->Poster : asset('assets/img/covers/cover.jpg') }}"
                                            data-src="{{ $row->Poster != 'N/A' ? $row->Poster : asset('assets/img/covers/cover.jpg') }}"
                                            class="lazyload">

                                        <a href="{{ url('film/' . $row->imdbID) }}" class="item__play">
                                            <i class="ti ti-player-play-filled"></i>
                                        </a>

                                        <button type="button"
                                            class="item__favorite {{ $row->is_favorite ? 'item__favorite--active' : '' }}"
                                            id="btnFavorite{{ $row->imdbID }}"
                                            onclick="addFavorite('{{ $row->imdbID }}')">
                                            <i class="ti ti-bookmark"></i>
                                        </button>
                                    </div>

                                    <div class="item__content">
                                        <h3 class="item__title">
                                            <a href="{{ url('film/' . $row->imdbID) }}">
                                                {{ $row->Title }}
                                            </a>
                                        </h3>

                                        <span class="item__category text-white">
                                            {{ $row->Year }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="d-flex justify-content-center mt-5">
                        <h1 class="text-white">
                            No Data Found
                        </h1>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('custom_js')
    <script src="{{ asset('assets/custom/film/favorite.js') }}"></script>
@endsection
