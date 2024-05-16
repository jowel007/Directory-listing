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



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Login &mdash; Stisla</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/modules/fontawesome/css/all.min.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/modules/bootstrap-social/bootstrap-social.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/css/style.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/css/components.css">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div
                        class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Forgot Password</h4>
                            </div>

                            <div class="card-body">

                                <x-auth-session-status class="mb-4" :status="session('status')" />

                                @if (session('status'))
                                    <div class="alert alert-success">
                                       {{ session('status') }}
                                    </div>
                                @endif
                                <form method="POST" action="{{ route('password.email') }}" class="needs-validation"
                                    novalidate="">
                                    @csrf
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input id="email" type="email" class="form-control" name="email"
                                            value="{{ old('email') }}" tabindex="1" required autofocus>
                                        <div class="invalid-feedback">
                                            Please fill in your email
                                        </div>
                                        @if ($errors->get('email'))
                                            <code>{{ $errors->get('email') }}</code>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            Email Password Reset Link
                                        </button>
                                    </div>
                                </form>

                            </div>
                        </div>
                        <div class="simple-footer">
                            Copyright &copy; {{ date('Y') }} <div class="bullet"></div> Design By <a
                                href="#">AB Consultancy</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ asset('admin') }}/assets/modules/jquery.min.js"></script>
    <script src="{{ asset('admin') }}/assets/modules/popper.js"></script>
    <script src="{{ asset('admin') }}/assets/modules/tooltip.js"></script>
    <script src="{{ asset('admin') }}/assets/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{ asset('admin') }}/assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="{{ asset('admin') }}/assets/modules/moment.min.js"></script>
    <script src="{{ asset('admin') }}/assets/js/stisla.js"></script>

    <!-- JS Libraies -->

    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="{{ asset('admin') }}/assets/js/scripts.js"></script>
    <script src="{{ asset('admin') }}/assets/js/custom.js"></script>
</body>

</html>
