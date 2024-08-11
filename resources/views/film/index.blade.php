@extends('layouts.main')

@section('content')
    <section class="section section--first">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section__wrap">
                        <h1 class="section__title section__title--head">
                            List Film
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div>
        <div class="filter filter--fixed">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="filter__content">
                            <button class="filter__menu" type="button">
                                <i class="ti ti-filter"></i>
                                Filter
                            </button>

                            <form id="formSubmit" method="GET" action="javascript:void(0)">
                                <div class="filter__items">
                                    <div class="row">
                                        <div class="col-lg-9 col-md-9 col-sm-9">
                                            <div class="d-flex justify-content-between w-100">
                                                <div class="mb-3 flex-grow-1 me-2">
                                                    <select class="filter__select filter-type" name="type"
                                                        id="type">
                                                        @if ($filter->type)
                                                            <option value="{{ $filter->type }}">
                                                                {{ ucfirst($filter->type) }}
                                                            </option>
                                                        @endif

                                                        <option value="">
                                                            All
                                                        </option>

                                                        @if ($filter->type != 'episode')
                                                            <option value="episode">
                                                                Episode
                                                            </option>
                                                        @endif

                                                        @if ($filter->type != 'movie')
                                                            <option value="movie">
                                                                Movie
                                                            </option>
                                                        @endif

                                                        @if ($filter->type != 'series')
                                                            <option value="series">
                                                                Series
                                                            </option>
                                                        @endif
                                                    </select>
                                                </div>

                                                <div class="mb-3 flex-grow-1 me-2">
                                                    <input type="text" class="filter__input" name="year"
                                                        id="year" value="{{ $filter->year }}" placeholder="Year"
                                                        autocomplete="off">
                                                </div>

                                                <div class="mb-3 flex-grow-1">
                                                    <input type="text" class="filter__input" name="search"
                                                        id="search" value="{{ $filter->search }}" placeholder="Search..."
                                                        autocomplete="off">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-md-3 col-sm-3">
                                            <button type="submit" class="filter__btn">
                                                Apply
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section section--catalog">
            <div class="container">
                @if (!empty($film))
                    <input type="hidden" id="page" value="{{ $pagination->page }}">
                    <input type="hidden" id="perPage" value="{{ $pagination->per_page }}">
                    <input type="hidden" id="lastPage" value="{{ $pagination->last_page }}">
                    <input type="hidden" id="total" value="{{ $pagination->total }}">

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

                    <div class="d-none justify-content-center mt-4" id="spinnerLoadMore">
                        <div class="spinner-border text-white" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
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

    <div class="mfilter">
        <div class="mfilter__head">
            <h6 class="mfilter__title">
                Filter
            </h6>

            <button class="mfilter__close" type="button">
                <i class="ti ti-x"></i>
            </button>
        </div>

        <div class="mfilter__select-wrap">
            <form id="formSubmitMobile" method="GET" action="javascript:void(0)">
                <div class="sign__group mb-3">
                    <select class="filter__select filter-type-mobile" name="typeMobile" id="typeMobile">
                        @if ($filter->type)
                            <option value="{{ $filter->type }}">
                                {{ ucfirst($filter->type) }}
                            </option>
                        @endif

                        <option value="">
                            All
                        </option>

                        @if ($filter->type != 'episode')
                            <option value="episode">
                                Episode
                            </option>
                        @endif

                        @if ($filter->type != 'movie')
                            <option value="movie">
                                Movie
                            </option>
                        @endif

                        @if ($filter->type != 'series')
                            <option value="series">
                                Series
                            </option>
                        @endif
                    </select>
                </div>

                <div class="sign__group mb-3">
                    <input type="text" class="filter__input" id="yearMobile" value="{{ $filter->year }}"
                        placeholder="Year" autocomplete="off">
                </div>

                <div class="sign__group mb-3">
                    <input type="text" class="filter__input" id="searchMobile" value="{{ $filter->search }}"
                        placeholder="Search" autocomplete="off">
                </div>

                <button type="submit" class="mfilter__apply">
                    Apply
                </button>
            </form>
        </div>
    </div>
@endsection

@section('custom_js')
    <script>
        if (document.querySelector('.filter-type')) {
            new SlimSelect({
                select: '.filter-type'
            });
        }

        if (document.querySelector('.filter-type-mobile')) {
            new SlimSelect({
                select: '.filter-type-mobile'
            });
        }
    </script>

    <script src="{{ asset('assets/custom/film/index.js') }}"></script>
@endsection
