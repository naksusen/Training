@extends('layouts.default')
@section('title', 'Login')
@section('content')
    <main class="mt-5">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    <style>
        @keyframes typing {
            from { width: 0 }
            to { width: 100% }
        }
        .animate-title {
            width: 100%;
            overflow: hidden;
            white-space: nowrap;
            animation: typing 1.5s steps(5);
        }
    </style>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    @if(session()->has('error'))
                        <div class="alert alert-danger">
                            {{ session()->get('error') }}
                        </div>
                    @endif
                    <div class="card">
                        <!-- matchhome logo -->
                        <img src="{{ asset('/images/matchhome-logo.png') }}" alt="MatchHome Logo" class="logo">
                        <h3 class="card-header text-center animate-title">Login</h3>
                        <div class="card-body">
                            <form method="POST" action="{{ route('login.post') }}">
                                @csrf
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Email" id="email" class="form-control" name="email" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3 position-relative">
                                    <input type="password" placeholder="Password" id="password" class="form-control" name="password" required>
                                    <span class="eye-icon" onclick="togglePassword()">
                                        <i id="eye-icon" class="bi bi-eye"></i>
                                    </span>
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                                <div class="d-grid mx-auto">
                                    <button type="submit" class="btn btn-dark btn-block mx-auto d-block">Sign in</button>
                                </div>
                                <div class="text-center w-100 mt-4">
                                    <p class="mb-0 text-white" style="white-space: nowrap;">Don't have an account yet? <a href="{{ route('register') }}" class="text-decoration-none">Sign Up</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    @push('scripts')
    <script>
        function togglePassword() {
            const passwordField = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                eyeIcon.classList.remove('bi-eye');
                eyeIcon.classList.add('bi-eye-slash');
            } else {
                passwordField.type = 'password';
                eyeIcon.classList.remove('bi-eye-slash');
                eyeIcon.classList.add('bi-eye');
            }
        }
    </script>
    @endpush
@endsection
