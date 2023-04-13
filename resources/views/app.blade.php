<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title inertia>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    @routes
    @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
    @inertiaHead

    <style>
        .ck-editor .ck-editor__main .ck-content {
            min-height: 500px;
        }

        .ck-content>blockquote,
        .ck-content>dl,
        .ck-content>dd,
        .ck-content>h1,
        .ck-content>h2,
        .ck-content>h3,
        .ck-content>h4,
        .ck-content>h5,
        .ck-content>h6,
        .ck-content>hr,
        .ck-content>figure,
        .ck-content>p,
        .ck-content>pre {
            margin: revert;
        }

        .ck-content>ol,
        .ck-content>ul {
            list-style: revert;
            margin: revert;
            padding: revert;
        }

        .ck-content>table {
            border-collapse: revert;
        }

        .ck-content>h1,
        .ck-content>h2,
        .ck-content>h3,
        .ck-content>h4,
        .ck-content>h5,
        .ck-content>h6 {
            font-size: revert;
            font-weight: revert;
        }
    </style>
</head>

<body class="font-sans antialiased">
    @inertia
</body>

</html>