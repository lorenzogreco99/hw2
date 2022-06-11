<!DOCTYPE html>
<html>

<head>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Pangolin:400,700|Proxima+Nova" rel="stylesheet" type="text/css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Registrati</title>
    <link rel="stylesheet" href="css/registrati.css">
    <script src="js\registrati.js" defer="true"></script>

</head>

<body>

    <section>
        <div class="page">
            <h1>Benvenuto!</h1>
            
            <img id="logoimg" src="img/logo.png">
            <h2>MyLibrary</h2>
        </div>
        <div class="page">
            <form name='signup' method='post' action="<?php echo e(route('register')); ?>">
                <input name='_token' type="hidden" value='".csrf_token()."'>
                <?php echo csrf_field(); ?>
                <div id="nome" class="blocco">
                    <div class="box">
                        <label for="name">Nome</label>
                        <input type="text" name="name" value='<?php echo e(old('name')); ?>'>
                    </div>
                    <span>Nome non adatto</span>
                </div>

                <div id="cognome"class="blocco">
                    <div Class="box">
                        <label for="surname">Cognome</label>
                        <input type="text" name="surname" value='<?php echo e(old('surname')); ?>'>
                    </div>
                    <span>Cognome non adatto</span>
                </div>

                <div id="username"class="blocco">
                    <div Class="box">
                        <label for="username">Username</label>
                        <input type="text" name="username">
                    </div>
                    <span id="nomeutente">Nome utente non disponibile</span>
                </div>

                <div id="email"class="blocco">
                    <div Class="box">
                        <label for="email">Email</label>
                        <input type="text" name="email">
                    </div>
                    <span id="email_r">Indirizzo email non valido</span>
                </div>

                <div id="password"class="blocco">
                    <div Class="box">
                        <label for='password'>Password</label>
                        <input type='password' name='password'>
                    </div>
                    <span>Inserisci almeno 8 caratteri</span>
                </div>

                <div id="password_conf"class="blocco">
                    <div Class="box">
                        <label for='password_conf'> Conferma Password</label>
                        <input type='password' name='password_conf'>
                    </div>
                    <span>Le password non coincidono</span>
                </div>

                <div id="submit">
                    <input type='submit' value="Registrati">
                </div>
            </form>
            <div class="signup">Hai già un account ? <a href="<?php echo e(route('login')); ?>">Fai il login !</a></div>
        </div>
    </section>



</body>

</html><?php /**PATH C:\xampp\htdocs\hw2\resources\views/registrati.blade.php ENDPATH**/ ?>