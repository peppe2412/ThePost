<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}} | Dashboard | The Post</title>
    @vite(['resources/css/mainBootstrap.css', 'resources/js/mainBootstrap.js'])
</head>

<body>
   <x-sidebar />
    {{ $slot }}
</body>

</html>
