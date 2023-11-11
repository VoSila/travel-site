@extends('layouts.admin')

@section('title')
    Редактирование экскурсии
@endsection

@section('content')
    <div class="admin_content">
        @include('inc.messages')
        <form action="{{ route('admin.tour.update',['id' => $data->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="head">
                <div class="form_group">
                    <input value="{{$data->title}}" type="text" name="title" placeholder=" ">
                    <label class="placeholder">Название</label>
                </div>
            </div>
            <div class="main">
                <div class="center">
                    <div class="image_tours">
                        <img src="{{ asset('storage') }}/{{$data->image}}">
                        <div class="form_group">
                            <label class="label">Изображение</label>
                            <input value="{{$data->image}}" type="file" name="img">
                        </div>
                    </div>
                    <div class="anchor_panel">
                        <a href="#reviews">Отзывы</a>
                        <a href="#info">Информация</a>
                        <a href="#">Google3</a>
                    </div>
                    <div id="info" class="body_card">
                        <div class="preview">
                            <div class="form_group">
                                <input value="{{$data->preview}}" type="text" name="preview" placeholder=" ">
                                <label class="placeholder">Превью</label>
                            </div>
                        </div>
                        <div class="description">
                            <div class="form_group">
                                <textarea name="description" placeholder=" ">{{$data->description}}</textarea>
                                <label class="placeholder">Описание</label>
                            </div>
                        </div>
                        <div class="information">
                            <div class="price">
                                <div class="form_group">
                                    <label class="label">Цена</label>
                                    <input value="{{$data->price}}" type="number" name="price">
                                </div>
                            </div>
                            <div class="board">
                                <div class="board_item">
                                    <div class="name_item">
                                        <p>Тип экскурсии</p>
                                    </div>
                                    <div class="meaning">
                                        <p>Пешая</p>
                                    </div>
                                </div>
                                <div class="board_item">
                                    <div class="name_item">
                                        <p>Продолжительность (мин)</p>
                                    </div>
                                    <div class="meaning">
                                        <div class="form_group">
                                            <input value="{{$data->time}}" type="time" name="time">
                                        </div>
                                    </div>
                                </div>
                                <div class="board_item">
                                    <div class="name_item">
                                        <p>Питание</p>
                                    </div>
                                    <div class="meaning">
                                        <p>Не предоставляется</p>
                                    </div>
                                </div>
                            </div>
                            <div class="payment">
                                <h3>
                                    В стоимость включено:
                                </h3>
                                <ul>
                                    <li>услуги аттестованного экскурсовода на русском языке;</li>
                                    <li>экскурсионное обслуживание по программе;</li>
                                    <li>транспортные услуги из г.Минска;</li>
                                    <li>входные билеты;</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div id="map" class="map">
                        {{--                        <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>--}}
                    </div>
                </div>
                <div class="side_tours">
                    <div class="form_group">
                        <label class="label">Дата</label>
                        <input value="{{$data->date}}" type="date" name="date">
                    </div>
                </div>
            </div>
            <div>
                <input type="submit" value="Редактировать">
            </div>
        </form>
    </div>

    <script src="{{asset('js/script.js')}}"></script>
@endsection
