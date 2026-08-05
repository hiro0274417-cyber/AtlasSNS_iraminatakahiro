<h1>ユーザー詳細ページ</h1>

<div class="profile-box">

    
    <img src="<?php echo e($target->images); ?>" class="profile-icon">

    
    <p class="profile-username"><?php echo e($target->username); ?></p>

    
    <p class="profile-bio"><?php echo e($target->bio); ?></p>

    
    <?php if($isFollow): ?>
        <form action="/unfollow/<?php echo e($target->id); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <button class="unfollow-btn">フォロー解除</button>
        </form>
    <?php else: ?>
        <form action="/follow/<?php echo e($target->id); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <button class="follow-btn">フォローする</button>
        </form>
    <?php endif; ?>

</div>

<hr>

<h2>投稿一覧</h2>

<?php $__currentLoopData = $target->posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="profile-post-box">

    
    <img src="<?php echo e($target->images); ?>" class="profile-post-icon">

    
    <p class="profile-post-username"><?php echo e($target->username); ?></p>

    
    <p class="profile-post-text"><?php echo e($post->post); ?></p>

    
    <p class="profile-post-date"><?php echo e($post->created_at); ?></p>

</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\Users\user\Desktop\cmder\AtlasSNS_iraminatakahiro\resources\views/users/profile.blade.php ENDPATH**/ ?>