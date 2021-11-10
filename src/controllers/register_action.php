<?php
//session_start();

//require APP."/src/db/database.php";
require APP."/config.php";
require APP."/lib/conn.php";
//require APP."/lib/lib.php";

$username = filter_input(INPUT_POST, "username");
$email = filter_input(INPUT_POST, "email");
$password = filter_input(INPUT_POST, "password");
$password2 = filter_input(INPUT_POST, "password2");
$rol = filter_input(INPUT_POST, "rol");
$date = date(d."/".m."/".y);
$_SESSION["date"] = $date;
//$password_h = password_hash($password, "PASSWORD_DEFAULT",['const'=>4]);
//$password2_h = password_hash($password2, "PASSWORD_DEFAULT",['const'=>4]);
$register = filter_input(INPUT_POST, "register");
$db = getConnection($dsn,$dbuser,$dbpasswd);
$stmt = $db->prepare("INSERT INTO users (username,email,passwd,rol,date) VALUES (?,?,?,?,?);");
$_SESSION["error_reg"] = " ";
/*if(isset($_COOKIE["timeout"])) {
    //var_dump($_COOKIE["timeout"]);
    header("Location:?url=home");
}*/

if($rol == "1"){
        $rol = "Alumne";
    } else {
        $rol = "Profesor";
    }

    if($password == $password2) {
        $password = password_hash($password, PASSWORD_BCRYPT);
        if(($username && $email && $password && $password2 && $rol)!=null) {
            //Te has registrado correctamente
            $stmt->execute([$username,$email,$password,$rol,$date]);
            $_SESSION["username"] = $username;
            header("Location:?url=home");
        }
    } else {
        //$password y $password2 no coinciden
        $_SESSION["error_reg"]="*Las contraseñas no coinciden";
        header("Location:?url=home");
    }

    /*if($register !=null){
        $intentos++;
        if($intentos >= 4){
            setcookie("timeout","",time() - 3600);
        }
    } else {
        header("Location:?url=home");
        $intentos=0;
    }*/
    