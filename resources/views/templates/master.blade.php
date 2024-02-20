<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>Ёвар - Вакансии</title>

    @php
        $description = 'Просмотр вакансий компании ЁВАР. Подробнее о рабочих местах в компании ЁВАР — свежие вакансии,
    зарплата, условия работы и многое ...';
    @endphp

    <meta name="description" content="{{ $description }}">
    <meta name="keywords" content="супермаркет Ёвар, Мясной маркет Ёвар, Сеть супермаркетов, Работа в Ёвар, Ёвар кэшбэк, Ёвар новинка, Ёвар вакансии, товар недели" />

    {{-- Opengraph --}}
    <meta property="og:description" content="{{ $description }}">
    <meta name="twitter:description" content="{{ $description }}">
    <meta property="og:locale" content="ru_RU" />
    <meta property="og:type" content="object" />
    <meta property="og:title" content="Ёвар - Вакансии" />
    <meta property="og:url" content="{{ route('home') }}" />
    <meta property="og:site_name" content="Ёвар - Вакансии" />
    <meta property="og:image" content="{{ asset('img/main/share.jpg') }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Ёвар - Вакансии">
    <meta name="twitter:image" content="{{ asset('img/main/share.jpg') }}">

    {{-- Icons --}}
    <link rel="icon" href="{{ asset('img/main/cropped-favi-32x32.png') }}" sizes="32x32">
    <link rel="icon" href="{{ asset('img/main/cropped-favi-192x192.png') }}" sizes="192x192">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('img/main/cropped-favi-180x180.png') }}">
    <meta name="msapplication-TileImage" content="{{ asset('img/main/cropped-favi-270x270.png') }}">

    {{-- Roboto Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    {{-- Font Awesome 5 --}}
    <script src="https://kit.fontawesome.com/83b2a810bf.js" crossorigin="anonymous"></script>
    {{-- Bootstrap 5.1 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
        crossorigin="anonymous">
    {{-- JQuery Form Styler 2.0.1 --}}
    <link href="{{ asset('js/JQueryFormStyler/jquery.formstyler.css') }}" rel="stylesheet">
    <link href="{{ asset('js/JQueryFormStyler/jquery.formstyler.theme.css') }}" rel="stylesheet">

    <link href=" {{ asset('css/main.css') }}" rel="stylesheet" />
    <link href=" {{ asset('css/cv_section.css') }}" rel="stylesheet" />
    <link href=" {{ asset('css/media.css') }}" rel="stylesheet" />

    {{-- Alert Flasheed Messages --}}
    @if ($flash = session('alert'))
        <div onclick="hide_flashed_message()" id="session" class="alert alert-danger" role="alert">
            {{ $flash }}
        </div>
    @endif

    <div class="spinner-container" id="spinner-container">
        <div class="spinner-border text-danger" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
        <p>Пожалуйста дождитесь загрузки вашей фотки на сервер.<br>Всё зависит от скорости вашего интернета. Размер
            фотки :
            <span id="photo-size"></span>
        </p>
    </div>

    @include('templates.header')
    <div class="content">
        @yield('content')
    </div>
    @include('templates.footer')
</head>

<body>
    {{-- Jquery 3.6 --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    {{-- Bootstrap 5.1 --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    {{-- JQuery Form Styler 2.0.1 --}}
    <script src=" {{ asset('js/JQueryFormStyler/jquery.formstyler.min.js') }}"></script>

    {{-- Google Recaptcha v3 --}}
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script>
        function onRecaptchaSubmit(token) {
            document.getElementById("feedback-form").submit();
        }
    </script>

    <script src=" {{ asset('js/main.js') }}"></script>

    @include('templates.analitics')
</body>
</html>
