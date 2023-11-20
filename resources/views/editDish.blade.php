@extends('master')

@section('content')

<div class='container'>
    <div class='row mb-1'>&nbsp;</div>

    <div class='row'>
    <div class='col-2'><a href="{{ route('restaurants.show',['id' => $dish->user_id]) }}" class="btn btn-secondary m-2 p-2"><b><h6>< &nbsp; Back</h6></b></a></div>
        <div class='col-8 text-center'>
            <h2><u>Edit Dish</u></h2>
        </div>
        <div class='col-2'>&nbsp;</div>
    </div>

    <div class='row'>
        <!-- Form for editing dish details -->
        <div class='col-2 mb-3'>&nbsp;</div>
        <div class='col-8'>

            @if($errors->any())
                <div class="alert alert-danger">
                    <p><strong>Error: There was some issues with your entered values.</strong></p>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>

                    <p><strong>Entered Values:</strong></p>
                    <ul>
                        <li><strong>Name:</strong> {{ old('name', $dish->name) }}</li>
                        <li><strong>Description:</strong> {{ old('description', $dish->description) }}</li>
                        <li><strong>Price:</strong> {{ old('price', $dish->price) }}</li>
                    </ul>


                </div>
            @endif

            <form action="{{ route('dishes.update', ['id' => $dish->id]) }}" method="post">
                @csrf
                @method('put')

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $dish->name }}">
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description">{{ $dish->description }}</textarea>
                </div>

                <div class="form-group">
                    <label for="price">Price</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">$</span>
                            </div>
                            <input type="text" class="form-control" id="price" name="price" value="{{ $dish->price }}">
                        </div>
                    </div>
                <button type="submit" class="btn btn-primary">Update Dish</button>
            </form>
        </div>
        <div class='col-2'>&nbsp;</div>
    </div>

</div>

@endsection
