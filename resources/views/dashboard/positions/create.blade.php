@extends('dashboard.templates.master')
@section("main")

<form class="main-form" id="create_form" action="{{ route('positions.store') }}" method="POST"
    enctype="multipart/form-data">
    {{ csrf_field() }}

    <div class="form-group">
        <label class="label">Название <span class="required">*</span></label>
        <input class="input" name="name" type="text" value="{{ old('name') }}" required>
    </div>

    <div class="main-form__controls">
        <button class="button button--iconed button--success main-form__controls-button" type="submit"><span
                class="material-icons-outlined">
                done_all
            </span> Добавить</button>
    </div>

</form>

@endsection