<html>
<head>
<title>Profilo</title>
<link href="https://fonts.googleapis.com/css?family=Pangolin:400,700|Proxima+Nova" rel="stylesheet" type="text/css">
<meta charset="utf-8">
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<link rel="stylesheet" href="css/profilo.css">
<script src="js/profilo.js" defer="true"></script>
<meta name="viewport" content="width=device width, initial scale=1">
</head>
<body>

    <nav>
        <img id="logo" src="img/logo1.png">
        <div class="link">
            <a href='<?php echo e(route('home')); ?>'>Homepage</a>
            <a href='<?php echo e(route('logout')); ?>'> Logout </a>
        </div>
    </nav>
    
    <div id="modale" class="hidden">
        <div id="flex0">
            <div id="picture"></div>
            <div id="flex1">
                <div id="info"></div>
                <div id="commento"></div>
            </div>
        </div>
        <div id="exit">x</div>

    </div>
    
    <section id="pagina">    
            <div id="nome">
                <?php echo e(session('nome')); ?> 
                <?php echo e(session('cognome')); ?> 
            </div>
            <div id="dati">
                <div>
                    <p>Email: </p>
                        <?php echo e(session('email')); ?> 
                </div>
                <div>
                    <p>Username: </p>
                        <?php echo e(session('username')); ?> 
                </div>
            </div>
    </section>

    <h2>La mia libreria</h2>

    <div id=album>

    </div>
    

    <footer>
        <div>
            <span>Lorenzo Greco</span>
            <span>1000001091</span>
            <span>MyLibrary</span>
        </div>
    </footer>
</body>

</html><?php /**PATH C:\xampp\htdocs\hw2\resources\views/profilo.blade.php ENDPATH**/ ?>