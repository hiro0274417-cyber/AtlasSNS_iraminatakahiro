<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>登録完了</title>

        <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/logout.css') }}">
    </head>

<body class="auth-page">

    <div class="auth-brand">
        <img
            src="{{ asset('images/atlas-logo.png') }}"
            alt="Atlas"
            class="auth-brand-logo"
        >

        <div class="auth-brand-subtitle">
            Social Network Service
        </div>
    </div>

    <main class="auth-container added-container">

        <h1 class="added-title">
          <strong>{{ session('username') }}</strong>さん
          <br>
         ようこそ！AtlasSNSへ
        </h1>

        <p class="added-message">
            ユーザー登録が完了いたしました。
            <br>
            早速ログインをしてみましょう！
        </p>

        <p class="added-login">
            <a href="{{ url('/login') }}">
                ログイン画面へ
            </a>
        </p>

    </main>

</body>
</html>
