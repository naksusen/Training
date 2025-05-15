@extends("layouts.default")
@section("title", "Register")
@section("content")
    <main class="d-flex align-items-center justify-content-center min-vh-100">
    <link href="{{ asset('css/register.css') }}" rel="stylesheet">
    <style>
        @keyframes typing {
            from { width: 0 }
            to { width: 100% }
        }
        .animate-title {
            width: 100%;
            overflow: hidden;
            white-space: nowrap;
            animation: typing 1.5s steps(7);
        }
        .custom-success-modal {
            position: fixed;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(0,0,0,0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 10000;
            animation: fadeIn 0.5s;
        }
        .custom-success-modal-content {
            background: #43a047;
            color: #fff;
            padding: 2rem 3rem;
            border-radius: 12px;
            box-shadow: 0 8px 32px rgba(0,0,0,0.2);
            text-align: center;
            font-size: 1.3rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 1rem;
        }
        .custom-success-check {
            font-size: 2.5rem;
            background: #fff;
            color: #43a047;
            border-radius: 50%;
            width: 2.5rem;
            height: 2.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 0.5rem;
        }
        .custom-success-alert {
            display: none;
        }
        @keyframes fadeIn {
            to { opacity: 1; }
        }
        @keyframes fadeOut {
            to { opacity: 0; }
        }
    </style>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    @if(session()->has('success'))
                        <div class="custom-success-modal" id="success-modal">
                            <div class="custom-success-modal-content">
                                <span class="custom-success-check">&#10003;</span>
                                <div>{{ session()->get('success') }}</div>
                            </div>
                        </div>
                        <script>
                            setTimeout(function() {
                                window.location.href = "{{ route('login') }}";
                            }, 2500); 
                        </script>
                    @endif
                    @if(session()->has('error'))
                        <div class="alert alert-danger">
                            {{ session()->get('error') }}
                        </div>
                    @endif
                    <div class="card pb-4" style="padding-bottom: 6rem;">
                        <!-- matchhome logo -->
                        <img src="{{ asset('/images/matchhome-logo.png') }}" alt="MatchHome Logo" class="logo">
                        <h3 class="card-header text-center animate-title">Register</h3>
                        <div class="card-body">
                            <form method="POST" action="{{ route('register.post') }}">
                                @csrf
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="First Name" id="firstname" class="form-control" name="firstname" autofocus>
                                    @if ($errors->has('firstname'))
                                        <span class="text-danger">{{ $errors->first('firstname') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Last Name" id="lastname" class="form-control" name="lastname" autofocus>
                                    @if ($errors->has('lastname'))
                                        <span class="text-danger">{{ $errors->first('lastname') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Email" id="email" class="form-control" name="email" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3 position-relative">
                                    <input type="password" placeholder="Password" id="password" class="form-control" name="password" required>
                                    <span class="eye-icon" onclick="togglePassword('password')">
                                        <i id="password-eye-icon" class="bi bi-eye"></i>
                                    </span>
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3 position-relative">
                                    <input type="password" placeholder="Confirm Password" id="confirm-password" class="form-control" name="password_confirmation" required>
                                    <span class="eye-icon" onclick="togglePassword('confirm-password')">
                                        <i id="confirm-password-eye-icon" class="bi bi-eye"></i>
                                    </span>
                                    @if ($errors->has('password_confirmation'))
                                        <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                    @endif
                                </div>
                                <div class="d-grid mx-auto">
                                    <button type="submit" class="btn btn-dark btn-block" style="background-color: #00897b; border-color: #00897b;">Sign up</button>
                                </div>
                                <div class="text-center mb-3" style="margin-top: 4rem;">
                                    <p class="mb-0 text-white">Already have an account? <a href="{{ route('login') }}" class="text-decoration-none" style="color: #00897b;">Sign In</a></p>
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
        function togglePassword(id) {
            const passwordField = document.getElementById(id);
            const eyeIcon = document.getElementById(`${id}-eye-icon`);
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
