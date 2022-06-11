<html>
<head>
<title>Homepage</title>
<link href="https://fonts.googleapis.com/css?family=Pangolin:400,700|Proxima+Nova" rel="stylesheet" type="text/css">
<meta charset="utf-8">
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<link rel="stylesheet" href="css/homepage.css">
<script src="js/homepage.js" defer="true"></script>
<meta name="viewport" content="width=device width, initial scale=1">
</head>
<body>

    <nav>
        <div id="box1">
            <img id="logo" src="img/logo1.png">
            <div class="nome">
                <?php echo e(session('nome')); ?> 
                <?php echo e(session('cognome')); ?> 
            </div>
        </div>
        <div class="link">
            <a href='<?php echo e(route('profilo')); ?>'>Profilo</a>
            <a href='<?php echo e(route('cerca')); ?>'> Cerca </a>
            
        </div>
    </nav>



    <section id="menu">        
        <img id="logoimg" src="img/logo.png">
        <h2>MyLibrary</h2>
        <h3>Everything you like</h3>

    </section>
    <section id="rubrica">
        <h2>Profili consigliati:</h2>

        <div class="email">
            <img class="fotoprofilo" src="img/persona.png" >
            <span class="nome_email"></span>   <!--fotoprofilo!-->
        </div>

    </section>

    <div id="modale" class="hidden">
        <div id="flex0">
            <div id="picture"></div>
            <div id="flex1">
                <div id="info"></div>
                <div id="commento"></div>
                <form id="insert">
                    <label for="insert">Commenta la foto:</label>
                    <input type="text" id="testo_c">
                </form>
            </div>
        </div>
        <div id="exit">x</div>
    </div>

    <section id="pagina">
        
        <div id="post_template" class="hidden">
            <div class="post">
                <div class="nome"></div>
                <div class="foto"></div>
                <div class="like">
                    <div class="likebox"></div>
                    <div class="nlikes"></div>
                </div>
                
            </div>
        </div>       

    </section>

    <footer>
        <div>
            <span>Lorenzo Greco</span>
            <span>1000001091</span>
            <span>MyLibrary</span>
        </div>
    </footer>



</body><?php /**PATH C:\xampp\htdocs\hw2\resources\views/home.blade.php ENDPATH**/ ?>