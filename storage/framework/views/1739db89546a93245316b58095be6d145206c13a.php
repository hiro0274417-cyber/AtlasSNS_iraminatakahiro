<!DOCTYPE html>
<html>
<head>
    <title>ログイン</title>
</head>
<body>
    <h1>ログインページ</h1>

    <!-- フォーム開始：送信先(url)を '/login' に指定 -->
    <?php echo Form::open(['url' => '/login']); ?>


        <div>
            <label>メールアドレス</label>
            <?php echo Form::email('mail', null, ['class' => 'input']); ?>

        </div>

        <div>
            <label>パスワード</label>
            <?php echo Form::password('password', ['class' => 'input']); ?>

        </div>

        <div>
            <?php echo Form::submit('ログイン'); ?>

        </div>

    <?php echo Form::close(); ?>


    <!--新規登録画面へのリンク-->
    <p><a href="/register">新規ユーザー登録はこちら</a></p>

</body>
</html>
<?php /**PATH C:\Users\user\Desktop\cmder\AtlasSNS_iraminatakahiro\resources\views/login.blade.php ENDPATH**/ ?>