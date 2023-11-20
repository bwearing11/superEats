@extends('master')

@section('content')

<div class='container'>
    <div class='row mb-2 mt-4'>
        <div class='col-2'>
             <a href="{{ route('restaurants.show', ['id' => auth()->id()]) }}" class="btn btn-secondary m-2 p-2"><b><h6>< &nbsp; Back</h6></b></a>
        </div>
        <div class='col-8 text-center'><h2><u>{{$orders[0]->restaurant->name}} Orders</u></h2></div>
        <div class='col-2'>&nbsp;</div>
    </div>

    <div class='row mb-2'>&nbsp;</div>

    <div class='row'>
        <div class='col-1'>&nbsp;</div>
        <div class='col-10'>
            
        <div class='row'>
        <!-- Order Card-->
       @if ($orders->count() > 0)
            @foreach ($orders as $order)
                <div class="card shadow w-100" style="background-color: #81AE9D; color: white;">
                    <div class="card-body">
                        <div class='row'>
                            <div class='col-4'>
                                <h4 class="card-title">{{$order -> customer->name}}</h4>
                            </div>
                            <div class='col-4'>
                                <h5>{{ $order->order_date }}</h5>
                            </div>
                            <div class='col-4'>&nbsp;</div>
                        </div>
                        <div class='row'>
                            <div class='col-4'>
                                <p class='card-text mb-0'>
                                    <ul>
                                    @foreach($order->dishes as $dish)
                                        <li>{{$dish->name}} - ${{$dish->price}}</li>
                                    @endforeach
                                    </ul>
                                </p>
                            </div>
                            <div class='col-4'>
                                <p class='card-text mb-0'>{{$order->customer->address}}</p>
                            </div>
                            <div class='col-4 text-right'>
                                <h5><b>Total: ${{$order->calculateTotalPrice()}}</b></h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='row mb-1'>&nbsp;</div>
            @endforeach
        @else
            <div class='col-1'>&nbsp;</div>
            <div class='col-10 text-center'>
                <div class="alert alert-info" role="alert">
                    No orders found for this restaurant.
                </div>
            </div>
            <div class='col-1'>&nbsp;</div>
     
        @endif
    </div>



        </div>
        <div class='col-1'>&nbsp;</div>
    </div>
</div>

@endsection
