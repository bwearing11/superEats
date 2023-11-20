@extends('master')

@section('content')
    <div class="container">

        <div class='row mb-5'>&nbsp;</div>

        <div class="row justify-content-center">
            <div class="col-md-10">
                <form method="POST" action="{{ route('register') }}" class="mt-5">
                    @csrf

                    <!-- Name -->
                    <div class="mb-3">
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email Address -->
                    <div class="mb-3">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Address -->
                    <div class="mb-3">
                        <x-input-label for="address" :value="__('Address')" />
                        <x-text-input id="address" class="form-control" type="text" name="address" :value="old('address')" required autofocus autocomplete="address" />
                        <x-input-error :messages="$errors->get('address')" class="mt-2" />
                    </div>

                    <!-- User Type (Dropdown) -->
                    <div class="mb-3">
                        <label for="user_type" class="form-label">{{ __('Customer or Restaurant?') }}</label><br>
                        <select id="user_type" name="user_type" class="form-select" required>
                            <option value="customer">Customer</option>
                            <option value="restaurant">Restaurant</option>
                        </select>
                        <x-input-error :messages="$errors->get('user_type')" class="mt-2" />
                    </div>


                    <!-- Password -->
                    <div class="mb-3">
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input id="password" class="form-control"
                                      type="password"
                                      name="password"
                                      required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-3">
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                        <x-text-input id="password_confirmation" class="form-control"
                                      type="password"
                                      name="password_confirmation" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div class='row m-1'>&nbsp;</div>

                    <div class="d-flex justify-content-start">
                        <x-primary-button class="ms-3">
                            {{ __('Register') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>

        <div class='row mt-4'>&nbsp;</div>

    </div>
@endsection
