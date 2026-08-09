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
    </head>

<body class="auth-page">

    <main class="auth-container">

        <h1 class="auth-title">
            登録が完了しました
        </h1>

        <p>
            ようこそ、{{ session('username') }} さん！
        </p>

        <p class="auth-link">
            <a href="{{ url('/login') }}">
                ログインページへ
            </a>
        </p>

    </main>

</body>
</html>
