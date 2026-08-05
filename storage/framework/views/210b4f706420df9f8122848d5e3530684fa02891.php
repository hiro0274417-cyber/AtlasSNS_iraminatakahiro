

<?php $__env->startSection('content'); ?>

<div class="user-search-page">

    <h1 class="user-search-title">
        ユーザー検索
    </h1>

    
    <form
        action="<?php echo e(route('users.search')); ?>"
        method="GET"
        class="user-search-form"
    >
        <input
            type="text"
            name="keyword"
            value="<?php echo e($keyword); ?>"
            placeholder="ユーザー名を入力してください"
            class="user-search-input"
        >

        <button type="submit" class="user-search-button">
            検索
        </button>
    </form>

    
    <?php if($keyword !== ''): ?>
        <p class="search-keyword">
            検索ワード：<?php echo e($keyword); ?>

        </p>
    <?php endif; ?>

    
    <div class="search-user-list">

        <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="search-user-box">

                <a
                    href="<?php echo e(url('/user/profile/' . $user->id)); ?>"
                    class="search-user-profile"
                >
                    <img
                        src="<?php echo e($user->images); ?>"
                        alt="<?php echo e($user->username); ?>のアイコン"
                        class="search-user-icon"
                    >

                    <span class="search-user-name">
                        <?php echo e($user->username); ?>

                    </span>
                </a>

            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <p class="search-no-result">
                該当するユーザーはいません。
            </p>
        <?php endif; ?>

    </div>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\Desktop\cmder\AtlasSNS_iraminatakahiro\resources\views/users/search.blade.php ENDPATH**/ ?>