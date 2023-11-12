@extends('dashboard.templates.master')
@section("main")

{{-- Main list start --}}
<section class="list">
    {{-- Titles start --}}
    <div class="titles">
        <div class="titles__item width-33">
            @if($order_by != "created_at")
            <a class="titles__link"
                href="{{ route('dashboard.uploads.index') . '?page=' . $active_page . '&order_by=created_at&order_type=desc' }}">Дата
                загрузки
                <span class="material-icons-outlined titles__icon">arrow_upward</span>
            </a>
            @elseif($order_by == "created_at" && $order_type == "asc")
            <a class="titles__link"
                href="{{ route('dashboard.uploads.index') . '?page=' . $active_page . '&order_by=created_at&order_type=desc' }}">Дата
                загрузки
                <span class="material-icons-outlined titles__icon titles__icon--active">arrow_upward</span>
            </a>
            @elseif($order_by == "created_at" && $order_type == "desc")
            <a class="titles__link"
                href="{{ route('dashboard.uploads.index') . '?page=' . $active_page . '&order_by=created_at&order_type=asc' }}">Дата
                загрузки
                <span class="material-icons-outlined titles__icon titles__icon--active">arrow_downward</span>
            </a>
            @endif
        </div>

        <div class="titles__item width-33">Скачать файл</div>


        <div class="titles__item width-33">
            @if($order_by != "new")
            <a class="titles__link"
                href="{{ route('dashboard.uploads.index') . '?page=' . $active_page . '&order_by=new&order_type=desc' }}">Статус
                <span class="material-icons-outlined titles__icon">arrow_downward</span>
            </a>
            @elseif($order_by == "new" && $order_type == "asc")
            <a class="titles__link"
                href="{{ route('dashboard.uploads.index') . '?page=' . $active_page . '&order_by=new&order_type=desc' }}">Статус
                <span class="material-icons-outlined titles__icon titles__icon--active">arrow_upward</span>
            </a>
            @elseif($order_by == "new" && $order_type == "desc")
            <a class="titles__link"
                href="{{ route('dashboard.uploads.index') . '?page=' . $active_page . '&order_by=new&order_type=asc' }}">Статус
                <span class="material-icons-outlined titles__icon titles__icon--active">arrow_downward</span>
            </a>
            @endif
        </div>

        <div class="titles__controls">Действия</div>
    </div> {{-- Titles end --}}

    {{-- Multiple Items form start --}}
    <form action="{{ route('uploads.remove_multiple') }}" method="POST" id="multiple_items_form">
        @csrf
        @foreach ($uploads as $upload)
        {{-- List Item start --}}
        <div class="list__item">
            {{-- checkboxes for multiple remove --}}
            <div class="checkbox">
                <label for="{{$upload->id}}" class="checkbox__label">
                    <input class="checkbox__input" id="{{$upload->id}}" type="checkbox" name="ids[]"
                        value="{{$upload->id}}">
                    <span class="checkbox__checkmark"></span>
                </label>
            </div>

            <div class="list__item-div width-33">{{$upload->name}}</div>
            <div class="list__item-div width-33">
                <button type="button" class="transparent-button" onclick="download_uploaded_cv({{$upload->id}})">
                    <i class="fa fa-download"></i> Скачать файл</button>
            </div>
            <div class="list__item-div width-33">{!!$upload->new ? "<span class='new'>НОВЫЙ</span>" : "Просмотрено"!!}</div>


            {{-- Item Controls start --}}
            <div class="list__item-controls">
                <button class="control-button control-button--red" type="button" data-action="show_single_remove_modal"
                    data-item-id="{{$upload->id}}" data-bs-toggle="tooltip" data-bs-placement="bottom"
                    title="Удалить"><span class="material-icons">delete</span></button>
            </div> {{-- Item Controls start --}}
        </div> {{-- List Item start --}}
        @endforeach
    </form> {{-- Multiple Items form end --}}

    {{$uploads->links()}}
</section> {{-- Main list end --}}


<!-- Remove Multiple Items Modal Start-->
<div class="modal fade" id="remove_multiple_modal" tabindex="-1" aria-labelledby="remove_multiple_modal_label"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="remove_multiple_modal_label">Удалить</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Вы уверены что хотите удалить отмеченные файлы ?<br><br>
            </div>
            <div class="modal-footer">
                <button type="button" class="button" data-bs-dismiss="modal">Отмена</button>
                <button type="button" class="button button--danger" id="remove_multiple_modal_button">Удалить</button>
            </div>
        </div>
    </div>
</div>
<!-- Rmove Multiple Items Modal End-->


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
                Вы уверены что хотите удалить файл ?
            </div>
            <div class="modal-footer">
                <button type="button" class="button" data-bs-dismiss="modal">Отмена</button>
                <form action="{{ route('uploads.remove') }}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" value="0" name="id" id="remove_single_modal_input" />
                    <button type="submit" class="button button--danger" id="remove_single_modal_button">Удалить</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Remove Single Items Modal End-->


{{-- Download files form --}}
<form method="POST" class="d-none" id="download_uploaded_cv" action="{{ route('uploads.download') }}">
    {{ csrf_field() }}
    <input type="hidden" name="id" value="0" id="download_file_id" />
</form>
{{-- Download files form --}}

@endsection