 {{-- Vacancies Tabs is vertical tabs with id #v-pills-tab --}}
 {{-- CV Form is horizontal tabs with id #pills-tab  --}}

<section class="main-container cv-section" id="cv_section">
    <h1 class="main-title">Заполните анкету или отправьте своё резюме</h1>

    {{-- Cv Actions start --}}
    <div class="cv-actions" id="cv_actions">
        <button class="cv-actions__button" type="button" data-bs-toggle="modal" data-bs-target="#upload_cv_modal">
            <i class="fa fa-upload" aria-hidden="true"></i> Отправить своё резюме
        </button>

        <form action="{{ route('cv.download.template') }}" method="POST">
            {{ csrf_field() }}
            <button class="cv-actions__button" type="submit"><i class="fa fa-download"></i> Скачать шаблон
                анкеты</button>
        </form>
    </div> {{-- Cv Actions end --}}

    {{-- Upload CV Modal start --}}
    <div class="modal fade upload-cv-modal" id="upload_cv_modal" tabindex="-1" aria-labelledby="upload_cv_modal_label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="upload-cv-modal__title" id="upload_cv_modal_label">Загрузить готовую анкету</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{ route('cv.upload') }}" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <p>Выберите нужный файл (PDF или Microsoft Word). Максимальный размер до 2 мегабайта.</p>
                        {{ csrf_field() }}
                        <input type="file" accept=".docx, .doc, .pdf" class="upload-file" name="file">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="button secondary-button" data-bs-dismiss="modal">Отмена</button>
                        <button type="submit" class="button main-button">Загрузить</button>
                    </div>
                </form>

            </div>
        </div>
    </div> {{-- Upload CV Modal end --}}


    {{-- CV Form Start--}}
    <form class="cv-form" action="{{ route('cv.store') }}" method="POST" id="cv-form" onsubmit="showSpinner()"
        enctype="multipart/form-data">
        {{ csrf_field() }}
        {{-- Horizontal Tabs Navs Start--}}
        <ul class="nav nav-pills" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-personal-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-personal" type="button" role="tab" aria-controls="pills-personal"
                    aria-selected="true">Персональная информация</button>
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
                <button class="nav-link" id="pills-education-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-education" type="button" role="tab" aria-controls="pills-education"
                    aria-selected="false">Образование</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-experience-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-experience" type="button" role="tab" aria-controls="pills-experience"
                    aria-selected="false">Опыт работы</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-additional-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-additional" type="button" role="tab" aria-controls="pills-additional"
                    aria-selected="false">Дополнительно</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-send-tab" data-bs-toggle="pill" data-bs-target="#pills-send"
                    type="button" role="tab" aria-controls="pills-send" aria-selected="false">Отправить
                </button>
            </li>
        </ul>
        {{-- Horizontal Tabs Navs End--}}

        {{-- Horizontal Tabs Content Start--}}
        <div class="tab-content" id="pills-tabContent">
            @include('home.cv.personal')
            @include('home.cv.position')
            @include('home.cv.address')
            @include('home.cv.education')
            @include('home.cv.experience')
            @include('home.cv.additional')
            @include('home.cv.send')
            <div class="form-error" id="form-error">Пожалуйста заполните объязательные поля!</div>
        </div> {{-- Horizontal Tabs Content End--}}

    </form> {{-- CV Form End--}}
</section>