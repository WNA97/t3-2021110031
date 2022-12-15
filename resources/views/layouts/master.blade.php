<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'T3-2021110031') | TUGAS 3 CRUD</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    @stack('css_after')
</head>

<body>
    {{-- Top Navbar --}}
    <nav class="navbar navbar-expand-md navbar-dark bg-primary">
        <a class="navbar-brand" href="/">
            <i class="fa-solid fa-book-open-reader"></i>
            <span class="menu-collapsed">CRUD BOOK</span>
        </a>
    </nav>
    {{-- Top Navbar END --}}
    <div class="row" id="body-row">
        {{-- Sidebar --}}
        <div id="sidebar-container" class="sidebar-expanded d-none d-md-block">
            {{-- Menu List--}}
            <ul class="list-group">
                {{-- Separator with title --}}
                <li class="list-group-item sidebar-separator-title text-white d-flex align-items-center menu-collapsed">
                    <small>MAIN MENU</small>
                </li>
                {{-- Separator END --}}
                <a href="{{ route('books.index') }}" class="bg-dark list-group-item list-group-item-action">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <span class="fa-solid fa-book-open"> </span>
                        <span class="menu-collapsed"> Book </span>
                    </div>
                </a>
                <a href="{{ route('authors.index') }}" class="bg-dark list-group-item list-group-item-action">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <span class="fa-solid fa-user"> </span>
                        <span class="menu-collapsed"> Author </span>
                    </div>
                </a>
            </ul>
            {{-- Menu List END--}}
        </div>
        {{-- Sidebar END --}}
        {{-- Content --}}
        <div class="col p-4">
            @yield('content')
        </div>
        {{-- Content END --}}
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    @stack('js_after')
</body>

</html>
