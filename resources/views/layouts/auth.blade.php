<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">
    <title>@yield('title', 'KaporerDokan')</title>
</head>
<body>
@yield('content')
@include('include.header')
<script src="{{ asset('assets/js/work.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>