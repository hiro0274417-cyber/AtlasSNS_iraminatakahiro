<div class="sidebar">

    <p>フォロー：<?php echo e(Auth::user()->followings()->count()); ?></p>
    <p>フォロワー：<?php echo e(Auth::user()->followers()->count()); ?></p>

    <a href="/follow-list">フォローリスト</a>
    <a href="/follower-list">フォロワーリスト</a>
    <a href="/search">ユーザー検索</a>

</div>
<?php /**PATH C:\Users\user\Desktop\cmder\AtlasSNS_iraminatakahiro\resources\views/components/sidebar.blade.php ENDPATH**/ ?>