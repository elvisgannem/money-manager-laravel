@extends('components.layout')
@section('stylesheet')
    <link rel="stylesheet" href="{{ asset('/css/balance.css') }}">
@endsection
<script defer src="{{ asset('js/delete-balance.js') }}"></script>

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

    <main class="animate__animated animate__fadeInDown">
        <section class="incomes-section">
            <div class="incomes-icon">
                <i class="fa-solid fa-hand-holding-dollar"></i>
            </div>

            <div>
                <button>
                    <a href="/incomes/create"><i class="fa-solid fa-plus"></i></a>
                </button>
            </div>

            <div class="amounts-content">
                @foreach($incomes as $income)
                    <div>
                        <form>
                            @csrf
                            <i class="fa-solid fa-trash" onclick="deleteOperation({{ $income->id }}, 'incomes')"></i>
                        </form>

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
                <button>
                    <a href="/expenses/create"><i class="fa-solid fa-plus"></i></a>
                </button>
            </div>

            <div class="amounts-content">
                @foreach($expenses as $expense)
                    <div>
                        <form>
                            @csrf
                            <i class="fa-solid fa-trash" onclick="deleteOperation( {{ $expense->id }}, 'expenses')"></i>
                        </form>
                        <p style="text-align: left">{{ $expense['description'] }}</p><strong>{{ $expense['amount'] }}</strong>
                    </div>
                @endforeach
            </div>
        </section>
    </main>

@endsection
