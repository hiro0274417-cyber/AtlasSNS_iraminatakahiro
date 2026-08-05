<!DOCTYPE html>
<html>
<head>
    <title>新規登録</title>
</head>
<body>
    <h1>新規ユーザー登録</h1>

    <!-- フォーム開始：送信先(url)を '/register' に指定 -->
    {!! Form::open(['url' => '/register']) !!}

        <div>
            <label>ユーザー名</label>
            {!! Form::text('username', null, ['class' => 'input']) !!}
        </div>

        <div>
            <label>メールアドレス</label>
            {!! Form::email('email', null, ['class' => 'input']) !!}
        </div>

        <div>
            <label>パスワード</label>
            {!! Form::password('password', ['class' => 'input']) !!}
        </div>

        <div>
            <label>パスワード確認</label>
            {!! Form::password('password_confirmation', ['class' => 'input']) !!}
        </div>

        <div>
            {!! Form::submit('新規登録') !!}
        </div>

    {!! Form::close() !!}

    <!--ログイン画面へのリンク-->
    <p><a href="/login">ログイン画面に戻る</a></p>

</body>
</html>
