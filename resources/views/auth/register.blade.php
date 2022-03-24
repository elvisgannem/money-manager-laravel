@extends('components.layout')

@section('stylesheet')
    <link rel="stylesheet" href="{{ asset('/css/login.css') }}">
@endsection
@section('content')
    <main>
        <section>
            <h4>Register</h4>
            <form method="post">
                @csrf
                <div>
                    <label for="name">Name:</label>
                    <input type="name" name="name" id="name">
                </div>

                <div>
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email">
                </div>

                <div>
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password">
                </div>

                <button type="submit">Create</button>

            </form>
        </section>

    </main>
@endsection
