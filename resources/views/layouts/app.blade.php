<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Laravel Todo App</title>
    {{-- blade-formatter-disable --}}
    <style type="text/tailwindcss">
        .action-btn {
            @apply rounded-sm  px-4 py-1 text-center font-medium text-slate-700 shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50
        }

        .link{
            @apply font-medium text-gray-700 underline decoration-pink-500 text-xl
        }
    </style>
    {{-- blade-formatter-enable --}}

    @yield('styles')
</head>

<body class="container mx-auto mt-10 mb-10 max-w-lg">
    @if (session()->has('success'))
        <div>
            {{ session()->get('success') }}
        </div>
    @endif

    <h1 class="text-6xl font-bold mb-4 text-gray-700">@yield('title')</h1>
    <div>
        @yield('content')
    </div>
</body>

</html>
