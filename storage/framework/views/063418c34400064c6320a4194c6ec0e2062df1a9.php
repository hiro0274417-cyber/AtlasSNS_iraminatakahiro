<div class="header">

    <a href="/top" class="header-logo">Atlas</a>

    <div class="header-user-menu">

        <!-- クリック対象（spanを削除してCSSの::afterに任せる） -->
        <div class="menu-title">
            <?php echo e(Auth::user()->username); ?> さん
            <img src="<?php echo e(Auth::user()->images); ?>" class="header-user-icon">
        </div>

        <!-- ドロップダウンメニュー -->
        <ul id="menu-list" class="menu-list">
            <li><a href="/top">HOME</a></li>
            <li><a href="/profile/edit">プロフィール編集</a></li>
            <li>
                <form action="/logout" method="POST">
                    <?php echo csrf_field(); ?>
                    <button type="submit">ログアウト</button>
                </form>
            </li>
        </ul>

    </div>

</div>
<?php /**PATH C:\Users\user\Desktop\cmder\AtlasSNS_iraminatakahiro\resources\views/components/header.blade.php ENDPATH**/ ?>