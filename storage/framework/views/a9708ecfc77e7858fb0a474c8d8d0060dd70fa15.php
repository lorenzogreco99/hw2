<?php $__env->startSection('profile'); ?>
<section id="profile" data-user="<?php echo e($user['username']); ?>">        
    <div class="avatar" style="background-image: url(<?php echo e($user['propic']); ?>)">
    </div>
    <div class="name">
        <?php echo e($user['fullname']); ?> 
        <?php if($user['verified']): ?> 
            <span class='verified'></span> 
        <?php endif; ?>
    </div>
    <div class="username">
        <?php echo e('@'.$user['username']); ?> 
    </div>
    <div class="stats">
        <div>
            <span class="count"><?php echo e($user['nposts']); ?> </span><br>Posts
        </div>
        <div id="view_followers">
            <span class="count"><?php echo e($user['nfollowers']); ?> </span><br><?php echo app('translator')->get('main.followers'); ?>
        </div>
        <div id="view_following">
            <span class="count"><?php echo e($user['nfollowing']); ?> </span><br><?php echo app('translator')->get('main.following'); ?>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('feed_route'); ?><?php echo e(route('feed')); ?><?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.feed', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\esercitazione_laravel\resources\views/home.blade.php ENDPATH**/ ?>