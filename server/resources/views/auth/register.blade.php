<x-guest-layout>
    <form class="modal-content" method="POST" action="{{ route('register') }}">
        @csrf
{{--        @include('inc.messages')--}}
        <div class="container-register">
            <div class="title-block">
                <h2>Регистрация</h2>
            </div>
            <div class="form-group-register">
                <input type="text" name="name" placeholder="Логин" id="name" class="form-control-register">
                <input type="text" name="email" placeholder="E-mail" id="email" class="form-control-register">
                <input type="password" name="password" placeholder="Пароль" id="password" class="form-control-register">
                <input type="password" name="password_confirmation" placeholder="Повторите пароль"
                       id="password_confirmation" class="form-control-register">
            </div>
            <button type="submit" class="button-login">Регистрация</button>
        </div>
        <div class="text-center">
            <span class="txt1">Уже есть аккаунт?</span>
            <a href="/login" class="txt2 hov1">Войти</a>
        </div>
    </form>
</x-guest-layout>
