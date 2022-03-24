@extends('components.layout')

@section('stylesheet')
    <link rel="stylesheet" href="{{ asset('/css/login.css') }}">
@endsection
@section('content')

    <div class="background">
        <div class="blur"></div>
    </div>

    <section class="principal-section">
        <div class="user-circle">
            <i class="fa-solid fa-user"></i>
        </div>

        <form method="post">
            @csrf
            <div class="input input-name">
                <div class="input-icon">
                    <i class="fa-solid fa-user"></i>
                </div>
                <input type="text" name="name" id="name" placeholder="Name">
            </div>

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
            <button type="submit" class="login-btn">REGISTER</button>
        </form>



    </section>

@endsection
