<aside class="aside" id="aside">
    <a class="aside__logo" href="{{ route('home') }}" target="_blank">
        <img class="aside__logo-image" src="{{ asset('img/main/logo.png') }}">
    </a>

    <img class="aside__avatar" src="{{ asset('img/main/admin.jpg') }}">

    <nav class="aside__nav">
        <ul class="aside__nav-ul">
            <li class="aside__nav-li">
                <a class="aside__nav-link @if($route == 'dashboard.index' || $route == 'dashboard.cvs.single') aside__nav-link--active @endif"
                    href="{{route('dashboard.index')}}"><span class="aside__nav-link-icon material-icons">edit</span>
                    Заполненные анкеты</a>
            </li>

            <li class="aside__nav-li">
                <a class="aside__nav-link @if($route == 'dashboard.uploads.index') aside__nav-link--active @endif"
                    href="{{route('dashboard.uploads.index')}}"><span class="aside__nav-link-icon material-icons">file_upload</span>
                    Загруженные анкеты</a>
            </li>

            <li class="aside__nav-li">
                <a class="aside__nav-link @if($route == 'dashboard.vacancies.index' || $route == 'dashboard.vacancies.single' || $route == 'dashboard.vacancies.create') aside__nav-link--active @endif"
                    href="{{route('dashboard.vacancies.index')}}"><span class="aside__nav-link-icon material-icons">format_list_bulleted</span>
                    Все вакансии</a>
            </li>

            <li class="aside__nav-li">
                <a class="aside__nav-link @if($route == 'dashboard.positions.index' || $route == 'dashboard.positions.single' || $route == 'dashboard.positions.create') aside__nav-link--active @endif"
                    href="{{route('dashboard.positions.index')}}"><span class="aside__nav-link-icon material-icons">work</span>
                    Должности</a>
            </li>


            <li class="aside__nav-li">
                <form class="aside__form" method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="aside__form-button" type="submit"><span class="aside__form-icon material-icons">logout</span>
                        Выйти</button>
                </form>
            </li>
        </ul>
    </nav>

</aside>