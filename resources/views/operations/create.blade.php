@extends('components.layout')

@section('stylesheet')
    <link rel="stylesheet" href="{{ asset('css/operations.css') }}">
@endsection

@section('content')

<main class="animate__animated animate__fadeIn">
    <section>
        <form action="{{ $actionUrl }}" method="post">
            @csrf
            <div class="form__div">
                <i class="fa-solid fa-comment-dots"></i>
                <input type="text" name="description" id="description" required placeholder="Description">
            </div>

            <div class="form__div">
                <i class="fa-solid fa-money-bill"></i>
                <input type="number" name="amount" id="amount" required placeholder="Amount">
            </div>
            <button>{{ $title }}</button>
        </form>
    </section>
</main>
@endsection
