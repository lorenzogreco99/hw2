<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?> <?php echo $__env->yieldContent('title'); ?></title>

    <link rel="icon" type="image/png" href="<?php echo e(asset('favicon.png')); ?>">
    <link rel="preload" href="<?php echo e(asset('images/user.svg')); ?>" as="image">
    <link rel="preload" href="<?php echo e(asset('images/user_h.svg')); ?>" as="image">
    <link rel="preload" href="<?php echo e(asset('images/user_hd.svg')); ?>" as="image">
    <link rel="preload" href="<?php echo e(asset('images/sun.svg')); ?>" as="image">
    <link rel="preload" href="<?php echo e(asset('images/sun_h.svg')); ?>" as="image">
    <link rel="preload" href="<?php echo e(asset('images/moon.svg')); ?>" as="image">
    <link rel="preload" href="<?php echo e(asset('images/moon_h.svg')); ?>" as="image">
    <link rel="preload" href="<?php echo e(asset('images/logout.svg')); ?>" as="image">
    <link rel="preload" href="<?php echo e(asset('images/logout_h.svg')); ?>" as="image">
    <link rel="preload" href="<?php echo e(asset('images/logout_hd.svg')); ?>" as="image">
    <link rel="preload" href="<?php echo e(asset('images/language.svg')); ?>" as="image">
    <link rel="preload" href="<?php echo e(asset('images/language_h.svg')); ?>" as="image">
    <link rel="preload" href="<?php echo e(asset('images/language_hd.svg')); ?>" as="image">
    <link rel='stylesheet' href='<?php echo e(asset('css/main.css')); ?>'>
    <?php echo $__env->yieldContent('style'); ?>
    <script type="text/javascript">
    const CSFR_TOKEN = '<?php echo e(csrf_token()); ?>';
    const DARK_ROUTE = '<?php echo e(route('user.dark')); ?>';
    <?php echo $__env->yieldContent('extra_routes'); ?>
    </script>
    <script src="<?php echo e(asset('js/main.js')); ?>" defer></script>
    <?php echo $__env->yieldContent('script'); ?>
    
</head>
<body <?php if($user['dark']): ?> class="dark" <?php endif; ?>>
    <header>
        <nav>
            <div id="s_nav" <?php if($user['pm']): ?> class="newmessages" <?php endif; ?>>
            </div>
            <div class="l_nav">
                <h1>Agorà</h1>
                <a href="<?php echo e(route('home')); ?>" <?php if(Request::routeIs('home')): ?> class="here" <?php endif; ?>>Home</a>
            </div>
            <div class="r_nav">
                <div class="profile">
                    <div class="avatar"><img src="<?php echo e($user['propic']); ?>"></div>
                    <div class="drop">
                    <a class="darkmode"><?php echo app('translator')->get('main.darkmode'); ?></a><br>
                    <?php switch(session()->get('locale')):
                    case ('it'): ?>
                    <a href="<?php echo e(route('setlanguage', ['locale' => 'en'])); ?>" class="language">English</a>
                    <?php break; ?> 
                    <?php default: ?> 
                    <a href="<?php echo e(route('setlanguage', ['locale' => 'it'])); ?>" class="language">Italiano</a>
                    <?php endswitch; ?>
                    <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="logout"><?php echo e(__('Logout')); ?></a>
                    </div>
                </div>
                <a href="<?php echo e(route('create')); ?>" class="newpost <?php if(Request::routeIs('search')): ?> here <?php endif; ?>"><?php echo app('translator')->get('main.newpost'); ?></a>     
            </div>
        </nav>

    <?php echo $__env->yieldContent('head_content'); ?>

    </header>

    <?php echo $__env->yieldContent('main_content'); ?>

    <section id="sidenav" class="invisible hidden">
        <div class="bar" id="sidenav_content">
            <div class="profile">
                <div class="avatar" style="background-image: url(<?php echo e($user['propic']); ?> )">
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
            </div>
            <a href="<?php echo e(route('home')); ?>"   <?php if(Request::routeIs('home')): ?> class="here" <?php endif; ?>>Home</a>
            <a href="<?php echo e(route('create')); ?>" <?php if(Request::routeIs('create')): ?> class="here" <?php endif; ?>><?php echo app('translator')->get('main.newpost'); ?></a>
            <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><?php echo e(__('Logout')); ?></a>
            <button class="darkmode"></button>
        </div>
    </section>

    <?php echo $__env->yieldContent('extra_content'); ?>

    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
        <?php echo csrf_field(); ?>
    </form>
</body>
</html>


<?php /**PATH C:\xampp\htdocs\esercitazione_laravel\resources\views/layouts/app.blade.php ENDPATH**/ ?>