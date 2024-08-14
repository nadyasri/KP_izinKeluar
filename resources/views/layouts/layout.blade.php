<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css')}}" rel="stylesheet">
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Istok+Web:ital,wght@0,400;0,700;1,400;1,700&display=swap');
</style>
<body class="bg-gray-100 font-sans antialiased">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        @yield('sidebar')

        <!-- Main Content -->
        <div class="flex-grow bg-green-700">
            <div class="bg-white p-10 rounded-tl-3xl rounded-bl-3xl shadow-xl min-h-full">
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>
