<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>@yield('title') | Task Management by TNR</title>
</head>
<body>
    <div class="h-screen flex flex-col lg:flex-row ">
        <nav class="p-3 basis-[7%] bg-blue-800 items-center flex justify-start lg:flex-col md:flex-row ">
            <div class="w-[40px] items-center">
                <img src="/images/logo/logo-2067396_1280.png" alt="" class="w-full">
            </div>
        </nav>

        <div class="lg:basis-[93%] items-center">
            @yield('content')
        </div>
    </div>

</body>
</html>