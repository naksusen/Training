@extends("layouts.default")
@section("title", "Register")
@section("content")
    <main class="mt-5">
    <link href="{{ asset('css/register.css') }}" rel="stylesheet">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">
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
                        <h3 class="card-header text-center">Register</h3>
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
                                    <button type="submit" class="btn btn-dark btn-block">Sign up</button>
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
