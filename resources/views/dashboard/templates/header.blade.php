<header class="header" id="header">
    <span class="material-icons-outlined aside-toggler" id="aside_toggler" data-bs-toggle="tooltip"
        data-bs-placement="bottom" title="На весь экран">menu</span>
    {{-- Header Title start --}}
    <h1 class="header__title">
        @switch($route)
        @case('dashboard.index')
        Заполненные анкеты
        @break

        @case('dashboard.cvs.single')
        Заполненные анкеты / {{$cv->name}}
        @break

        @case('dashboard.uploads.index')
        Загруженные анкеты
        @break

        @case('dashboard.vacancies.index')
        Вакансии
        @break

        @case('dashboard.vacancies.create')
        Вакансии / Добавить вакансию
        @break

        @case('dashboard.vacancies.single')
        Вакансии / {{$vacancy->name}}
        @break

        @case('dashboard.positions.index')
        Должности
        @break

        @case('dashboard.positions.create')
        Должности / Добавить должность
        @break

        @case('dashboard.positions.single')
        Должности / {{$position->name}}
        @break

        @endswitch
    </h1> {{-- Header Title end --}}

    {{-- Page info start --}}
    <div class="header__actions">
        {{-- Routes may have different actions --}}
        @switch($route)
        @case('dashboard.index')
        <span class="header__actions-span">Всего анкет : {{$items_count}}</span>
        <span class="header__actions-span">Новые анкеты : {{$all_items->where("new", true)->count()}}</span>
        <button class="header__actions-button" type="button" data-bs-toggle="modal"
            data-bs-target="#remove_multiple_modal">Удалить отмеченные</button>
        @break

        @case('dashboard.cvs.single')
        <form method="POST" action="{{ route('cvs.download_in_word') }}">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{$cv->id}}" />
            <button type="submit" class="header__actions-button"><i class="fa fa-download"></i> Скачать в формате Word</button>
        </form>
        <button class="header__actions-button" type="button" data-bs-toggle="modal" data-bs-target="#remove_single_modal">Удалить анкету</button>
        @break

        @case('dashboard.uploads.index')
        <span class="header__actions-span">Загруженных анкет : {{$items_count}}</span>
        <span class="header__actions-span">Новые анкеты : {{$new_items}}</span>
        <button class="header__actions-button" type="button" data-bs-toggle="modal"
            data-bs-target="#remove_multiple_modal">Удалить отмеченные</button>
        @break

        @case('dashboard.vacancies.index')
        <span class="header__actions-span">Элементов : {{$items_count}}</span>
        <a class="header__actions-link" href="{{route('dashboard.vacancies.create')}}">Добавить вакансию</a>
        <button class="header__actions-button" type="button" data-bs-toggle="modal"
            data-bs-target="#remove_multiple_modal">Удалить отмеченные</button>
        @break

        @case('dashboard.positions.index')
        <span class="header__actions-span">Элементов : {{$items_count}}</span>
        <a class="header__actions-link" href="{{route('dashboard.positions.create')}}">Добавить должность</a>
        <button class="header__actions-button" type="button" data-bs-toggle="modal"
            data-bs-target="#remove_multiple_modal">Удалить отмеченные</button>
        @break

        @endswitch
    </div> {{-- Page info end --}}

</header>
