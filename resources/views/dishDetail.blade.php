@extends('master')

@section('content')

<div class='container'>

    <!-- If current logged in as the restaurant owner of the dish you can edit the dish-->
    @if(auth()->check() && auth()->user()->user_type === 'restaurant' && auth()->user()->id === $dish->user_id)
        <div class='row mb-1'>&nbsp;</div>

        <div class='row'>
            <div class='col-2'><a href="{{ route('restaurants.show',['id' => $dish->user_id]) }}" class="btn btn-secondary m-2 p-2"><b><h6>< &nbsp; Back</h6></b></a></div>
            <div class='col-8 text-center'>
                <h2>{{$dish->name}}: OWNER</h2>
            </div>
            <div class='col-2'>
                <button class="btn btn-primary btn-block" onclick="window.location.href='{{ route('dishes.editDish', ['id' => $dish->id]) }}'">
                    Edit Dish
                </button>

                <div class='row mb-1'>&nbsp;</div>

                <form action="{{ route('dishes.destroy', ['id' => $dish->id]) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger btn-block">Delete Dish</button>
                </form>       
            </div>
        </div>

        <div class='row mt-2'>
            <div class='col-2'>&nbsp;</div>
            <div class='col-8 text-center'>
                <h3>${{$dish->price}}</h3>
            </div>
            <div class='col-2'>&nbsp;</div>
        </div>

        <div class='row m-4'>&nbsp;</div>

        <div class='row'>
            <div class='col-2'>&nbsp;</div>
                <div class='col-8'>
                    <div class="card" style="background-color: #1E1E24; color: white;">
                        <div class="card-body text-center">
                            <p><b>{{ $dish->description }}</b></p>
                        </div>
                    </div>
                </div>
            <div class='col-2'>&nbsp;</div>
        </div>

    @elseif(auth()->check() && auth()->user()->user_type === 'customer')
        <div class='row mb-1'>&nbsp;</div>

        <div class='row'>
            <div class='col-2'><a href="{{ route('restaurants.show',['id' => $dish->user_id]) }}" class="btn btn-secondary m-2 p-2"><b><h6>< &nbsp; Back</h6></b></a></div>
            <div class='col-8 text-center'>
                <h2>{{$dish->name}}</h2>
            </div>
            <div class='col-2'><a class="btn btn-primary m-2 p-2 text-white"><h6>Add to Cart</h6></a></div>
        </div>

        <div class='row mt-2'>
            <div class='col-2'>&nbsp;</div>
            <div class='col-8 text-center'>
                <h3>${{$dish->price}}</h3>
            </div>
            <div class='col-2'>&nbsp;</div>
        </div>

        <div class='row m-4'>&nbsp;</div>

        <div class='row'>
            <div class='col-2'>&nbsp;</div>
            <div class='col-8'>
                <div class="card" style="background-color: #1E1E24; color: white;">
                    <div class="card-body text-center">
                        <p><b>{{ $dish->description }}</b></p>
                    </div>
                </div>
            </div>
            <div class='col-2'>&nbsp;</div>
        </div>

    @else
        <!-- View for Customer User or Guest -->
        <div class='row mb-1'>&nbsp;</div>

        <div class='row'>
            <div class='col-2'><a href="{{ route('restaurants.show',['id' => $dish->user_id]) }}" class="btn btn-secondary m-2 p-2"><b><h6>< &nbsp; Back</h6></b></a></div>
            <div class='col-8 text-center'>
                <h2>{{$dish->name}}</h2>
            </div>
            <div class='col-2'>&nbsp;</div>
        </div>

        <div class='row mt-2'>
            <div class='col-2'>&nbsp;</div>
            <div class='col-8 text-center'>
                <h3>${{$dish->price}}</h3>
            </div>
            <div class='col-2'>&nbsp;</div>
        </div>

        <div class='row m-4'>&nbsp;</div>

        <div class='row'>
            <div class='col-2'>&nbsp;</div>
                <div class='col-8'>
                    <div class="card" style="background-color: #1E1E24; color: white;">
                        <div class="card-body text-center">
                            <p><b>{{ $dish->description }}</b></p>
                        </div>
                    </div>
                </div>
            <div class='col-2'>&nbsp;</div>
        </div>
    @endif

</div>

@endsection
