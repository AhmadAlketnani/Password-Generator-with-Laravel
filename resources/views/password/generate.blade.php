@extends('layout.app')

@include('includes._navbar')

@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title">Generate Password</h1>
                </div>
                <div class="card-body">
                        <div class="mb-3">
                            <p class="form-control text-center"> {{ $password }}</p>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="d-grid">
                                    <a href="{{ route('password.create', $password) }}"
                                        class="btn btn-success shadow  sharp ">
                                        <i class="fas fa-plus"></i> Save</a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-grid">
                                    <a href="" class="btn btn-warning shadow  sharp ">
                                        <i class="fa fa-copy"></i> Copy</a>
                                </div>
                            </div>

                        </div>












                    {{-- @include('includes._errors')
                    <form action="{{ route('password.update',$password->id) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="website" class="form-label">Website Name</label>
                            <input type="text" name="website" class="form-control" value="{{ old('website',$password->website) }}"
                                id="website" placeholder="{{ env('APP_NAME') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="user_name" class="form-label">User Name</label>
                            <input type="text" name="user_name" class="form-control" value="{{ old('user_name',$password->user_name) }}"
                                id="user_name" placeholder="(optinal)Email or Custom Name" >
                        </div>

                       @if (request()->hasHeader('password'))
                       <div class="mb-3">
                        <label for="user_name" class="form-label">Password </label>
                       <input type="text" class="form-control" readonly name="password" value="{{ $password->password }}">
                       </div>
                       @endif

                        <div class="mb-3">
                            <div class="d-grid">
                                <button class="btn btn-primary"><i class="fa fa-pencil-alt "></i> Edit</button>

                            </div>
                        </div>
                    </form> --}}

                </div>
            </div>
        </div>
    </div>
@endsection
{{-- @extends('layout.app')

@include('includes._navbar') --}}
