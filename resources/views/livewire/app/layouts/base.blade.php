<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Know Your Quran</title>

    <link rel="stylesheet" href="{{ asset('assets/app/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/app/css/bootstrap.min.css') }}">
</head>

<body>

    <!-- HEADER -->
    @livewire('app.layouts.inc.header')

    <!-- CONTENT -->
    {{ $slot }}

    <!-- INFO SECTION -->
    @livewire('app.layouts.inc.footer')

</body>

</html>
