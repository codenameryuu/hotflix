<header class="header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="header__content d-flex justify-content-between">
                    <a href="{{ url('film') }}" class="header__logo">
                        <img src="{{ asset('assets/img/logo.svg') }}" alt="">
                    </a>

                    <div class="d-flex">
                        <a href="{{ url('film/favorite') }}">
                            <button class="btn btn-primary text-white me-3">
                                Favorite
                            </button>
                        </a>

                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger text-white">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</header>
