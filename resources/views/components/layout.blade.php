@props(['title' => ''])
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>{{ $title }}</title>
</head>
<body class="bg-[#EEEEEE] flex flex-col min-h-screen">
    <x-header/>
    <x-flash-message/>
    <div class="flex-grow">
        {{ $slot }}
    </div>
    <x-footer/>
</body>
</html>
