<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?> <?php echo $__env->yieldContent('title'); ?></title>

    <link rel="icon" type="image/png" href="<?php echo e(asset('favicon.png')); ?>">
    <link rel='stylesheet' href='<?php echo e(asset('css/guest.css')); ?>'>
    <?php echo $__env->yieldContent('script'); ?>
    
</head>
<body>
    <main>
        <section class="main_left">
            
        </section>
        <section class="main_right">
            <?php echo $__env->yieldContent('content'); ?>
        </section>
    </main>
</body>
</html>


<!--
<a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
<?php echo e(__('Logout')); ?>

</a>
<form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
    <?php echo csrf_field(); ?>
</form>
--><?php /**PATH C:\xampp\htdocs\esercitazione_laravel\resources\views/layouts/guest.blade.php ENDPATH**/ ?>