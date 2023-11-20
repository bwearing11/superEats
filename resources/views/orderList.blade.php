@extends('master')

@section('content')

<div class='container'>
    <div class='row mb-2 mt-2'>
        <div class='col-2'>&nbsp;</div>
        <div class='col-8 text-center'><h2><u>Restaurant Name</u></h2></div>
        <div class='col-2'>&nbsp;</div>
    </div>

    <div class='row mb-2'>&nbsp;</div>

    <div class='row'>
        <div class='col-1'>&nbsp;</div>
        <div class='col-10'>
            
        <div class='row'>
        <!-- Order Card-->
        <div class="col-md-12">
            <a style="text-decoration: none; color: inherit;">
                <div class="card shadow w-100" style="background-color: #81AE9D; color: white;">
                    <div class="card-body">
                        <div class='row'>
                            <div class='col-4'><h4 class="card-title">Dish Name</h4></div>
                            <div class='col-4'><h5>9:11am 24th April 2001</h5></div>
                            <div class='col-4'>&nbsp;</div>
                            
                        </div>
                        <div class='row'>
                            <div class='col-4'><p class='card-text mb-0'>Customer Name</p></div>
                            <div class='col-6'><p class='card-text mb-0'>123 Sesame Street Upper Yes Side</p></div>
                            <div class='col-2'><h5><b>$xx.xx</b></h5></div>
                            
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>



        </div>
        <div class='col-1'>&nbsp;</div>
    </div>
</div>

@endsection