

<?php $__env->startSection('content'); ?>

<div class="profile-edit-page">

    <h1 class="profile-edit-title">
        プロフィール編集
    </h1>

    
    <?php if($errors->any()): ?>
        <div class="validation-errors">
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <p><?php echo e($error); ?></p>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endif; ?>

    <form
        action="<?php echo e(url('/profile/update')); ?>"
        method="POST"
        enctype="multipart/form-data"
        class="profile-edit-form"
    >
        <?php echo csrf_field(); ?>

        <div class="profile-edit-row">

            <label>
                アイコン画像
            </label>

            <input
                type="file"
                name="images"
            >

        </div>

        <div class="profile-edit-row">

            <label>
                ユーザー名
            </label>

            <input
                type="text"
                name="username"
                value="<?php echo e(old('username', $user->username)); ?>"
            >

        </div>

        <div class="profile-edit-row">

            <label>
                メールアドレス
            </label>

            <input
                type="email"
                name="email"
                value="<?php echo e(old('email', $user->email)); ?>"
            >

        </div>

        <div class="profile-edit-row">

            <label>
                自己紹介
            </label>

            <textarea
                name="bio"
                rows="5"
            ><?php echo e(old('bio', $user->bio)); ?></textarea>

        </div>

        <button
            type="submit"
            class="profile-update-button"
        >
            更新
        </button>

    </form>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\Desktop\cmder\AtlasSNS_iraminatakahiro\resources\views/users/edit.blade.php ENDPATH**/ ?>