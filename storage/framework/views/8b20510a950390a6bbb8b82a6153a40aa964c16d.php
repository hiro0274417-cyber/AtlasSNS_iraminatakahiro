

<?php $__env->startSection('content'); ?>

<div class="connection-list-page">

    <h1 class="connection-list-title">
        フォロワーリスト
    </h1>

    
    <div class="connection-user-icons">

        <?php $__empty_1 = true; $__currentLoopData = $followers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $follower): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

            <?php if($follower->followingUser): ?>
                <a
                    href="<?php echo e(url('/user/profile/' . $follower->followingUser->id)); ?>"
                    class="connection-user-link"
                >
                    <img
                        src="<?php echo e($follower->followingUser->images); ?>"
                        alt="<?php echo e($follower->followingUser->username); ?>のアイコン"
                        class="connection-user-icon"
                    >
                </a>
            <?php endif; ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

            <p class="connection-empty-message">
                フォロワーはいません。
            </p>

        <?php endif; ?>

    </div>

    
    <div class="connection-post-list">

        <?php $__currentLoopData = $followers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $follower): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <?php if($follower->followingUser): ?>

                <?php $__currentLoopData = $follower->followingUser->posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <div class="connection-post-box">

                        <a
                            href="<?php echo e(url('/user/profile/' . $follower->followingUser->id)); ?>"
                            class="connection-post-user"
                        >
                            <img
                                src="<?php echo e($follower->followingUser->images); ?>"
                                alt="<?php echo e($follower->followingUser->username); ?>のアイコン"
                                class="connection-post-icon"
                            >

                            <span class="connection-post-username">
                                <?php echo e($follower->followingUser->username); ?>

                            </span>
                        </a>

                        <div class="connection-post-main">

                            <p class="connection-post-date">
                                <?php echo e($post->created_at->format('Y-m-d H:i')); ?>

                            </p>

                            <p class="connection-post-text">
                                <?php echo e($post->post); ?>

                            </p>

                        </div>

                    </div>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php endif; ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\Desktop\cmder\AtlasSNS_iraminatakahiro\resources\views/follows/followerList.blade.php ENDPATH**/ ?>