@extends('master')

@section('content')



<div class='container'>
    @auth
        @if(auth()->user()->user_type === 'administrator')
            <div class='row mt-4 mb-4'>
                <div class='col-4'><div class='col-4'><a href="{{ route('restaurantList') }}" class="btn btn-secondary m-2 p-2"><b><h6>< Back</h6></b></a></div></div>
                <div class='col-4 text-center'>
                    <h2><u>Restaurant Approvals</u></h2>
                </div>
                <div class='col-4'>&nbsp;</div>
            </div>

            <!-- Display success message -->
            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Display error message -->
            @if(session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif

            <div class='row text-center'>
                @foreach ($unapprovedRestaurants as $restaurant)
                <div class='col-1'></div>
                <div class='col-10'>
                    <div class="card shadow w-100" style="background-color: #81AE9D; color: white;">
                        <div class="card-body">
                            <div class='row'>
                                <div class='col-4'><h4 class="card-title"><b>{{$restaurant -> name}}</b></h4></div>
                                <div class='col-4'>&nbsp;</div>
                                <div class='col-4'>
                                    <div class="text-center">
                                    <form method="POST" action="{{ route('approveRestaurant', ['id' => $restaurant->id]) }}">
                                    @method('POST')
                                    @csrf
                                        <button type='submit' class="btn btn-success mb-2" style="width: 120px;">Approve</button>
                                    </form>
                                    </div>
                                </div>
                            </div>
                            <div class='row'>

                            <div class='col-4 text-center'>
                                @if($restaurant->approved)
                                    <p class='card-text mb-0'>Approved.</p>
                                @else
                                    <p class='card-text mb-0'>Unapproved</p>
                                @endif
                            </div>
                            <div class='col-4'>&nbsp;</div>
                            <div class='col-4'>
                                <div class="text-center">
                                <form method="POST" action="{{ route('unapproveRestaurant', ['id' => $restaurant->id]) }}">
                                    @method('POST')
                                    @csrf
                                    <button type='submit' class="btn btn-danger" style="width: 120px;">Unapprove</button>
                                </form>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class='col-1'></div>

                <div class='row mb-4 p-2'>&nbsp;</div>
                

                @endforeach
            </div>

        @endif
    @else
    <!-- Should never happen with the middleware but just in case-->
        <h1 class='text-center'>Only administrators can view this page.</h1>
    @endauth
</div>

</div>



@endsection
