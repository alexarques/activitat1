<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link href="/style.css" rel="stylesheet" type="text/css">
    <title>Login</title>
</head>
<body>
    <header>
    </header>
    <aside>
        <ul>
            <li>
                <a href="?url=home">Home</a>
            </li>
        </ul>
        <br>
</aside>
<main>
    <form action="?url=login_action" method="post">
        <input type="username" name="username" placeholder="Introduce tu usuario" value=<?php if(isset($_COOKIE["remember"])){echo $_COOKIE["username"];}?>><br>
        <input type="password" name="password" placeholder="Introduce tu contraseña" value=<?php if(isset($_COOKIE["remember"])){echo $_COOKIE["password"];}?>><br>
        <label style="color:red;"><?php echo $_SESSION["error"]; ?></label><br><br>
        <button type="submit" name="login">Login</button><br><br>
        <input type="checkbox" id="remember" name="remember" <?php if(isset($_COOKIE["remember"])){ echo "checked";}?>><label for="remember">Remember me</label>
</body>
</html>