<h1>検索結果</h1>

<?php if($keyword): ?>
    <p>「<?php echo e($keyword); ?>」の検索結果</p>
<?php endif; ?>

<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="search-user-box">
        <p><?php echo e($user->username); ?></p>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\Users\user\Desktop\cmder\AtlasSNS_iraminatakahiro\resources\views/search/search.blade.php ENDPATH**/ ?>