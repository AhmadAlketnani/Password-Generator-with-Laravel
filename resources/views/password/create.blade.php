@extends('layout.app')

@include('includes._navbar')

@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title">New Password</h1>
                </div>
                <div class="card-body">

                    @include('includes._errors')
                    <form action="{{ route('password.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="website" class="form-label">Website Name</label>
                            <input type="text" name="website" class="form-control" value="{{ old('website') }}"
                                id="website" placeholder="{{ env('APP_NAME') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="user_name" class="form-label">User Name</label>
                            <input type="text" name="user_name" class="form-control" value="{{ old('user_name') }}"
                                id="user_name" placeholder="(optinal)Email or Custom Name" >
                        </div>

                       @if (request()->hasHeader('password'))
                       <input type="hidden" name="password" value="{{ $password }}">
                       @endif

                        <div class="mb-3">
                            <div class="d-grid">
                                <button class="btn btn-success"><i class="fa fa-plus"></i> Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
