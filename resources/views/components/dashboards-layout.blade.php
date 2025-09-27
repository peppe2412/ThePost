<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/mainBootstrap.css', 'resources/js/mainBootstrap.js'])
</head>

<body>
    <div class="container py-5">
        <div class="row">
            <div class="col-12 col-md-3">
                <a class="btn btn-info fs-5 text-uppercase fw-bold" href="{{ route('home') }}">
                    <span><i class="bi bi-arrow-left"></i></span> Torna alla home</a>
            </div>
        </div>
    </div>
    {{ $slot }}
</body>

</html>
