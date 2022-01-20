@extends('main-layout')
@section('title')
    Product | Easy Kitchen App
@endsection

@section('main-content')
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #0095B6;">
        <div class="navbar-brand">Easy Kitchen App | {{ $product->name }}</div>
        <div class="navbar-text">Продукты под контролем :)</div>
    </nav>
    <div class="container">
        <p><i>Возможность редактирования продуктов появится в следующей версии. А пока что можно удалить неверную запись
                и добавить снова</i></p>
        <div class="alert alert-info mt-3">
            <div>Продукт: <b>{{ $product->name }}</b></div>
            <div>Количество: {{ $product->description }}</div>
            <div>Положили: {{ $product->created_at->format('d.m.Y') }}</div>
            @if($product->expired_at == null)
                <div>Годен до: нет срока годности</div>
            @else
                <div>Годен до: {{ \Carbon\Carbon::parse($product->expired_at)->format('d.m.Y') }}</div>
            @endif
        </div>
        <div class="row col-12">
            <div class="col-4">
                <a class="btn btn-primary btn-sm" href="{{ route('storage', $product->storage_id) }}">Вернуться</a>
            </div>

            <div class="form-group col-4">
                {{ Form::submit('Изменить', ['class' => 'btn btn-secondary btn-sm', 'disabled' => 'disabled']) }}
            </div>

            <div class="form-group col-4">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }} </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('deleted', $id) }}" method="post">
                    @csrf
                    {{ Form::submit('Удалить', ['class' => 'btn btn-danger btn-sm']) }}
                </form>
            </div>
        </div>
        <div class="alert alert-secondary mt-3">
            <div>Переложить</div>
            <div><p><i>А тут можно будет быстро переложить продукт в другой отдел</i></p></div>

        </div>
    </div>
@endsection

