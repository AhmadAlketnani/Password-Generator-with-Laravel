<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Password Generator</title>
    {{-- Bootstrap --}}
    <link href="{{ asset('css/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    {{-- Font-Awesome --}}
    <link rel="stylesheet" href="{{ asset('css/font-awesome/css/all.min.css') }}">

    <script src="{{ asset('js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    {{-- <script src="{{ asset('js/jquery.steps.min.js') }}"></script> --}}

    <style>
        .show-pass {
            cursor: pointer;
        }

        .input-group-text {
            background: #d7dae3;
            border: 0.0625rem solid #f5f5f5;
            min-width: 3.125rem;
            display: flex;
            justify-content: center;
            padding: 0.532rem 0.75rem;
            display: ;

        }
        .action{
            padding-top: 0.20rem !important;
            padding-right: 0.20rem !important;
            padding-bottom: 0.20rem !important;
            padding-left: 0.20rem !important;
        }
    </style>
</head>

<body >
    @yield('content')

</body>

@stack('scripts')



</html>
