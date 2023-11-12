@extends('dashboard.templates.master')
@section("main")

{{-- Horizontal Tabs Navs Start--}}
<div class="single-cv">
    <ul class="nav nav-pills" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pills-personal-tab" data-bs-toggle="pill"
                data-bs-target="#pills-personal" type="button" role="tab" aria-controls="pills-personal"
                aria-selected="true">Персональная
                информация</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-position-tab" data-bs-toggle="pill" data-bs-target="#pills-position"
                type="button" role="tab" aria-controls="pills-position" aria-selected="false">Должность</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-address-tab" data-bs-toggle="pill" data-bs-target="#pills-address"
                type="button" role="tab" aria-controls="pills-address" aria-selected="false">Адрес</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-education-tab" data-bs-toggle="pill" data-bs-target="#pills-education"
                type="button" role="tab" aria-controls="pills-education" aria-selected="false">Образование</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-experience-tab" data-bs-toggle="pill" data-bs-target="#pills-experience"
                type="button" role="tab" aria-controls="pills-experience" aria-selected="false">Опыт работы</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-additional-tab" data-bs-toggle="pill" data-bs-target="#pills-additional"
                type="button" role="tab" aria-controls="pills-additional" aria-selected="false">Дополнительно</button>
        </li>
    </ul>
    {{-- Horizontal Tabs Navs End--}}


    {{-- Horizontal Tabs Content Start--}}
    <div class="tab-content" id="pills-tabContent">
        {{-- Personal Tab --}}
        <div class="tab-pane fade show active" id="pills-personal" role="tabpanel" aria-labelledby="pills-personal-tab">
            <p><b>Ф.И.О : </b>{{$cv->name}}</p>
            <p><b>Дата рождения : </b>{{$cv->birthday}}</p>
            <p><b>Телефон : </b>{{$cv->phone1}}</p>
            @if($cv->phone2 != '') <p><b>Дополнительный телефон : </b>{{$cv->phone2}}</p> @endif
            @if($cv->email != '') <p><b>Электронная почта : </b>{{$cv->email}}</p> @endif
            <p><b>Семейное положение : </b> {{ $cv->married ? 'Женат/Замужем' : 'Не женат/ Не замужем'}}</p>
            <p><b>Количество детей : </b> {{ $cv->got_childs ? $cv->childs_count : '0'}}</p>

            @if($cv->photo == 'Ошибка' || $cv->photo == '')
            <p><b>Фото : </b> Ошибка загрузки фотки на сайт!</p>
            @else
            <p><b>Фото профиля :</b></p>
            <img src="{{asset('img/private/candidates/' . $cv->photo)}}" class="cv-photo">
            @endif
        </div>

        {{-- Position Tab --}}
        <div class="tab-pane fade" id="pills-position" role="tabpanel" aria-labelledby="pills-position-tab">
            <p><b>Претендует на должность : </b>{{$cv->position == null ? 'Должность удалена !' : $cv->position->name}}</p>
        </div>

        {{-- Address Tab --}}
        <div class="tab-pane fade" id="pills-address" role="tabpanel" aria-labelledby="pills-address-tab">
            <p class="text-center"><b>Адрес по прописке</b></p>
            <p><b>Проживает по адресу прописки : </b>{{ $cv->registrated_address ? 'Да' : 'Нет'}}</p>
            <p><b>Город : </b>{{$cv->city1}}</p>
            @if($cv->area1 != '') <p><b>Район : </b>{{$cv->area1}}</p> @endif
            <p><b>Улица / Квартал : </b>{{$cv->street1}}</p>
            <p><b>Квартира : </b>{{$cv->appartment1}}</p>

            @if(!$cv->registrated_address)
            <div class="block-divider"></div>
            <p class="text-center"><b>Фактический адрес проживания</b></p>
            <p><b>Город : </b>{{$cv->city2}}</p>
            @if($cv->area1 != '') <p><b>Район : </b>{{$cv->area2}}</p> @endif
            <p><b>Улица / Квартал : </b>{{$cv->street2}}</p>
            <p><b>Квартира : </b>{{$cv->appartment2}}</p>
            @endif
        </div>

        {{-- Education Tab --}}
        <div class="tab-pane fade" id="pills-education" role="tabpanel" aria-labelledby="pills-education-tab">
            <p><b>Уровень образования : </b>
                @if($cv->education1_lvl == '0') Среднее (школа, лицей)
                @elseif($cv->education1_lvl == '1') Среднее - специальное (колледж)
                @else Высшее (бакалаврият, магистратура) @endif
            </p>
            <p><b>Наименование учебного завидение : </b>{{$cv->education1_inst_name}}</p>
            @if($cv->education1_spec != '') <p><b>Специализация : </b>{{$cv->education1_spec}}</p> @endif
            <p><b>Год поступления : </b>{{$cv->education1_begin}}</p>
            <p><b>Год окончания : </b>{{$cv->education1_end}}</p>

            @if( strlen($cv->education2_lvl) > 0 && $cv->education2_inst_name != '' && $cv->education2_begin != '' &&
            $cv->education2_end !='')
            <div class="block-divider"></div>
            <p class="text-center"><b>Дополнительное образование</b></p>
            <p><b>Уровень образования : </b>
                @if($cv->education2_lvl == '0') Среднее (школа, лицей)
                @elseif($cv->education2_lvl == '1') Среднее - специальное (колледж)
                @else Высшее (бакалаврият, магистратура) @endif
            </p>
            <p><b>Наименование учебного завидение : </b>{{$cv->education2_inst_name}}</p>
            @if($cv->education2_spec != '') <p><b>Специализация : </b>{{$cv->education2_spec}}</p> @endif
            <p><b>Год поступления : </b>{{$cv->education2_begin}}</p>
            <p><b>Год окончания : </b>{{$cv->education2_end}}</p>
            @endif

            {{-- Languages knowledge --}}
            <div class="block-divider"></div>
            <p class="text-center"><b>Знание языков</b></p>
            <p><b>Таджикский язык : </b>
                @if($cv->tajik == '1') Отлично
                @elseif($cv->tajik == '2') Хорошо
                @else Плохо @endif
            </p>
            <p><b>Русский язык : </b>
                @if($cv->russian == '1') Отлично
                @elseif($cv->russian == '2') Хорошо
                @else Плохо @endif
            </p>
            <p><b>Английский язык : </b>
                @if($cv->english == '1') Отлично
                @elseif($cv->english == '2') Хорошо
                @else Плохо @endif
            </p>
        </div>

        {{-- Experience Tab --}}
        <div class="tab-pane fade" id="pills-experience" role="tabpanel" aria-labelledby="pills-experience-tab">
            <p><b>Опыт работы : </b>{{$cv->experienced ? 'Имеется' : 'Не имеется'}}</p>
            @if($cv->experienced)
            <p><b>Организация : </b>{{$cv->job1_org}}</p>
            <p><b>Должность : </b>{{$cv->job1_position}}</p>
            <p><b>Основные объязанности : </b>{{$cv->job1_duties}}</p>
            <p><b>Дата приёма : </b>{{$cv->job1_begin}}</p>
            <p><b>Дата увольнения : </b>{{$cv->job1_end}}</p>
            @endif

            @if($cv->job2_org != '' && $cv->job2_position != '' && $cv->job2_duties != '')
            <div class="block-divider"></div>
            <p class="text-center"><b>Дополнительно</b></p>
            <p><b>Организация : </b>{{$cv->job2_org}}</p>
            <p><b>Должность : </b>{{$cv->job2_position}}</p>
            <p><b>Основные объязанности : </b>{{$cv->job2_duties}}</p>
            <p><b>Дата приёма : </b>{{$cv->job2_begin}}</p>
            <p><b>Дата увольнения : </b>{{$cv->job2_end}}</p>
            @endif
        </div>

        {{-- Additional Tab --}}
        <div class="tab-pane fade" id="pills-additional" role="tabpanel" aria-labelledby="pills-additional-tab">
            <p><b>Хронические заболевания : </b>{{ $cv->diseases ? $cv->diseases_desc : 'Нет'}}</p>
            <p><b>Аллергия на химию и продукты : </b>{{ $cv->allergy ? $cv->allergy_desc : 'Нет'}}</p>
            <p><b>Беременность : </b>{{ $cv->pregnant ? $cv->pregnant_desc : 'Нет'}}</p>
            <p><b>Судимость : </b>{{ $cv->criminal ? $cv->criminal_desc : 'Нет'}}</p>

            @if($cv->relative)
            <div class="block-divider"></div>
            <p class="text-center"><b>Близкие родственники работающие в компании ООО "ЁВАР"</b></p>
            <p><b>Ф.И.О : </b>{{$cv->rel_name}}</p>
            <p><b>Должность : </b>{{$cv->rel_position}}</p>
            @else
            <div class="block-divider"></div>
            <p><b>Близкие родственники работающие в компании ООО "ЁВАР" : </b>Нету</p>
            @endif
            @if($cv->comment != '')
            <div class="block-divider"></div>
            <p><b>Комментарии : </b>{{$cv->comment}}</p>
            @endif
        </div>
    </div>
    {{-- Horizontal Tabs Content End--}}
</div>


<!-- Remove Single Items Modal Start-->
<div class="modal fade" id="remove_single_modal" tabindex="-1" aria-labelledby="remove_single_modal_label"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="remove_single_modal_label">Удалить</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Вы уверены что хотите удалить анкету ?
            </div>
            <div class="modal-footer">
                <button type="button" class="button" data-bs-dismiss="modal">Отмена</button>
                <form action="{{ route('cvs.remove') }}" method="POST" id="remove_single_item_form">
                    @csrf
                    <input type="hidden" value="{{$cv->id}}" name="id" id="remove_single_modal_input"/>
                    <button type="submit" class="button button--danger" id="remove_single_modal_button">Удалить</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Remove Single Items Modal End-->


@endsection