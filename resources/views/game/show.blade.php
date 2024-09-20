@extends('layouts.app')

@push('scripts')
<style type="text/css">
    @keyframes rotate {
        from {
            transform: rotate(0deg);
        }
        to {
            transform: rotate(360deg);
        }
    }

    .refresh {
        animation: rotate 1.5s linear infinity;
    }
    
</style>
@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Game Spinner') }}</div>

                <div class="card-body">
                    <div class="text-center">
                        <img id="circle" class="refresh" src="{{ asset('img/circle.png') }}" height="250" width="250">

                        <p id="winner" class="display-1 d-none text-primary"></p>
                    </div>
                    <hr>

                    <div class="text-center">
                        <label class="font-weight-bold h5">Your Bet</label>
                        <select id="bet" class="custom-select col-auto">
                            <option selected>Not in</option>

                            @foreach(range(1, 12) as $number)
                                <option>{{ $number }}</option>
                            @endforeach
                        </select>
                        <hr>
                        <p class="font-weight-bold h5">Remaining Time</p>
                        <p id="timer" class="h5 text-danger">Waiting to start</p>
                        <hr>
                        <p id="result" class="h1"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        const circle = document.getElementById('circle');
        const winner = document.getElementById('winner');
        const bet = document.getElementById('bet');
        const timer = document.getElementById('timer');
        const result = document.getElementById('result');

        Echo.channel('game') {
            .listen('RemainingTimeChanged', (e) => {
                timer.innerText = e.text;

                circle.ClassList.add('refresh');
                winner.ClassList.add('d-none');

                result.innerTest = '';
                result.ClassList.remove('text-success');
                result.ClassList.remove('text-danger');
            })
            .listen('WinnerNumberGenerated', (e) => {
                circle.ClassList.remove('refresh');
                winner.ClassList.remove('d-none');
                winner.innerText = e.number;

                let bet = bet[bet.selectedIndex].innerText;

                if (bet === e.number) {
                    result.innerText = 'You win!';
                    result.ClassList.add('text-success');
                } else {
                    result.innerText = 'You lose!';
                    result.ClassList.add('text-danger');
                }
            });
        }
    </script>
@endpush