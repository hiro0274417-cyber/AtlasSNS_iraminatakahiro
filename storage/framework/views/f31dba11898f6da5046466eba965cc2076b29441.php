
<?php $__env->startSection('content'); ?>

<h1>フォローリスト</h1>

<?php $__currentLoopData = $followings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $follow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="follow-user-box">

    <a href="/user/profile/<?php echo e($follow->followedUser->id); ?>">
        <img src="<?php echo e($follow->followedUser->images); ?>" class="follow-user-icon">
    </a>

    <p class="follow-username"><?php echo e($follow->followedUser->username); ?></p>

    <?php $__currentLoopData = $follow->followedUser->posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="follow-post-box">
            <p class="follow-post-text"><?php echo e($post->post); ?></p>
            <p class="follow-post-date"><?php echo e($post->created_at); ?></p>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\Desktop\cmder\AtlasSNS_iraminatakahiro\resources\views/follows/followList.blade.php ENDPATH**/ ?>