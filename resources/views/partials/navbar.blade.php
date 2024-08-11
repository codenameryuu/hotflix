<header class="header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="header__content">
                    <a href="{{ url('film') }}" class="header__logo">
                        <img src="{{ asset('assets/img/logo.svg') }}" alt="">
                    </a>

                    <div class="header__auth">
                        <form action="#" class="header__search">
                            <input class="header__search-input" type="text" placeholder="Search...">
                            <button class="header__search-button" type="button">
                                <i class="ti ti-search"></i>
                            </button>
                            <button class="header__search-close" type="button">
                                <i class="ti ti-x"></i>
                            </button>
                        </form>

                        <button class="header__search-btn" type="button">
                            <i class="ti ti-search"></i>
                        </button>

                        <div class="header__lang">
                            <a class="header__nav-link" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">EN <i class="ti ti-chevron-down"></i></a>

                            <ul class="dropdown-menu header__dropdown-menu">
                                <li>
                                    <a href="#">
                                        English
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        Indonesia
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <button class="header__btn" type="button">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</header>
