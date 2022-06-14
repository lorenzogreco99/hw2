<!DOCTYPE html>
<html>

<head>

    <link href="https://fonts.googleapis.com/css?family=Pangolin:400,700|Proxima+Nova">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    

    <section>
    <h1>Benvenuto!</h1>
        
        <img id="logoimg" src="img/logo.png">
        <h2>MyLibrary</h2>

        <form name='login' method='post' action="{{ route('login') }}">
            @csrf
            <label id="email">
                <label for='email'>Email</label>
                <input type='text' name='email'>
            </label>
            <label id="password">
                <label for='password'>Password</label>
                <input type='password' name='password'>
            </label>
            <label id="submit">
                <input type='submit' value="Accedi">
            </label>
            <span id="error">{{ session('status') }}</span>
        </form>
        <div id="registati">Non hai un account ? <a href="{{ route('register') }}">Registrati !</a></div>
    </section>



</body>

</html>
