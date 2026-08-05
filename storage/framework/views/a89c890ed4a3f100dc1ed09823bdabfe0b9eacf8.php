

<?php $__env->startSection('content'); ?>


<div class="post-create-area">

    
    <?php if($errors->any()): ?>
        <div class="validation-errors">
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <p><?php echo e($error); ?></p>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endif; ?>

    
    <?php if(session('success')): ?>
        <p class="success-message">
            <?php echo e(session('success')); ?>

        </p>
    <?php endif; ?>

    <form action="<?php echo e(url('/post/create')); ?>" method="POST" class="post-create-form">
        <?php echo csrf_field(); ?>

        <img
            src="<?php echo e(Auth::user()->images); ?>"
            alt="<?php echo e(Auth::user()->username); ?>のアイコン"
            class="post-create-icon"
        >

        <textarea
            name="post"
            class="post-create-textarea"
            placeholder="投稿内容を入力してください"
            maxlength="150"
        ><?php echo e(old('post')); ?></textarea>

        <button type="submit" class="post-create-button">
            投稿
        </button>
    </form>
</div>



<div class="post-list">

    <?php $__empty_1 = true; $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="post-box">

            
            <img
                src="<?php echo e($post->user->images); ?>"
                alt="<?php echo e($post->user->username); ?>のアイコン"
                class="post-icon"
            >

            <div class="post-main">

                <div class="post-header">
                    
                    <p class="post-username">
                        <?php echo e($post->user->username); ?>

                    </p>

                    
                    <p class="post-date">
                        <?php echo e($post->created_at->format('Y-m-d H:i')); ?>

                    </p>
                </div>

                
                <p class="post-text">
                    <?php echo e($post->post); ?>

                </p>
            </div>

            
            <?php if($post->user_id === Auth::id()): ?>
                <div class="post-actions">

                    
                    <button
                        type="button"
                        class="edit-btn"
                        data-id="<?php echo e($post->id); ?>"
                        data-post="<?php echo e($post->post); ?>"
                    >
                        編集
                    </button>

                    
                    <form
                        action="<?php echo e(url('/post/delete')); ?>"
                        method="POST"
                        class="delete-form";
                    >
                        <?php echo csrf_field(); ?>


                        <button type="button"
                        class="delete-btn"
                        data-id="<?php echo e($post->id); ?>">削除
                    </button>
                    </form>

                </div>
            <?php endif; ?>

        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <p class="no-post-message">
            まだ投稿がありません。
        </p>
    <?php endif; ?>

</div>



<div id="editModal" class="modal">

    <div class="modal-content">

        <form action="<?php echo e(url('/post/update')); ?>" method="POST">
            <?php echo csrf_field(); ?>

            <input
                type="hidden"
                name="id"
                id="editPostId"
            >

            <textarea
                name="post"
                id="editPostText"
                maxlength="150"
            ></textarea>

            <button type="submit" class="update-btn">
                更新
            </button>

            <button
                type="button"
                id="closeEditModal"
                class="modal-close-btn"
            >
                キャンセル
            </button>
        </form>

    </div>

</div>



<div id="deleteModal" class="modal">

    <div class="modal-content delete-modal-content">

        <p class="delete-confirm-message">
            この投稿を削除しますか？
        </p>

        <form action="<?php echo e(url('/post/delete')); ?>" method="POST">
            <?php echo csrf_field(); ?>

            <input
                type="hidden"
                name="id"
                id="deletePostId"
            >

            <div class="delete-modal-actions">

                <button type="submit" class="delete-confirm-btn">
                    削除する
                </button>

                <button
                    type="button"
                    id="closeDeleteModal"
                    class="modal-close-btn"
                >
                    キャンセル
                </button>

            </div>
        </form>

    </div>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\Desktop\cmder\AtlasSNS_iraminatakahiro\resources\views/top.blade.php ENDPATH**/ ?>