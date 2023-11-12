 {{-- Vacancies Tabs is vertical tabs with id #v-pills-tab --}}
 {{-- CV Form is horizontal tabs with id #pills-tab  --}}

<section class="vacancies" id="vacancies_section">
    {{-- Vacancies inner start --}}
    <div class="main-container vacancies__inner">
        <h1 class="main-title">Горячие вакансии</h1>
        {{-- Tab start --}}
        <div class="vacancies-tab" id="vacancies_tab">
            {{-- Tab Pills Container used just for vacancies count --}}
            <div class="vacancies-tab__pills-container">
                {{-- Tab buttons start --}}
                <div class="nav nav-pills vacancies-tab__pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    @foreach ($vacancies as $vacancy)
                        <button class="nav-link @unless($loop->index) active @endunless" id="v-pills-{{$vacancy->id}}-tab"
                            data-bs-toggle="pill" data-bs-target="#v-pills-{{$vacancy->id}}" type="button" role="tab"
                            aria-controls="v-pills-{{$vacancy->id}}" aria-selected="{{ $loop->index > 0 ? 'false' : 'true'}}">
                            <p class="vacancies-tab__vacancy-name">{{$vacancy->name }}</p>
                            <p class="vacancies-tab__vacancy-salary">{{$vacancy->salary }}</p>
                        </button>
                    @endforeach
                </div>  {{-- Tab buttons end --}}

                <p class="vacanciest-tab__vacancies-counter">Все вакансии ({{ $vacancies->count() }})</p>
            </div>  {{-- Tab Pills Container end --}}


            {{-- Tabs content start --}}
            <div class="tab-content vacancies-tab__content" id="v-pills-tabContent">
                @foreach ($vacancies as $vacancy)
                    <div class="tab-pane fade @unless($loop->index) show active @endunless" id="v-pills-{{ $vacancy->id }}"
                        role="tabpanel" aria-labelledby="v-pills-{{ $vacancy->id }}-tab">
                        <h2 class="vacancies-content__vacancy-name">{{$vacancy->name}}</h2>
                        <p class="vacancies-content__vacancy-salary">Зарплата:  {{$vacancy->salary}}</p>

                        <div class="vacancies-content__vacancy-body">
                            {!! $vacancy->body !!}
                        </div>

                        <a class="vacancies-content__button" href="#cv_section">Заполнить анкету</a>
                    </div>
                @endforeach
            </div>  {{-- Tabs content end --}}
        </div>  {{-- Tab end --}}

    </div>  {{-- Vacancies inner end --}}
</section>


<section class="mobile-vacancies" id="mobile_vacancies">
    <h1 class="main-title">Горячие вакансии</h1>

    <div class="accordion vacancies-accordion" id="vacancies_accordion">
        @foreach ($vacancies as $vacancy)
        <div class="accordion-item">
            <h2 class="accordion-header" id="heading{{$vacancy->id}}">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapse{{$vacancy->id}}" aria-expanded="false"
                    aria-controls="collapse{{$vacancy->id}}">
                    {{$vacancy->name}}<span><i class="fas fa-chevron-down"></i></span>
                </button>
            </h2>


            <div id="collapse{{$vacancy->id}}" class="accordion-collapse collapse"
                aria-labelledby="heading{{$vacancy->id}}" data-bs-parent="#vacancies_accordion">
                <div class="accordion-body">
                    <p class="vacancies-accordion__collapse-salary">Зарплата: {{$vacancy->salary}}</p>

                    <div class="vacancies-accordion__collapse-body">
                        {!! $vacancy->body !!}
                    </div>

                    <a class="button thirdinary-button vacancies-accordion__collapse-button" href="#cv_section">Заполнить анкету</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</section>
