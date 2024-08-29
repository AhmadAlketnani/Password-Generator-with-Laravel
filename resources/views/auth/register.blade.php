@extends('layout.app')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title">Register</h1>
            </div>
            <div class="card-body">
                @include('includes._errors')
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="name"
                        placeholder="Ahmad Alketnani" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" id="email"
                        placeholder="name@example.com" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group transparent-append">
                        <input type="password" name="password" class="form-control" id="password" required>
                        <span class="input-group-text show-pass" onclick="toggle()" id="show-pass">
                            <i class="fa fa-eye-slash "></i>
                            <i class="fa fa-eye " style="display: none;"></i>

                        </span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="d-grid">
                            <button class="btn btn-primary">Register</button>
                        </div>
                    </div>
                    <p class="text-center ">Already have an account? <a href="{{ route('login') }}" class="text-primary" style="text-decoration: none; font-weight: bold;">Login</a></p>
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
            // showIcon.style.display= "none"
            // hidenIcon.style.display= "inline-block"
        } else {
            passwordInput.type = "password"
            icon.classList.remove('fa-eye')
            icon.classList.add('fa-eye-slash')
        }

    }








</script>

@endpush

