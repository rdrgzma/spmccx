<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="border-top-wide border-primary d-flex flex-column" style="background-color: #0CF83C;">

    <div class="page page-center">
        <div class="container-tight py-4" style="background-color: #0CF83C;">

            @yield('content')

        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
