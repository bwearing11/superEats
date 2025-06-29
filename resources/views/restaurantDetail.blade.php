@extends('master')

@section('content')

<div class='container'>

    <div class='row mb-3'>&nbsp;</div>

    <div class='row'>
        <div class='col-4'><a href="{{ route('restaurantList') }}" class="btn btn-secondary m-2 p-2"><b><h6>< &nbsp; Back</h6></b></a></div>
        <div class='col-4 text-center'>
            <h2><u>{{$user->name}}</u></h2>
            <h5>{{$user->address}}</h5>
        </div>
        <div class='col-4'>
            <div class='row'>
            @if(auth()->check() && auth()->user()->user_type === 'restaurant' && auth()->user()->id === $user->id)
                <div class='col-6'>
                    <a href="{{route('dishes.create')}}" style="text-decoration: none; color: inherit;">
                        <div class='btn btn-secondary m-2 p-2'><b><h6>Add Dish</h6></b></div>
                    </a>   
                </div>    

                <div class='col-6'>
                    <a href="{{ route('restaurant.orders', ['id' => $user->id]) }}" style="text-decoration: none; color: inherit;">
                        <div class='btn btn-primary m-2 p-2'>
                            <b><h6>List of Orders</h6></b>
                        </div>
                    </a>    
                </div>
            @elseif(auth()->check() && auth()->user()->user_type === 'customer')
            <div class='col-6'>
            <div class='row'>
                <h5>Items in Cart:</h5>
            </div>
            <div class='row'>
                <ul class='card shadow w-100 m-2 p-2' style="background-color: #FB9F89; color: white;">
                @if($cart)
                    @foreach($cart->dishes as $dish)
                        <li>{{$dish->name}}</li>
                    @endforeach
                @else
                        <p>Cart is empty.</p>
                @endif
                </ul>

                @if($cart)
                <h6><b>Total: ${{$cart->calculateTotal()}}</b></h6>
                @endif
                </div>
            </div>
            
            <div class='col-6 text-center'>
            <div class='row'>
                <a href="{{ route('emptyCart', ['id' => $user->id]) }}" class='btn btn-secondary text-white m-3 p-2 text-center' style='background-color: #1E1E24;'><h5>Empty Cart ❌</h5></a>
            </div>

            
            <div class='row'>
            @if($cart)
                <a href="{{ route('checkoutCart', ['id' => $user->id]) }}" class='btn btn-primary m-3 p-2 text-white'><h5>Order Cart 🛒</h5></a>
            @endif
            </div>
            

            </div>
            @endif
            </div>
        </div>
    </div>

    <div class='row mb-1'>&nbsp;</div>

    @if(session('success'))
    <div class="alert alert-success mt-3">
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger mt-3">
        {{ session('error') }}
    </div>
    @endif

    @if($user->user_type === 'restaurant')
    @foreach($user->dishes as $dish)
        <div class="col-md-12">
        <a href="{{ route('dish.detail', ['id' => $dish->id]) }}" style="text-decoration: none; color: inherit;">
            <div class="card shadow w-100" style="background-color: #81AE9D; color: white;">
                <div class="card-body">
                    <div class='row'>
                        <div class='col-4'>
                            <h3 class="card-title">{{$dish->name}}</h3>
                        </div>
                        <div class='col-6'>&nbsp;</div>
                        <div class='col-2'><h3 class='font-weight-bold'>${{$dish->price}}</h3></div>
                    </div>
                </div>
            </div>
        </div>
        </a>
        <div class='row mb-1'>&nbsp;</div>
    @endforeach
    @else
        <div class="col-md-12">
            <div class="alert alert-info" role="alert">
                {{$user->name}} is not a restaurant user.
            </div>
        </div>
    @endif

</div>



@endsection
