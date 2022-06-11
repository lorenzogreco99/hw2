<?php $__env->startSection('style'); ?>
<link rel='stylesheet' href='<?php echo e(asset('css/feed.css')); ?>'>
<link rel="preload" href="<?php echo e(asset('images/comment.svg')); ?>" as="image">
<link rel="preload" href="<?php echo e(asset('images/comment_h.svg')); ?>" as="image">
<link rel="preload" href="<?php echo e(asset('images/comment_hd.svg')); ?>" as="image">
<link rel="preload" href="<?php echo e(asset('images/like.svg')); ?>" as="image">
<link rel="preload" href="<?php echo e(asset('images/like_h.svg')); ?>" as="image">
<link rel="preload" href="<?php echo e(asset('images/like_hd.svg')); ?>" as="image">
<link rel="preload" href="<?php echo e(asset('images/emote.svg')); ?>" as="image">
<link rel="preload" href="<?php echo e(asset('images/emote_h.svg')); ?>" as="image">
<link rel="preload" href="<?php echo e(asset('images/emote_hd.svg')); ?>" as="image">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src='<?php echo e(asset('js/feed.js')); ?>' defer></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main_content'); ?>
<main class="fixed">
    <?php echo $__env->yieldContent('profile'); ?>
    <section class="ghost_feed"></section>
    <section id="suggestion"><?php echo app('translator')->get('main.famous'); ?><br><br></section>
</main>
<main>
   <section class="ghost_profile"></section>
    <section id="feed" data-source="<?php echo $__env->yieldContent('feed_route'); ?>" <?php if(Request::routeIs('profile')): ?> data-profile='true' <?php endif; ?>>
        <template id="post_template">
            <article class="post">
                <div class="userinfo">
                    <div class="avatar">
                        <img src="<?php echo $__env->yieldContent('profile_propic'); ?>">
                    </div>
                    <div class="names">
                        <a <?php echo $__env->yieldContent('profile_link'); ?>>
                        <div class="name"><?php echo $__env->yieldContent('profile_fullname'); ?></div>
                        <div class="username"><?php echo $__env->yieldContent('profile_username'); ?></div>
                        </a>
                    </div>
                    <div class="time"></div>
                </div>
                <div class="content"></div>
                <div class="text"></div>
                <div class="actions">
                    <div class="like"><span></span></div>
                    <div class="comment"><span></span></div>
                </div>
                <div class="comments">
                    <div class="past_messages"></div>
                    <div class="comment_form">
                        <form autocomplete="off">
                            <input type="text" name="comment" maxlength="254" placeholder="<?php echo app('translator')->get('main.comment'); ?>" required="required">
                            <input type="submit">
                            <input type="hidden" name="id">
                        </form>
                        <button class="emotes" data-open="0"></button>
                    </div>
                </div>
            </article>
        </template>
    </section>
    <section class="ghost_suggestion"></section>
</main>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('extra_content'); ?>
<div id="modal" class="hidden invisible"> 
    <div class="window">
        <button id="modal_close"><?php echo app('translator')->get('main.close'); ?></button>
        <div class="modal_desc">Persone a cui piace</div>
        <div id="modal_place">
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('extra_routes'); ?>
const HOME_ROUTE = '<?php echo e(route('home')); ?>';
    const POST_ROUTE = '<?php echo e(route('post')); ?>';
    const LIKE_ROUTE = '<?php echo e(route('post_like')); ?>';
    const NOMORE_LANG = "<?php echo app('translator')->get('main.nomore'); ?>";
    const FOLLOWERS_LANG = '<?php echo app('translator')->get('main.followers'); ?>';
    const FOLLOWING_LANG = '<?php echo app('translator')->get('main.following'); ?>';
    const WHOLIKED_LANG = '<?php echo app('translator')->get('main.wholiked'); ?>';<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\esercitazione_laravel\resources\views/layouts/feed.blade.php ENDPATH**/ ?>