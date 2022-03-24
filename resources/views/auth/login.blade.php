@extends('components.layout')

@section('stylesheet')
    <link rel="stylesheet" href="{{ asset('/css/login.css') }}">
@endsection
@section('content')

    <main>
        <section>
            <h4>Login</h4>
            <form method="post">
                @csrf
                <div>
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email">
                </div>

                <div>
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password">
                </div>

                <button type="submit">Login</button>
                <a href="/register">or create an account</a>

            </form>
        </section>

    </main>
@endsection
