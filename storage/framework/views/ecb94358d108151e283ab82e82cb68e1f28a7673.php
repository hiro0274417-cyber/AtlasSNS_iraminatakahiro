

<?php $__env->startSection('content'); ?>

<div class="user-profile-page">

    
    <?php if(session('success')): ?>
        <p class="success-message">
            <?php echo e(session('success')); ?>

        </p>
    <?php endif; ?>

    
    <div class="user-profile-header">

        <img
            src="<?php echo e($target->images); ?>"
            alt="<?php echo e($target->username); ?>のアイコン"
            class="user-profile-icon"
        >

        <div class="user-profile-information">

            <div class="user-profile-name-row">

                <h1 class="user-profile-name">
                    <?php echo e($target->username); ?>

                </h1>

                <div class="user-profile-action">

                    
                    <?php if($isOwnProfile): ?>

                        <a
                            href="<?php echo e(url('/profile/edit')); ?>"
                            class="profile-edit-link"
                        >
                            プロフィール編集
                        </a>

                    
                    <?php elseif($isFollow): ?>

                        <form
                            action="<?php echo e(url('/unfollow/' . $target->id)); ?>"
                            method="POST"
                        >
                            <?php echo csrf_field(); ?>

                            <button
                                type="submit"
                                class="unfollow-button"
                            >
                                フォロー解除
                            </button>
                        </form>

                    <?php else: ?>

                        <form
                            action="<?php echo e(url('/follow/' . $target->id)); ?>"
                            method="POST"
                        >
                            <?php echo csrf_field(); ?>

                            <button
                                type="submit"
                                class="follow-button"
                            >
                                フォローする
                            </button>
                        </form>

                    <?php endif; ?>

                </div>

            </div>

            <p class="user-profile-bio">
                <?php echo e($target->bio ?: '自己紹介文はまだ登録されていません。'); ?>

            </p>

        </div>

    </div>

    
    <div class="user-profile-posts">

        <h2 class="user-profile-post-title">
            投稿一覧
        </h2>

        <?php $__empty_1 = true; $__currentLoopData = $target->posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

            <div class="user-profile-post-box">

                <img
                    src="<?php echo e($target->images); ?>"
                    alt="<?php echo e($target->username); ?>のアイコン"
                    class="user-profile-post-icon"
                >

                <div class="user-profile-post-main">

                    <div class="user-profile-post-header">

                        <p class="user-profile-post-name">
                            <?php echo e($target->username); ?>

                        </p>

                        <p class="user-profile-post-date">
                            <?php echo e($post->created_at->format('Y-m-d H:i')); ?>

                        </p>

                    </div>

                    <p class="user-profile-post-text">
                        <?php echo e($post->post); ?>

                    </p>

                </div>

            </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

            <p class="user-profile-no-post">
                投稿はまだありません。
            </p>

        <?php endif; ?>

    </div>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\Desktop\cmder\AtlasSNS_iraminatakahiro\resources\views/users/profile.blade.php ENDPATH**/ ?>