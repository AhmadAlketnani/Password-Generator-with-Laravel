@extends('layout.app')

@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title">Login</h1>
                </div>
                <div class="card-body">

                    @include('includes._errors')
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" value="{{ old('email') }}" name="email" class="form-control"
                                    id="email" placeholder="name@example.com">
                            </div>
                        </div>
                        <div class="mb-3 ">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group transparent-append">
                                <input type="password" id="password" value="{{ old('password') }}" name="password"
                                    class="form-control" id="password" required>
                                <span class="input-group-text show-pass" onclick="toggle()" id="show-pass">
                                    <i class="fa fa-eye-slash " id="__icon"></i>
                                    <i class="fa fa-eye " style="display: none;"></i>

                                </span>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="d-grid">
                                <button class="btn btn-primary">Login</button>
                            </div>
                        </div>
                        <p class="text-center ">Don't have an account? <a href="{{ route('register') }}"
                                class="text-primary" style="text-decoration: none; font-weight: bold;">Register</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // var passwordIcon = document.querySelector('.show-pass')
        var passwordInput = document.querySelector('#password')
        var icon = document.querySelector('#__icon')
        // var hidenIcon = document.querySelector('.fa-eye')

        function toggle() {
            if (passwordInput.type == "password") {
                passwordInput.type = "text"
                icon.classList.remove('fa-eye-slash')
                icon.classList.add('fa-eye')
            } else {
                passwordInput.type = "password"
                icon.classList.remove('fa-eye')
                icon.classList.add('fa-eye-slash')
            }

        }
    </script>
@endpush
