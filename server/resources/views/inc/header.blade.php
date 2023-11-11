<header>
    <nav class="nav-container">
        <a class="logo" href="{{route('index')}}">
            <img src="{{asset('images/logo.png')}}">
        </a>
        <ul id="menu">
            @php
                $name = session('username');
            @endphp
            @auth()
                <li><h2>Вы в системе: {{ $name }}</h2></li>
                <li><a href="#">Корзина</a></li>
                <li><a href="{{route('profile')}}">Профиль</a></li>
                <li><a href="{{route('logout')}}">Выход</a>
            @endauth
            @guest()
                <li><a href="{{route('register')}}">Зарегистрироваться</a>
                <li><a href="{{route('login')}}">Войти</a></li>
            @endguest
        </ul>
    </nav>
</header>

