<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>新規ユーザー登録</title>

    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="auth-page">

    <main class="auth-container">

        <h1 class="auth-title">
            新規ユーザー登録
        </h1>

        {{-- バリデーションエラー --}}
        @if ($errors->any())
            <div class="validation-errors">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form
            action="{{ url('/register') }}"
            method="POST"
            class="auth-form"
        >
            @csrf

            <div class="auth-form-row">

                <label for="username">
                    ユーザー名
                </label>

                <input
                    type="text"
                    id="username"
                    name="username"
                    value="{{ old('username') }}"
                    autocomplete="username"
                >

            </div>

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
                    autocomplete="new-password"
                >

            </div>

            <div class="auth-form-row">

                <label for="password_confirmation">
                    パスワード確認
                </label>

                <input
                    type="password"
                    id="password_confirmation"
                    name="password_confirmation"
                    autocomplete="new-password"
                >

            </div>

            <button
                type="submit"
                class="auth-submit-button"
            >
                新規登録
            </button>

        </form>

        <p class="auth-link">
            <a href="{{ url('/login') }}">
                ログイン画面に戻る
            </a>
        </p>

    </main>

</body>
</html>
