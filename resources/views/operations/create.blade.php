@extends('components.layout')

@section('stylesheet')
    <link rel="stylesheet" href="{{ asset('css/operations.css') }}">
@endsection

@section('content')

<main>
    <section>
        <h2>{{ $title }}</h2>
        <form action="{{ $actionUrl }}" method="post">
            @csrf
            <div>
                <label for="description">Description:</label>
                <input type="text" name="description" id="description" required>
            </div>
            <div>
                <label for="amount">Amount:</label>
                <input type="number" name="amount" id="amount" required>
            </div>
            <button>Add Income</button>
        </form>
    </section>
</main>
@endsection
