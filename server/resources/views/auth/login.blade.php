<x-guest-layout>

    <form class="modal-content" method="POST" action="{{ route('login') }}">
        @csrf
        @include('inc.messages')
        <div class="container-register">
            <div class="title-block">
                <h2>Авторизация</h2>
            </div>
            <div class="form-group-register">
                <input type="text" name="email" placeholder="E-mail" id="email" class="form-control-register">
                <input type="password" name="password" placeholder="Пароль" id="password" class="form-control-register">
            </div>
        </div>
        <button type="submit" class="button-login">Войти</button>
        <div class="text-center">
            <a href="{{ route('register') }}">
                {{ __('Регистрация') }}
            </a>
        </div>
    </form>
</x-guest-layout>
