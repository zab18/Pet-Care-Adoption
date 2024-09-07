<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.jsx'])

    <!-- Add user authentication meta tags -->
    @if(Auth::check())
        <meta name="user-id" content="{{ Auth::user()->id }}">
        <meta name="user-name" content="{{ Auth::user()->name }}">
    @else
        <meta name="user-id" content="">
        <meta name="user-name" content="Guest">
    @endif

    <!-- Add custom styles for clarity and contrast -->
    <style>
        /* Ensure clear text with proper contrast */
        body {
            background-color: #ffffff; /* White background */
        }

        header {
            background-color: #6B5B95; /* Darker lavender */
            color: white; /* White text for better contrast */
        }

        .header-text {
            color: white; /* Ensure header text is white for clarity */
        }

        .nav-link {
            color: white; /* Ensure navigation links are white */
        }

        .nav-link:hover {
            background-color: #4A4455; /* Slightly darker purple on hover */
            color: #ffffff;
        }

        .container {
            color: #333333; /* Dark gray text for the main content */
        }

        .btn {
            background-color: #6B5B95; /* Button color matching header */
            color: white; /* White text on buttons */
            border: none;
        }

        .btn:hover {
            background-color: #4A4455; /* Darker on hover */
            color: white;
        }
    </style>
</head>
<body class="font-sans antialiased bg-white">
    <div class="min-h-screen">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-[#6B5B95] shadow"> <!-- Set header to darker lavender -->
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <span class="header-text">{{ $header }}</span> <!-- Ensure the header content is displayed in white -->
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main class="container mx-auto">
            @yield('content')
        </main>
    </div>
</body>
</html>
