<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link href="/style.css" rel="stylesheet" type="text/css"> 
    <title>Register</title>
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
    <form action="?url=register_action" method="post">
        <input type="username" name="username" placeholder="Nombre de usuario"><br>
        <input type="email" name="email" placeholder="Email"><br>
        <input type="password" name="password" placeholder="Introduce tu contraseña"><br>
        <input type="password" name="password2" placeholder="Introduce tu contraseña de nuevo"><br>
        <label style="color:red;"><?php echo $_SESSION["error_reg"]; ?></label><br><br>
        <select name="rol">
            <option value="1">Alumne</option> 
            <option value="2">Profesor</option> 
        </select><br><br>
        <button type="submit" name="register">Register</button><br><br>
</body>
</html>