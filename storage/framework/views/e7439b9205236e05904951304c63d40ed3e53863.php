

<?php $__env->startSection('title', '| Nuovo post'); ?>

<?php $__env->startSection('head_content'); ?>
<section id="newpost">
    <form autocomplete="off" data-route="<?php echo e(route('create')); ?>">
    <h1><?php echo app('translator')->get('main.share'); ?></h1>
        <label><input type="radio" name="type" value="text">✒️ <?php echo app('translator')->get('main.think'); ?></label>
        <label><input type="radio" name="type" value="giphy">🖼️ GIF</label>
        <label><input type="radio" name="type" value="spotify">🎵 <?php echo app('translator')->get('main.music'); ?></label>
        <label><input type="radio" name="type" value="youtube">📺 Video</label>
        <label><input type="radio" name="type" value="unsplash">📷 <?php echo app('translator')->get('main.photo'); ?></label>
        <label><input type="radio" name="type" value="cat">🐈 <?php echo app('translator')->get('main.cat'); ?></label>
        <br><input type="text" name="search" id="searchbox" placeholder="Cerca">
        <div class="catgen"><button id="catgen"><?php echo app('translator')->get('main.gencat'); ?></button></div>
        <div class="think"><button id="think"><?php echo app('translator')->get('main.write'); ?></button></div>
        <br><input type="submit" value="Cerca">
        <div class="giphy">Powered by  <div></div></div>
        <div class="spotify">Powered by  <div></div></div>
        <div class="youtube">Powered by  <div></div></div>
        <div class="unsplash">Powered by  <div></div></div>
        <div class="cat">Powered by <b>TheCatApi.com</b></div>
    </form>

</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main_content'); ?>
<section class="container">
    <div id="results">
        
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('extra_content'); ?>
<section id="title_modal" class="hidden invisible">
<div class="window">
    <div id="title_form">
        <button id="close_modal"><?php echo app('translator')->get('main.close'); ?></button>
        <h2><?php echo app('translator')->get('main.addsomething'); ?></h2>    
        <form action="<?php echo e(route('create.do')); ?>"">
            <?php echo csrf_field(); ?>
            <input type="submit">
            <textarea name="text"></textarea>
        </form>
        <div id="modal_preview">
        </div>
    </div>
    <div id="dispatch_result">
        <div id="dispatch_result_success" class="hidden invisible">
            <svg id="successAnimation" xmlns="http://www.w3.org/2000/svg" width="150" height="150" viewBox="0 0 70 70">
            <circle id="successAnimationCircle" cx="35" cy="35" r="24" stroke="#005596" stroke-width="2" stroke-linecap="round" fill="transparent"/>
            <polyline id="successAnimationCheck" stroke="#005596" stroke-linecap="round" stroke-width="2" points="23 34 34 43 47 27" fill="transparent"/>
            </svg><br>
            <span><?php echo app('translator')->get('main.postsuccess'); ?></span><br>
            <button id="modal_newpost_success"><?php echo app('translator')->get('main.newpost'); ?></button><br>
            <a href="<?php echo e(route('home')); ?>"><?php echo app('translator')->get('main.gotohome'); ?></a>
        </div>
        <div id="dispatch_result_fail" class="hidden invisible">
            <svg id="failureAnimation" xmlns="http://www.w3.org/2000/svg" width="150" height="150" viewBox="0 0 70 70">
            <circle id="failureAnimationCircle" cx="35" cy="35" r="24" stroke="#005596" stroke-width="2" stroke-linecap="round" fill="transparent"/>
            <polyline class="failureAnimationCheckLine" stroke="#005596" stroke-width="2" stroke-linecap="round" points="25,25 45,45" fill="transparent" />
            <polyline class="failureAnimationCheckLine" stroke="#005596" stroke-width="2" stroke-linecap="round" points="45,25 25,45" fill="transparent" />
            </svg><br>
            <span><?php echo app('translator')->get('main.postfailed'); ?></span><br>
            <button id="modal_newpost_fail"><?php echo app('translator')->get('main.retry'); ?></button><br>
            <a href="<?php echo e(route('home')); ?>"><?php echo app('translator')->get('main.gotohome'); ?></a>
        </div>
    </div>
</div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<link rel='stylesheet' href='<?php echo e(asset('css/create.css')); ?>'>
<link rel="preload" href="<?php echo e(asset('images/loading.svg')); ?>" as="image">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src='<?php echo e(asset('js/create.js')); ?>' defer></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('extra_routes'); ?>
    const CREATE_ROUTE = '<?php echo e(route('create')); ?>';
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\esercitazione_laravel\resources\views/create.blade.php ENDPATH**/ ?>