<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <script src="/js/bootstrap.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>ZonaMovie|{{ $title }}</title>
</head>
<body class="bg-dark-darker">
    <x-navbar />
    {{ $slot }}
    <x-footer />
</body>
</html>