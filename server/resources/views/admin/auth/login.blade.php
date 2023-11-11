<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <title>Авторизация</title>
</head>
<body>
<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')"/>

    <form class="modal-content" method="POST" action="{{ route('admin.login_process') }}">
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
    </form>
</x-guest-layout>
</body>
</html>

