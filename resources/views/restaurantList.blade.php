@extends('master')

@section('content')

<link rel="stylesheet" href="{{ asset('css/styles.css') }}">

<div class="container">

<div class="row mb-2">&nbsp;&nbsp;</div>

    <div class='row'>
        <div class='col-2'></div>
        <div class='col-8 text-center'>
            <div class='row'>&nbsp;</div>
            <div class='row text-center'>
                <h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u>Restaurants Available on Super Eats</u></h2>
            </div>
        </div>
        <div class='col-2'>

         @if(auth()->check() && auth()->user()->user_type === 'administrator')
        <a href="{{route('approvals')}}" style="text-decoration: none; color: inherit;">
            <div class='btn btn-secondary m-2 p-2'><b><h6>Restaurant Approvals</h6></b></div>
        </a>
         @endif

        </div>
    </div>

    <div class="row mb-1">&nbsp;&nbsp;</div>

    @foreach($restaurantUsers as $restaurantUser)
    <div class='row'>
        <!-- Restaurant Card-->
        <div class="col-md-12">
        <a href="{{ route('restaurants.show', ['id' => $restaurantUser->id]) }}" style="text-decoration: none; color: inherit;">
            <div class="card shadow w-100" style="background-color: #81AE9D; color: white;">
                <div class="card-body">
                    <div class='row'>
                        <h4 class="card-title">{{ $restaurantUser->name }}</h4>
                    </div>
                    <div class='row'>
                        <p class='card-text mb-0'>{{ $restaurantUser->address }}</p>
                    </div>
                </div>
            </div>
        </a>
        </div>
    </div>

    <div class='row mb-1'>&nbsp;</div>
    @endforeach
    <div class="row mt-3">
        <div class="col-md-12">
            {{ $restaurantUsers->links() }}
        </div>
    </div>
    
    


    </div>
</div>

@endsection
