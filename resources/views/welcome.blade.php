<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pet Adoption</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <style>
        body {
            margin: 0;
            font-family: 'Figtree', sans-serif;
            color: #333;
            background-color: #ffffff; /* Body background color */
        }
        header {
            background-color: #e6e6fa; /* Lavender background color */
            padding: 1rem;
            text-align: center;
        }
        #app {
            padding: 1rem;
        }
    </style>
</head>
<body>
    <header>
        <h1>Pet Adoption</h1>
    </header>
    <div id="app"></div>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
