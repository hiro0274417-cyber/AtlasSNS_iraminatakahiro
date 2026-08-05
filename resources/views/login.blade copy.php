<!DOCTYPE html>
<html>
<head>
    <title>ログイン</title>
</head>
<body>
    <h1>ログインページ</h1>

    <!-- フォーム開始：送信先(url)を '/login' に指定 -->
    {!! Form::open(['url' => '/login']) !!}

        <div>
            <label>メールアドレス</label>
            {!! Form::email('mail', null, ['class' => 'input']) !!}
        </div>

        <div>
            <label>パスワード</label>
            {!! Form::password('password', ['class' => 'input']) !!}
        </div>

        <div>
            {!! Form::submit('ログイン') !!}
        </div>

    {!! Form::close() !!}

    <!--新規登録画面へのリンク-->
    <p><a href="/register">新規ユーザー登録はこちら</a></p>

</body>
</html>
