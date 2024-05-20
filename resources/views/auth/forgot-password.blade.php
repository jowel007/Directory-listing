{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}


@extends('Frontend.layouts.master')

@section('content')
 
        <div id="breadcrumb_part">
            <div class="bread_overlay">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12 text-center text-white">
                            <h4>Forgot Password</h4>
                            <nav style="--bs-breadcrumb-divider: '';" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#"> Home </a></li>
                                    <li class="breadcrumb-item active" aria-current="page"> Forgot Password </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
 

        <section class="wsus__login_page">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-5 col-xl-6 col-md-9 col-lg-7 m-auto">
                        <div class="wsus__login_area">
                            
                            <p>Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</p>
                            
                            @if (session('status'))
                                    <div class="alert alert-success">
                                       {{ session('status') }}
                                    </div>
                                @endif
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <div class="row">
    
                                    <div class="col-xl-12">
                                        <div class="wsus__login_imput">
                                            <label>email</label>
                                            <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" required>
                                        </div>
                                    </div>
    
    
                                    <div class="col-xl-12">
                                        <div class="wsus__login_imput">
                                            <button type="submit">Email Password Reset Link</button>
                                        </div>
                                    </div>
    
                                </div>
                            </form>
                          
                            <p class="create_account">Dont’t have an aceount ? <a href="{{ route('register') }}">Create Account</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>


@endsection
