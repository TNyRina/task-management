<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


    <title>@yield('title') | Task Management by TNR</title>
</head>
<body>
    <div class="h-screen flex flex-col md:flex-row bg-gray-100">
    
        @include('navigation')

        <div  class="md:basis-[93%] flex-1 overflow-auto p-5">
            @yield('content')
        </div>
    </div>

</body>
</html>