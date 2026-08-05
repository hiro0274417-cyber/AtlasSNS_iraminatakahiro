<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>AtlasSNS</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>

    {{-- 共通ヘッダー --}}
    @include('components.header')


    <div class="main-container">

        {{-- 共通サイドバー --}}
        @include('components.sidebar')

        {{-- ページ固有の内容 --}}
        <div class="content">
            @yield('content')
        </div>

    </div>
          <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
          <script src="/js/script.js"></script>
          <script src="{{ asset('js/app.js') }}"></script>

</body>
</html>
