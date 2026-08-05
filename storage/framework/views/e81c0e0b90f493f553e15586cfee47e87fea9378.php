<!DOCTYPE html>
<html>
<head>
    <title>新規登録</title>
</head>
<body>
    <h1>新規ユーザー登録</h1>

    <!-- フォーム開始：送信先(url)を '/register' に指定 -->
    <?php echo Form::open(['url' => '/register']); ?>


        <div>
            <label>ユーザー名</label>
            <?php echo Form::text('username', null, ['class' => 'input']); ?>

        </div>

        <div>
            <label>メールアドレス</label>
            <?php echo Form::email('email', null, ['class' => 'input']); ?>

        </div>

        <div>
            <label>パスワード</label>
            <?php echo Form::password('password', ['class' => 'input']); ?>

        </div>

        <div>
            <label>パスワード確認</label>
            <?php echo Form::password('password_confirmation', ['class' => 'input']); ?>

        </div>

        <div>
            <?php echo Form::submit('新規登録'); ?>

        </div>

    <?php echo Form::close(); ?>


    <!--ログイン画面へのリンク-->
    <p><a href="/login">ログイン画面に戻る</a></p>

</body>
</html>
<?php /**PATH C:\Users\user\Desktop\cmder\AtlasSNS_iraminatakahiro\resources\views/register.blade.php ENDPATH**/ ?>