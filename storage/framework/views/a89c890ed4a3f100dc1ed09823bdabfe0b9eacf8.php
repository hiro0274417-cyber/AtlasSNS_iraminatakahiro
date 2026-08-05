
<?php $__env->startSection('content'); ?>


<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="post-box">

        
        <?php if($post->user_id === Auth::id()): ?>
            <button class="edit-btn"
                    data-id="<?php echo e($post->id); ?>"
                    data-post="<?php echo e($post->post); ?>">
                <img src="/images/edit.png" alt="編集">
            </button>

            
            <form action="/post/delete" method="POST" class="delete-form">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="id" value="<?php echo e($post->id); ?>">
                <button type="submit" class="delete-btn">
                    <img src="/images/delete.png" class="delete-img" alt="削除">
                </button>
            </form>
        <?php endif; ?>

        
        <img src="<?php echo e($post->user->images); ?>" class="post-icon">

        
        <p class="post-username"><?php echo e($post->user->username); ?></p>

        
        <p><?php echo e($post->post); ?></p>

        
        <p class="post-date"><?php echo e($post->created_at); ?></p>

    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



<div id="editModal" class="modal">
    <div class="modal-content">
        <form action="/post/update" method="POST">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="id" id="editPostId">
            <textarea name="post" id="editPostText"></textarea>
            <button type="submit" class="update-btn">
                <img src="/images/update.png" alt="更新">
            </button>
        </form>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\Desktop\cmder\AtlasSNS_iraminatakahiro\resources\views/top.blade.php ENDPATH**/ ?>