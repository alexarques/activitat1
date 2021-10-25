<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link href="style.css" rel="stylesheet" type="text/css">
    <title>Home</title>
</head>
<body>
    <header>
        <h1><?php 
            session_start();
            if(isset($_SESSION["username"])){
            echo "Bienvenido ".$_SESSION["username"];
            echo "<br>";
            echo "<h5>Registrado desde: ".$_SESSION["date"]."</h5>";
            echo "<br>";
        } ?></h1>
    </header>
    <aside>
        <ul>
            <?php if($_SESSION["username"]==null){?>
            <li>
                <a href="?url=login">Login</a>
            </li>
            <li>
                <a href="?url=register">Register</a>
            </li>
            <?php }?>
            <?php if(isset($_SESSION["username"])){?>
            <li>
                <a href="?url=logout_action">Log out</a>
            </li>
        </ul>
        <?php }?>
</body>
</html>