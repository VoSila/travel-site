@extends('layouts.app')

@section('title')
    Профиль
@endsection

@section('content')
    <div class="profile">
        @include('inc.messages')
        <div class="profile_block">
            <div class="profile_image">
                <div class="author_photo">
                    @if($data->image == null)
                        <img src="{{ asset('images/profile/not_found_avatar.png') }}">
                    @else
                        <img src="storage/{{$data->image}}">
                    @endif
                </div>
            </div>
            <div class="personal-data__popup">
                <form action="{{route('edit.profile')}}" class="personal-data__form" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="dropbtn">
                        <label class="author_avatar">
                            <img src="{{ asset('images/profile/camera.png') }}">
                            <input name="img" type="file" hidden>
                        </label>
                        <div class="author_avatar_photo">
                            @if($data->image == null)
                                <img src="{{ asset('images/profile/not_found_avatar.png') }}">
                            @else
                                <img src="storage/{{$data->image}}">
                            @endif
                        </div>
                        <label class="author_avatar">
                            <i class="fas fa-trash-alt"></i>
                            <input hidden name="delete" class="delete">
                        </label>
                    </div>

                    <label class="personal-data__label">Имя</label>
                    <input class="personal-data__input" type="text" name="name" value="{{$data->name}}"><br>

                    <label class="personal-data__label">Фамилия</label>
                    <input class="personal-data__input" type="text" name="surname" value="{{$data->surname}}"><br>

                    <label class="personal-data__label">Город</label>
                    <input class="personal-data__input" type="text" name="city" value="{{$data->city}}"><br>

                    <label class="personal-data__label">E-mail</label>
                    <input class="personal-data__input" type="email" name="email" value="{{$data->email}}"><br>

                    <button class="personal-data__submit" type="submit">Сохранить</button>
                </form>
            </div>
            <div class="profile_description">
                <div class="personal-data">
                    <button type="submit" class="personal-data__button">
                        <img src="{{ asset('images/profile/edit.png') }}">
                    </button>
                </div>
            </div>
            <table class="table">
                <thead>
                <tr>
                    <th>Название тура</th>
                    <th>Количество мест</th>
                    <th>Когда</th>
                    <th>Отменить</th>
                </tr>
                </thead>
                <tbody>
                @foreach($bookings as $booking)
                    <tr>
                        {{--                        @if($review->status == 0)--}}
                        {{--                            <td><a href="{{route('admin.reviews.status',['review_id' => $review->review_id])}}"><div class="not_verified"></div></a></td>--}}
                        {{--                        @else--}}
                        {{--                            <td><div class="verified"></div></td>--}}
                        {{--                        @endif--}}
                        <td>{{$booking->title}}</td>
                        <td>{{$booking->places}}</td>
                        <td>{{$booking->date}}</td>
                        <td><a href="{{route('cancel.booking',['id' => $booking->id, 'tour_id' => $booking->tour_id])}}">
                                <div class="not_verified"></div>
                            </a></td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        $(document).on("click", function (event) {
            if (!$(event.target).closest(".personal-data__popup").length) {
                $(".personal-data__popup").css("display", "none");
            }
        });

        $(".personal-data__button").click(function (event) {
            event.stopPropagation();
            $(".personal-data__popup").css("display", "block");
        });

        const deleteInput = document.querySelector('input[name="delete"]');

        deleteInput.addEventListener('click', () => {
            deleteInput.value = 'true';
        });

        document.querySelector('.delete').onclick = function () {
            var result = confirm('Вы действительно хотите удалить аватарку ?');
            if (result !== null) {
                console.log('fff')
                deleteInput.value = 'true';
            }
        };
    </script>
@endsection
