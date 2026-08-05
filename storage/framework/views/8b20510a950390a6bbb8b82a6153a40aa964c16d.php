
<?php $__env->startSection('content'); ?>

<h1>フォロワーリスト</h1>

<?php $__currentLoopData = $followers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $follower): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="follower-user-box">

    
    <a href="/user/profile/<?php echo e($follower->followingUser->id); ?>">
        <img src="<?php echo e($follower->followingUser->images); ?>" class="follower-user-icon">
    </a>

    
    <p class="follower-username"><?php echo e($follower->followingUser->username); ?></p>

    
    <?php $__currentLoopData = $follower->followingUser->posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="follower-post-box">
            <p class="follower-post-text"><?php echo e($post->post); ?></p>
            <p class="follower-post-date"><?php echo e($post->created_at); ?></p>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\Desktop\cmder\AtlasSNS_iraminatakahiro\resources\views/follows/followerList.blade.php ENDPATH**/ ?>