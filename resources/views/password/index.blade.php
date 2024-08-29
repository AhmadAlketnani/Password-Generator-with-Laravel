@extends('layout.app')

@include('includes._navbar')


@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-lg-8">
            <div class="card text-center">
                <div class="card-header ">
                    <h1 class="card-title ">Welcome, {{ Auth::user()->name }}</h1>
                </div>


                <div class="card-body ">

                    <form action="">

                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" autofocus name="search" class="form-control" placeholder="search"
                                        value="{{ request()->search }}">
                                </div>
                            </div>

                            <div class="col-md-4">

                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
                                <a href="{{ route('password.create') }}" class="btn btn-success"><i class="fa fa-plus "></i>
                                    New Password</a>


                            </div>

                        </div>



                    </form>
                </div>
                <div class="card-body">
                    @if (count($passwords) > 0)
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Website</th>
                                    <th>UserName</th>
                                    <th>Password</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($passwords as $index => $password)
                                    <tr>

                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $password->website }}</td>
                                        <td>{{ $password->user_name ? $password->user_name : 'No user name' }}</td>



                                        {{-- <td style="display: none">{{ $password->password }}</td> --}}
                                        <td class="hiden-{{ $password->id }}">
                                            @php
                                                $stars = '';
                                                for ($i = 0; $i < Str::length($password->password); $i++) {
                                                    $stars.="*";
                                                }
                                            @endphp


                                            {{ $stars }}
                                        </td>


                                        <td>
                                            <div class="row">
                                                <div class="d-flex">
                                                    <div class="col" style="margin: 0 0.25rem 0 0 ;">

                                                        <span class="btn btn-secondary show-pass"
                                                        onclick='toggle({{ $password->id }},"{{ $password->password }}","{{ $stars }}" )' data-bs-toggle="tooltip" data-bs-html="true" title="Show/Hidden Password">

                                                        <i class="fa fa-eye-slash " id="show-pass-{{ $password->id }}"></i>
                                                    </span>

                                                </div>
                                                <div class="col" style="margin: 0 0.25rem 0 0 ;">

                                                        <a href="{{ route('password.edit',$password->id) }}"
                                                            class="btn btn-primary shadow sharp" data-bs-toggle="tooltip" data-bs-html="true" title="Edit Password"><i
                                                                class="fas fa-pencil-alt"></i></a>

                                                </div>
                                                <div class="col" style="margin: 0 0.25rem 0 0 ;">

                                                        <a href="" class="btn btn-warning shadow sharp" data-bs-toggle="tooltip" data-bs-html="true" title="Copy Password"><i
                                                            class="fa fa-copy"></i></a>

                                                </div>
                                                <div class="col" style="margin: 0 0.25rem 0 0 ;">

                                                        <form action="{{ route('password.destroy' , $password->id) }}" method="POST">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="btn btn-danger shadow sharp" data-bs-toggle="tooltip" data-bs-html="true" title="Delete Password">
                                                                <i class="fa fa-trash"></i></button>
                                                        </form>

                                                </div>
                                                </div>
                                            </div>



                                        </td>
                                    </tr>
                                @endforeach




                            </tbody>
                        </table>

                    </div>
                    <div class="card-footer mt-auto ">
                        {{ $passwords->appends(request()->query())->links() }}
                    </div>
                    @else
                        <h3 title="password" class="mt-auto">
                            No Passwords saved
                        </h3>
                    </div>
                    @endif



            </div>


        </div>
    </div>
@endsection

@if (count($passwords) > 0)
@push('scripts')
    <script>
        // var td = document.querySelector(".hiden-"+{{ $password->id }})

        function toggle(id, pass,s) {

            // alert(pass)




            // console.log(id);
            // console.log(pass);

            var td = document.querySelector('.hiden-' + id)
            var icon = document.querySelector("#show-pass-" + id)



            if (td.innerHTML == pass) {
                td.innerHTML = s
                icon.classList.remove('fa-eye')
                icon.classList.add('fa-eye-slash')
            } else {
                td.innerHTML = pass

                icon.classList.remove('fa-eye-slash')
                icon.classList.add('fa-eye')

            }



            // var text = td.innerHTML

            // console.log(td);


            // if(text == ){

            // }
            // showIcon.classList.remove('fa-eye-slash')
            // showIcon.classList.add('fa-eye')

            // td.innerHTML= "{{ $password->password }}"



        }
    </script>
@endpush
@endif
