@extends('layouts.admin')

@section('title')
    Проверка отзывов
@endsection

@section('content')
    <div class="admin_content">
        @include('inc.messages')
        <table class="table">
            <thead>
            <tr>
                <th>Статус</th>
                <th>Название тура</th>
                <th>Имя пользователя</th>
                <th>Оценка</th>
                <th>Описание</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $review)
                <tr>
                    @if($review->status == 0)
                        <td><a href="{{route('admin.reviews.status',['review_id' => $review->review_id])}}"><div class="not_verified"></div></a></td>
                    @else
                        <td><div class="verified"></div></td>
                    @endif
                    <td>{{$review->title}}</td>
                    <td>{{$review->name}}</td>
                    <td>{{$review->rating}}</td>
                    <td><{{$review->text}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$data->links()}}
    </div>
@endsection

