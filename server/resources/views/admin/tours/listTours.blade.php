@extends('layouts.admin')

@section('title')
    Экскурсии
@endsection

@section('content')
    <div class="admin_content">
        @include('inc.messages')
        <div class="list">
            @foreach($data as $tour)
                <div class="admin_list_item">
                    <div class="list_title">
                        <a href="{{ route('tours',['id' => $tour->id])}}">
                            <p>{{ $tour->title }}</p>
                        </a>
                        @if($tour->best == 1)
                        <a href="{{route('admin.tour.removeFromBest',['id' => $tour->id])}}">
                            <div class="button_best" title="Убрать из категории 'Лучшие'">
                            </div>
                        </a>
                        @else
                            <a href="{{route('admin.tour.addToBest',['id' => $tour->id])}}">
                                <div class="button_true" title="Добавить в категорию 'Лучшие' ">
                                </div>
                            </a>
                        @endif
                    </div>
                    <div class="buttons">
                        <a href="{{route('admin.tour.edit',['id' => $tour->id])}}">
                            <div class="button_create">
                                Редактировать
                            </div>
                        </a>
                        <a href="{{route('admin.tour.delete',['id' => $tour->id])}}">
                            <div class="button_delete">
                                Удалить
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        {{$data->links()}}
    </div>
@endsection

