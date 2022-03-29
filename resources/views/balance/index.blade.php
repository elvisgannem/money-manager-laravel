@extends('components.layout')
@section('stylesheet')
    <link rel="stylesheet" href="{{ asset('/css/balance.css') }}">
@endsection
<script defer src="{{ asset('js/delete-balance.js') }}"></script>
<script defer src="{{ asset('js/change-month.js') }}"></script>

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

    @if(count($months) > 0)
        <section class="month-view">
            <form method="post">
                @csrf
                <select name="month-select" id="month-select" onchange="changeMonth(this)">
                    @foreach($months as $month)
                        <option value="{{ $month->id }}">{{ $month->month }}</option>
                    @endforeach
                </select>
            </form>
        </section>
    @endif

    <main class="animate__animated animate__fadeInDown">

        <section class="incomes-section">
            <div class="incomes-icon">
                <i class="fa-solid fa-hand-holding-dollar"></i>
            </div>

            <div class="add-container">
                <button>
                    <a href="/incomes/create"><i class="fa-solid fa-plus"></i></a>
                </button>
            </div>

            <div class="amounts-content">
                @foreach($incomes as $income)
                    <div class="income-container">
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
                        <p>{{ $expense['description'] }}</p><strong>{{ $expense['amount'] }}</strong>
                    </div>
                @endforeach
            </div>
        </section>
    </main>

    <section class="bg-modal-destroy hidden">
        <div class="modal-destroy">
            <h3>Are you sure?</h3>
            <div>
                <button class="confirm-button">Confirm</button>
                <button class="cancel-button">Cancel</button>
            </div>
        </div>
    </section>


@endsection
