@extends('layouts.admin')

@section('title')
    Добавление экскурсии
@endsection

@section('content')
    <div class="admin_content">
       @include('inc.messages')
        <form action="{{ route('admin.tour.created') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="head">
                <div class="form_group">
                    <input value="" type="text" name="title" placeholder=" ">
                    <label class="placeholder">Название</label>
                </div>
            </div>
            <div class="main">
                <div class="center">
                    <div class="image_tours">
                        <div class="form_group">
                            <label class="label">Изображение</label>
                            <input type="file" name="img">
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
                                <input type="text" name="preview" placeholder=" ">
                                <label class="placeholder">Превью</label>
                            </div>
                        </div>
                        <div class="description">
                            <div class="form_group">
                                <textarea name="description" placeholder=" "></textarea>
                                <label class="placeholder">Описание</label>
                            </div>
                        </div>
                        <div class="information">
                            <div class="price">
                                <div class="form_group">
                                    <label class="label">Цена</label>
                                    <input type="number" name="price">
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
                                            <input type="time" name="time">
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
                        <div class="create_map">
                            <div  class="button">
                                <a href="https://yandex.ru/map-constructor/location-tool/" title="Скопируйте значения 'центр' в строку ниже" target="_blank">Выбрать точку сбора</a>
                            </div>
                            <div  class="form_group">
                                <input type="text" name="coordinates" placeholder=" ">
                                <label class="placeholder">Координаты точки</label>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="side_tours">
                    <div class="form_group">
                        <label class="label">Дата</label>
                        <input type="date" name="date">
                    </div>
                </div>
            </div>
            <div>
                <input type="submit" value="Добавить">
            </div>
        </form>
    </div>

    <script src="{{asset('js/script.js')}}"></script>
@endsection
