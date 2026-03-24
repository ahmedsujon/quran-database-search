<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Know Your Quran</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/app/css/app.css') }}">
    @livewireStyles
</head>

<body>

    <!-- HEADER -->
    @livewire('app.layouts.inc.header')

    <!-- CONTENT -->
    {{ $slot }}

    <!-- INFO SECTION -->
    @livewire('app.layouts.inc.footer')


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    @livewireScripts
    @stack('scripts')
</body>

</html>
