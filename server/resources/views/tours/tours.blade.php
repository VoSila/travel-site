@extends('layouts.app')

@section('title')
    Профиль
@endsection

@section('content')
    <div class="container">
        <div class="head">
            <h1>{{ $data->title }}</h1>
        </div>
        <div class="main">
            <div class="center">
                <div class="image_tours">
                    @if($data->image == null)
                        <img src="{{ asset('images/image-not-found.png')}}">
                    @else
                        <img src="{{ $data->image }}">
                    @endif
                </div>
                <div class="anchor_panel">
                    <a href="#reviews">Отзывы</a>
                    <a href="#info">Информация</a>
                    <a href="#">Google3</a>
                </div>
                <div id="info" class="body_card">
                    <div class="preview">
                        <h3>{{ $data->preview }}</h3>
                    </div>
                    <div class="description">
                        <p>{{ $data->description }}</p>
                    </div>
                    <div class="information">
                        <div class="price">
                            <h4>Цена от {{ $data->price }} BYN</h4>
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
                                    <p>Продолжительность (час)</p>
                                </div>
                                <div class="meaning">
                                    <p>{{ $data->time }}</p>
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
                            <h>
                                В стоимость включено:
                            </h>
                            <ul>
                                <li>услуги аттестованного экскурсовода на русском языке;</li>
                                <li>экскурсионное обслуживание по программе;</li>
                                <li>транспортные услуги из г. Минска;</li>
                                <li>входные билеты;</li>
                            </ul>
                        </div>
                    </div>
                </div>
                @if($data->coordinates != null)
                    <div style="display: none" class="coordinates">{{$data->coordinates}}</div>
                    <div id="map" class="map">
                        <script
                            src="https://api-maps.yandex.ru/2.1/?apikey=96dc9638-77fa-4c5b-8b47-4dafa51bf669&lang=ru_RU">
                        </script>
                        <script src="{{ asset('js/yandexAPI.js') }}"></script>
                    </div>
                @endif
            </div>
            <div class="side_tours">
                <div class="rating">
                    <div class="rating_body">
                        <div class="rating_active"></div>
                        <div class="rating_items">
                            <input type="radio" class="rating_item" value="1" name="rating">
                            <input type="radio" class="rating_item" value="2" name="rating">
                            <input type="radio" class="rating_item" value="3" name="rating">
                            <input type="radio" class="rating_item" value="4" name="rating">
                            <input type="radio" class="rating_item" value="5" name="rating">
                        </div>
                    </div>
                    <div class="rating_value">{{$overallRating}}</div>
                </div>
                <div style="margin-top: 20px" class="booking">
                    <form id="form" method="post">
                        @csrf
                        <div class="places_block">
{{--                            <label class="places">Осталось {{$data->places}} мест</label>--}}
{{--                            <h4 style="margin-bottom: 10px;">Забронировать места</h4>--}}
                            <div  class="booking_block">
                                <div class="booking_date">
                                    <div class="booking_date_button">
                                        <p>15 апреля</p>
                                    </div>
                                    <div class="booking_date_button">
                                        <p>16 апреля</p>
                                    </div>
                                    <div class="booking_date_button">
                                        <p>17 апреля</p>
                                    </div>
                                    <div class="booking_date_button">
                                        <p>выбрать дату</p>
                                    </div>
                                </div>
                                <div class="ticket">
                                    <div class="ticket_place">
                                        <p>Взрослый</p>
                                    </div>
                                    <div class="ticket_price">
                                        <p>{{$data->price}} BYN</p>
                                    </div>
                                    <div class="count_block">
                                        <div id="decrementButton" class="ticket_button">-</div>
                                        <div class="quantity">0</div>
                                        <div id="incrementButton" class="ticket_button">+</div>
                                    </div>
                                    <div class="ticket_sum">
                                        <p>0 BYN</p>
                                    </div>
                                </div>
                                <div class="ticket">
                                    <div class="ticket_place">
                                        <p>Детский</p>
                                    </div>
                                    <div class="child_ticket_price">
                                        <p>{{$data->price}} BYN</p>
                                    </div>
                                    <div class="count_block">
                                        <div id="childDecrementButton" class="ticket_button">-</div>
                                        <div class="child_quantity">0</div>
                                        <div id="childIncrementButton" class="ticket_button">+</div>
                                    </div>
                                    <div class="child_ticket_sum">
                                        <p>0 BYN</p>
                                    </div>
                                </div>
                                <!-- Элемент для отображения сообщения об успешном бронировании -->
                                <div class="success-message" style="display: none;"></div>

                                <!-- Элемент для отображения сообщения об ошибке бронирования -->
                                <div class="error-message" style="display: none;"></div>
                                <button class="personal-data__submit" type="submit">Начать бронирование</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="review_title">
                <h2>Отзывы</h2>
            </div>
            <div class="review_form">
                @include('inc.messages')
                <form action="{{route('checking.reviews',['tour_id' => $data->id])}}" method="post">
                    @csrf
                    <div class="rating-area">
                        <input type="radio" id="star-5" name="rating" value="5">
                        <label for="star-5" title="Оценка «5»"></label>
                        <input type="radio" id="star-4" name="rating" value="4">
                        <label for="star-4" title="Оценка «4»"></label>
                        <input type="radio" id="star-3" name="rating" value="3">
                        <label for="star-3" title="Оценка «3»"></label>
                        <input type="radio" id="star-2" name="rating" value="2">
                        <label for="star-2" title="Оценка «2»"></label>
                        <input type="radio" id="star-1" name="rating" value="1">
                        <label for="star-1" title="Оценка «1»"></label>
                    </div>
                    <div class="review_text">
                        <label>Отзыв:</label>
                        <input type="text" name="text">
                    </div>
                    <button class="personal-data__submit" type="submit">Отправить отзыв</button>
                </form>
            </div>
            <div id="reviews" class="reviews">
                @foreach($reviews as $review)
                    <div class="review_block">
                        <div class="rating reviews">
                            <div class="rating_body">
                                <div class="rating_active"></div>
                                <div class="rating_items">
                                    <input type="radio" class="rating_item" value="1" name="rating">
                                    <input type="radio" class="rating_item" value="2" name="rating">
                                    <input type="radio" class="rating_item" value="3" name="rating">
                                    <input type="radio" class="rating_item" value="4" name="rating">
                                    <input type="radio" class="rating_item" value="5" name="rating">
                                </div>
                            </div>
                            <div class="rating_value">{{$review -> rating}}</div>
                        </div>
                        <div class="name_user">
                            <h4>{{$review -> name}}</h4>
                        </div>

                        <div class="text_review">
                            <p>{{$review -> text}}</p>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <script src="{{ asset('js/rating.js') }}"></script>
    <script src="{{ asset('js/booking_tour.js') }}"></script>

@endsection
