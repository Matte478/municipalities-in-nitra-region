<header class="header">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="header__top">
                    <a class="header__logo" href="{{ route('home') }}">
                        <img src="{{ Vite::asset('resources/images/logo.svg') }}" width="150" height="58"
                            alt="Effective" />
                    </a>
                    <div class="d-flex flex-column flex-md-row gap-4 align-items-md-center w-100">
                        <div class="d-flex flex-row gap-4 align-items-center justify-content-sm-end w-100">
                            <a class="fw-bolder text-primary" href="#">Kontakty a čísla na oddelenia</a>
                            <a class="header__lang-switcher" href="#">EN</a>
                        </div>
                        <div class="d-flex flex-row gap-2 gap-sm-3 align-items-center w-100">
                            <form class="header__form w-100 w-sm-auto" action="#" method="GET">
                                <div class="input-group header__input-group">
                                    <input type="text" class="form-control header__input rounded" />
                                    <img class="header__input-group_icon"
                                        src="{{ Vite::asset('resources/images/icon-magnifying-glass.svg') }}"
                                        alt="icon" />
                                </div>
                            </form>
                            <a class="btn" href="#">Prihlásenie</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <nav class="header__navbar">
                    <ul class="header__navbar_list">
                        <li class="header__navbar_iten"><a href="#">O nás</a></li>
                        <li class="header__navbar_iten"><a href="#">Zoznam miest</a></li>
                        <li class="header__navbar_iten"><a href="#">Inšpekcia</a></li>
                        <li class="header__navbar_iten"><a href="#">Kontakt</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>
