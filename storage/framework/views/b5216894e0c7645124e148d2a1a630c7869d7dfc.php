

<?php $__env->startSection('content'); ?>

<h1>プロフィール編集</h1>

<div class="edit-profile-box">

    
    <img src="<?php echo e($user->images); ?>" class="edit-profile-icon">

    <form action="/profile/update" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>

        
        <label>ユーザー名</label>
        <input type="text" name="username" value="<?php echo e($user->username); ?>">

        
        <label>メールアドレス</label>
        <input type="email" name="email" value="<?php echo e($user->email); ?>">

        
        <label>自己紹介文</label>
        <textarea name="bio"><?php echo e($user->bio); ?></textarea>

        
        <label>パスワード</label>
        <input type="password" name="password">

        
        <label>パスワード確認</label>
        <input type="password" name="password_confirmation">

        
        <label>アイコン画像</label>
        <input type="file" name="images">

        <button type="submit" class="edit-submit-btn">更新する</button>
    </form>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\Desktop\cmder\AtlasSNS_iraminatakahiro\resources\views/users/edit.blade.php ENDPATH**/ ?>