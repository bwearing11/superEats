@extends('master')

@section('content')

<div class='container'>
    <div class='row mt-4'>
        <div class='col-4'>
            <div class='col-4'><a href="{{ route('restaurantList') }}" class="btn btn-secondary m-2 p-2"><b><h6>< Back</h6></b></a></div>
        </div>
        <div class='col-4 text-center'>
            <h2><u>Popular Dishes </u></h2>
            <h3>(Last 30 days)</h3>
        </div>
        <div class='col-4'></div>
    </div>

        @if(optional($topDishes)->count() > 0)
        <div class='row mt-3 text-center'>
            <div class='col-md-8 offset-md-2'>
                @foreach ($topDishes as $dish)
                <div class='mb-4'>
                    <div class="card text-white" style="background-color: #81AE9D">
                        <div class="card-body">
                            <h5 class="card-title">{{ $dish->name }}</h5>
                            <h5 class="card-text">{{ $dish->user->name }}</h5>
                            @if($dish->orders_count > 1)
                            <p class="card-text">Ordered {{ $dish->orders_count }} times in the last 30 days.</p>
                            @else
                            <p class="card-text">Ordered {{ $dish->orders_count }} time in the last 30 days.</p>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    @else
        <div><h2>No orders in the last 30 days.</h2></div>
    @endif
 

</div>

@endsection
