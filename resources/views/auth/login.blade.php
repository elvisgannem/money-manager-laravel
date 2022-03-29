@extends('components.layout')

@section('stylesheet')
    <link rel="stylesheet" href="{{ asset('/css/login.css') }}">
@endsection
@section('content')

    <section class="principal-section animate__animated animate__fadeInDown">
        <div class="user-circle">
            <i class="fa-solid fa-user"></i>
        </div>

        <form method="post">
            @csrf
            <div class="input input-email">
                <div class="input-icon">
                    <i class="fa-solid fa-user-check"></i>
                </div>
                <input type="email" name="email" id="email" placeholder="Email">
            </div>

            <div class="input input-password">
                <div class="input-icon">
                    <i class="fa-solid fa-lock"></i>
                </div>
                <input type="password" name="password" id="password" placeholder="Password">
            </div>
            <button type="submit" class="login-btn">LOGIN</button>
            <a href="/register"><p class="create-account">or create an account</p></a>
        </form>
    </section>

@endsection
