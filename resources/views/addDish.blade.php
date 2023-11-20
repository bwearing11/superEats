@extends('master')

@section('content')

<div class='container'>

    <div class='row mb-1'>&nbsp;</div>

    <div class='row'>
        <div class='col-4'><a href="{{ route('restaurants.show', ['id' => auth()->id()]) }}" class="btn btn-secondary m-2 p-2"><b><h6>< &nbsp; Back</h6></b></a></div>
        <div class='col-4 text-center'>
            <h2><u>Add New Dish</u></h2>
        </div>
        <div class='col-4'>&nbsp;</div>
    </div>

    <div class='row'>
        <div class='col-2'>&nbsp;</div>
        <div class='col-8 text-center'><h4>{{auth()->user()->name}}</h4></div>
        <div class='col-2'>&nbsp;</div>
    </div>

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
                <li><strong>Name:</strong> {{ old('name') }}</li>
                <li><strong>Description:</strong> {{ old('description') }}</li>
                <li><strong>Price:</strong> {{ old('price') }}</li>
            </ul>


        </div>
    @endif

    <div class='row'>
        <div class='col-1'>&nbsp;</div>
        <div class='col-10'>
            <form action="{{ route('dishes.store') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Dish Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                        </div>
                        <input type="text" name="price" class="form-control" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary p-2">Add Dish</button>
            </form>
        </div>
        <div class='col-1'>&nbsp;</div>
    </div>
    
</div>


@endsection