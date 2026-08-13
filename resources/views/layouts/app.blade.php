<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>AtlasSNS</title>

    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">


</head>

<body>

    @include('components.header')

    <div class="main-container">

    <main class="content">
        @yield('content')
    </main>

    @include('components.sidebar')

</div>

    <script src="{{ asset('js/app.js') }}"></script>

</body>
</html>
