<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>AtlasSNS</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>

    
    <?php echo $__env->make('components.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <div class="main-container">

        
        <?php echo $__env->make('components.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        
        <div class="content">
            <?php echo $__env->yieldContent('content'); ?>
        </div>

    </div>
          <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
          <script src="/js/script.js"></script>

</body>
</html>
<?php /**PATH C:\Users\user\Desktop\cmder\AtlasSNS_iraminatakahiro\resources\views/layouts/app.blade.php ENDPATH**/ ?>