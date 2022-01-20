@extends('main-layout')
@section('title')
    Easy Kitchen App
@endsection

@section('main-content')
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #0095B6;">
        <div class="navbar-brand">Easy Kitchen App</div>
        <div class="navbar-text">Продукты под контролем :)</div>
    </nav>
    <div class="container">
        <div class="row justify-content-center mt-3 mb-auto">
            <div class="col-12 mb-1">
                <form action="{{ route('storage', 1 )}}" method="get">
                    @csrf
                        {{ Form::submit('Верхний отдел', ['class' => 'btn btn-info col-12 m-auto', 'id' => 1]) }}
                </form>
            </div>
            <div class="col-12 mb-1">
                <form action="{{ route('storage', 2 )}}" method="get">
                    @csrf
                    {{ Form::submit('Нижний отдел', ['class' => 'btn btn-info col-12 m-auto', 'id' => 2]) }}
                </form>
            </div>
            <div class="col-12 mb-1">
                <form action="{{ route('storage', 3 )}}" method="get">
                    @csrf
                    {{ Form::submit('Дверца', ['class' => 'btn btn-info col-12 m-auto', 'id' => 3]) }}
                </form>
            </div>
            <div class="col-12 mb-1">
                <form action="{{ route('storage', 4 )}}" method="get">
                    @csrf
                    {{ Form::submit('Холодильник', ['class' => 'btn btn-info col-12 m-auto', 'id' => 4]) }}
                </form>
            </div>
        </div>

        <div class="row mt-4">
            <a class="btn btn-primary m-auto" href="{{ route('add-product') }}">
                Положить что-нибудь
            </a>
        </div>

        <div class="row mt-4">
            @if ($expiredProducts->isEmpty())
                <div class="col-11 alert alert-info mr-auto ml-auto">
                    <p>Просрочки нет</p>
                    <div class="ml-auto"><b>Всё свеженькое. Так держать!</b></div>
                </div>
            @else
                <div class="col-11 alert alert-danger mr-auto ml-auto">
                @foreach($expiredProducts as $element)
                    <p>Просрочка</p>
                    <div>
                        <a href="{{ route('single', $element->id) }}">
                            <div class="ml-auto"><b>{{ $element->name }}</b></div>
                        </a>
                    </div>
                @endforeach
                </div>
            @endif

            @if ($expiredSoon->isEmpty())
                <div class="col-11 alert alert-info mr-auto ml-auto">
                    <p>Сроки годности не истекают</p>
                    <div class="ml-auto"><b>Всё в порядке. Ну или совсем есть нечего :)</b></div>
                </div>
            @else
                <div class="col-11 alert alert-secondary mr-auto ml-auto">
                @foreach($expiredSoon as $element)
                    <p>Съесть в ближайшие 3 дня</p>
                    <div>
                        <a href="{{ route('single', $element->id) }}">
                            <div class=" ml-auto"><b>{{ $element->name }}</b></div>
                        </a>
                    </div>
                @endforeach
                </div>
            @endif

            @if ($longTimeAgo->isEmpty())
                <div class="col-11 alert alert-info mr-auto ml-auto">
                    <p>Залежалых продуктов не найдено</p>
                    <div class="ml-auto"><b>Вы не храните ничего зря</b></div>
                </div>
            @else
                <div class="col-11 alert alert-warning mr-auto ml-auto">
                @foreach($longTimeAgo as $element)
                    <p>Давно пора бы съесть</p>
                    <div>
                        <a href="{{ route('single', $element->id) }}">
                            <div class="ml-auto"><b>{{ $element->name }}</b></div>
                        </a>
                    </div>
                @endforeach
                </div>
            @endif
        </div>
    </div>
@endsection
