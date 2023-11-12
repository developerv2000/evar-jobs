<header class="header" id="header">
    <nav class="navbar navbar-expand-lg main-container">
        <a class="logo navbar-logo" href="https://evar.tj/"><img class="navbar-logo__img"
                src="{{asset('img/main/logo.png')}}" alt="Ёвар лого"></a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01"
            aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fa fa-bars"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <ul class="navbar-nav">
                <li class="navbar__item">
                    <a href="{{ route('home') }}" class="navbar__link">Главная</a>
                </li>

                <li class="navbar__item">
                    <a href="#vacancies_section" class="navbar__link">Вакансии</a>
                </li>

                <li class="navbar__item">
                    <a href="#cv_section" class="navbar__link">Заполнить анкету</a>
                </li>
            </ul>
        </div>

    </nav>
</header>