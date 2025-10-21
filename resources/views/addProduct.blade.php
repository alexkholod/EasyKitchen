@extends('main-layout')
@section('title')
Добавить продукт | EasyKitchen
@endsection

@section('navbar-title')
Добавить продукт
@endsection

@section('main-content')
<div class="ios-card">
    @if($errors->any())
    <div class="ios-alert ios-alert-danger">
        <div class="ios-text-medium ios-mb-1">Ошибки в форме:</div>
        <ul style="margin: 0; padding-left: 20px;">
            @foreach($errors->all() as $error)
            <li class="ios-text-small">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('added') }}" method="post">
        @csrf

        <div class="ios-form-group">
            <label for="name" class="ios-label">Что кладём</label>
            <input type="text" id="name" name="name" class="ios-input" placeholder="Название продукта" required>
        </div>

        <div class="ios-form-group">
            <label for="storages" class="ios-label">Куда</label>
            <select id="storages" name="storages" class="ios-select" required>
                <option value="">Выберите отдел</option>
                @foreach($storages as $id => $name)
                <option value="{{ $id }}">{{ $name }}</option>
                @endforeach
            </select>
        </div>

        <div class="ios-form-group">
            <label for="description" class="ios-label">Сколько</label>
            <input type="text" id="description" name="description" class="ios-input" placeholder="Количество или описание">
        </div>

        <div class="ios-form-group">
            <label for="expired_at" class="ios-label">Срок годности (не обязательно)</label>
            <input type="date" id="expired_at" name="expired_at" class="ios-input">
        </div>

        <div class="ios-form-group">
            <button type="submit" class="ios-button">
                <svg style="width: 20px; height: 20px; margin-right: 8px; vertical-align: middle;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z" />
                    <polyline points="17,21 17,13 7,13 7,21" />
                    <polyline points="7,3 7,8 15,8" />
                </svg>
                Сохранить
            </button>
        </div>
    </form>
</div>
@endsection