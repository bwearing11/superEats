@extends('master')

@section('content')
    <div class="container">

        <div class='row mb-5'>&nbsp;</div>
        <div class='row mb-5'>&nbsp;</div>

        <div class="row justify-content-center">
            <div class="col-md-10">
                <form method="POST" action="{{ route('login') }}" class="mt-5">
                    @csrf
                    <!-- Email Address -->
                    <div class="mb-3">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input id="password" class="form-control"
                                      type="password"
                                      name="password"
                                      required autocomplete="current-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class='row m-1'>&nbsp;</div>

                    <div class="d-flex justify-content-start">
                        <x-primary-button class="ms-3">
                            {{ __('Log in') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>

        <div class='row mt-4'>&nbsp;</div>

    </div>
@endsection
