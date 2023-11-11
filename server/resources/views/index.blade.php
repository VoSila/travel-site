@extends('layouts.app')

@section('title')
    Главная&nbspстраница
@endsection

@section('content')
    <div class="main">
        @include('inc.messages')
        <div class="container">
            <h1>Экскурсии&nbspпо&nbspМинску</h1>
            <h3>Множество&nbspэкскурсии&nbspс&nbspопытными&nbspгидами&nbspпо&nbspгороду&nbspминску,&nbspбронируйте&nbspу&nbspнас&nbspна&nbspсайте</h3>
        </div>
        <div class="slider">
            @foreach($data as $tour)
                @if($tour->best == 1)
                    <div class="slider_item">
                        @if($tour->image == null)
                        <img data-lazy="{{ asset('images/image-not-found.png') }}">
                        @else
                            <img data-lazy="{{$tour->image}}">
                        @endif
                        <div class="slider_body">
                            <div class="preview">
                                <h3>{{$tour->preview}}</h3>
                            </div>
                            <div class="head">
                                <div class="price">
                                    <p>От&nbsp{{$tour->price}}&nbspBYN</p>
                                </div>
                                <div class="date">
                                    <p>{{$tour->date}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        <div class="top-panel">
            <div class="buttons" id="buttons">
                <div class="btn button-date {{$classDate}}">
                    <a href="{{route('sort', ['orderBy' => 'date-new'])}}">Сначала&nbspновые</a>
                </div>
                <div class="btn button-price {{$classPrice}}">
                    <a href="{{route('sort', ['orderBy' => 'price-low'])}}">Сначала&nbspдешевые</a>
                </div>
            </div>
        </div>
        <div class="main-panel">
            @foreach($data as $tour)
                <div class="posts">
                    <div class="image">
                        <a href="{{ route('tours',['id' => $tour->id])}}">
                            @if($tour->image == null)
                                <img src="{{ asset('images/image-not-found.png')}}">
                            @else
                                <img src="{{ $tour->image}}">
                            @endif
                        </a>
                    </div>
                    <div class="post_main">
                        <div class="title">
                            <h1>{{$tour->title}}</h1>
                        </div>
                        <div class="preview">
                            <h2>{{$tour->preview}}</h2>
                        </div>
                        <div class="footer_tour">
                            <div class="price">
                                <h2> От&nbsp{{$tour->price}}&nbspBYN </h2>
                            </div>
                            <div class="button_tour">
                                <a>Подробно&nbspо&nbspтуре</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        var header = document.getElementById("buttons");
        var btns = header.getElementsByClassName("btn");
        for (var i = 0; i < btns.length; i++) {
            btns[i].addEventListener("click", function() {
                var current = document.getElementsByClassName("active");
                current[0].className = current[0].className.replace(" active", "");
                this.className += " active";
            });
        }
    </script>
@endsection
