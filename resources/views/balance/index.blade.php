@extends('components.layout')
@section('stylesheet')
    <link rel="stylesheet" href="{{ asset('/css/balance.css') }}">
@endsection

@section('content')

    @if(count($incomes) + count($expenses) > 0)
        <header class="
            @if($balance > 0)
                positive-balance
            @else
                negative-balance
            @endif">
            Your balance is {{ $balance }}
        </header>
    @endif

    <main>
        <section class="incomes-section">
            <div class="incomes-icon">
                <i class="fa-solid fa-hand-holding-dollar"></i>
            </div>

            <div>
{{--                <h3>Incomes</h3>--}}
                <button>
                    <a href="/incomes/create"><i class="fa-solid fa-plus"></i></a>
                </button>
            </div>

            <div class="amounts-content">
                @foreach($incomes as $income)
                    <div>
                        <p>{{ $income['description'] }}</p><strong>{{ $income['amount'] }}</strong>
                    </div>
                @endforeach
            </div>
        </section>

        <section class="expenses-section">
            <div class="expenses-icon">
                <i class="fa-solid fa-money-bill-transfer"></i>
            </div>

            <div>
{{--                <h3>Expenses</h3>--}}
                <button>
                    <a href="/expenses/create"><i class="fa-solid fa-plus"></i></a>
                </button>
            </div>

            <div class="amounts-content">
                @foreach($expenses as $expense)
                    <div>
                        <p>{{ $expense['description'] }}</p><strong>{{ $expense['amount'] }}</strong>
                    </div>
                @endforeach
            </div>
        </section>
    </main>

@endsection
