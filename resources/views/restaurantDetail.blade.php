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
            @endif
            </div>
        </div>
    </div>

    <div class='row mb-1'>&nbsp;</div>

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