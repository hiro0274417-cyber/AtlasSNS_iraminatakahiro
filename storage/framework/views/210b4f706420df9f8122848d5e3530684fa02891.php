
<?php $__env->startSection('content'); ?>

 <h1>ユーザー検索</h1>

 <form action="/search" method="GET">
    <input type="text" name="keyword" placeholder="ユーザー名を検索" value="<?php echo e($keyword ?? ''); ?>">
    <button type="submit">検索</button>
 </form>

 
 <?php if(isset($users)): ?>
    <h2>検索結果</h2>

    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="search-user-box">
            <a href="/user/profile/<?php echo e($user->id); ?>">
                <?php echo e($user->username); ?>

            </a>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 <?php endif; ?>

 <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\Desktop\cmder\AtlasSNS_iraminatakahiro\resources\views/users/search.blade.php ENDPATH**/ ?>