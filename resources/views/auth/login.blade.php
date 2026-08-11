<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>ログイン</title>

    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    </head>

<body class="auth-page">

    <main class="auth-container">

        <h1 class="auth-title">
            AtlasSNSへようこそ
        </h1>

        @if ($errors->any())
            <div class="validation-errors">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form
            action="{{ url('/login') }}"
            method="POST"
            class="auth-form"
        >
            @csrf

            <div class="auth-form-row">

                <label for="email">
                    メールアドレス
                </label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    autocomplete="email"
                >

            </div>

            <div class="auth-form-row">

                <label for="password">
                    パスワード
                </label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    autocomplete="current-password"
                >

            </div>

            <button
                type="submit"
                class="auth-submit-button"
            >
                ログイン
            </button>

        </form>

        <p class="auth-link">
            <a href="{{ url('/register') }}">
                新規ユーザー登録はこちら
            </a>
        </p>

    </main>

</body>
</html>
