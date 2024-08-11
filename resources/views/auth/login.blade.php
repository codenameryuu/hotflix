@extends('layouts.auth')

@section('content')
    <div class="sign section--bg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="sign__content">
                        <form method="POST" action="{{ url('authenticate') }}" class="sign__form">
                            @csrf

                            <a href="index.html" class="sign__logo">
                                <img src="{{ asset('assets/img/logo.svg') }}" alt="">
                            </a>

                            <div class="sign__group">
                                <input type="text" class="sign__input" name="username" id="username"
                                    placeholder="Username" autocomplete="off">
                            </div>

                            <div class="sign__group">
                                <input type="password" class="sign__input" name="password" id="password"
                                    placeholder="Password">
                            </div>

                            <button class="sign__btn" type="submit">
                                Login
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
