<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{isset($title) ? $title : "Page en cours"}}</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://use.typekit.net/idi8qqz.css">

@vite(["resources/css/normalize.css", 'resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<x-header/>

<main>
    @if(session('success'))
        <div style="color: green; margin-bottom: 1em;">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div style="color: red; margin-bottom: 1em;">
            <strong>Une erreur est survenue :</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{ $slot }}
</main>

<x-footer/>
</body>
</html>
