@extends('layouts.main')


@section('content')
    <section class="section section--details">
        <div class="container">
            <div class="row">
                <div class="col-12 col-xl-12">
                    <div class="item item--details">
                        <div class="row">
                            <div class="col-12 col-sm-5 col-md-5 col-lg-4 col-xl-6 col-xxl-5">
                                <div class="item__cover">
                                    <img src="{{ $film->Poster }}">

                                    <span class="item__rate item__rate--green">
                                        {{ $film->imdbRating }}
                                    </span>

                                    <button
                                        class="item__favorite item__favorite--static {{ $film->is_favorite ? 'item__favorite--active' : '' }}"
                                        type="button">
                                        <i class="ti ti-bookmark"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="col-12 col-md-7 col-lg-8 col-xl-6 col-xxl-7">
                                <div class="item__content">
                                    <ul class="item__meta">
                                        <li>
                                            <span>
                                                Title: {{ $film->Title }}
                                            </span>
                                        </li>

                                        <li>
                                            <span>
                                                Director: {{ $film->Director }}
                                            </span>
                                        </li>

                                        <li>
                                            <span>
                                                Writer: {{ $film->Writer }}
                                            </span>
                                        </li>

                                        <li>
                                            <span>
                                                Cast:
                                            </span>

                                            <span class="text-warning">
                                                {{ $film->Actors }}
                                            </span>
                                        </li>

                                        <li>
                                            <span>
                                                Genre:
                                            </span>

                                            <span class="text-warning">
                                                {{ $film->Genre }}
                                            </span>
                                        </li>

                                        <li>
                                            <span>
                                                Released: {{ $film->Released }}
                                            </span>
                                        </li>

                                        <li>
                                            <span>
                                                Runtime: {{ $film->Runtime }}
                                            </span>
                                        </li>

                                        <li>
                                            <span>
                                                Country: {{ $film->Country }}
                                            </span>
                                        </li>

                                        <li>
                                            <div class="mt-3">
                                                <span>
                                                    Plot:
                                                </span>

                                                <p>
                                                    {{ $film->Plot }}
                                                </p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
