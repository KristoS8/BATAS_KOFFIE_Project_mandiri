@props(['navbarSolid' => false])

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>BATAS-KOFFIE</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>

    <x-navbar :navbarSolid="$navbarSolid ?? false"></x-navbar>

    <div class="pt-20 px-16 fixed top-0 left-0 w-full z-40">
        <x-alert_success type="success"></x-alert_success>
    </div>

    <main>
        {{ $slot }}
    </main>

    <x-footer></x-footer>

</body>

</html>
