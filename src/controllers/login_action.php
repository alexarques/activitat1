<?php
//require APP."/src/db/database.php";
require APP."/config.php";
require APP."/lib/conn.php";
//require APP."/lib/lib.php";

$username = filter_input(INPUT_POST, "username");
$password = filter_input(INPUT_POST, "password");
$db = getConnection($dsn,$dbuser,$dbpasswd);
$stmt = $db->prepare("SELECT * from users WHERE username = '".$username."';");
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
$dbpass = $results[0];
$verify = password_verify($password,$dbpass["passwd"]);
$remember = filter_input(INPUT_POST, "remember");
$login = filter_input(INPUT_POST, "login");

    if(empty($results) == false && $verify){

        //Te has logueado correctamente
        session_start();
        $_SESSION["username"] = $username; 
        $_SESSION["date"] = "";
        header("Location:?url=home");
    } else {
        //No te has podido loguear
        $_SESSION["error"]="*Usuario o contraseña erronéos";
        //header("Location:?url=login");
    }
    
    if($remember !=null){
        setcookie("remember", $remember);
        setcookie("username", $username);
        setcookie("password", $password);
    } else if ($remember == null){
        setcookie("remember","",time() - 100);
        setcookie("username","",time() - 100);
        setcookie("password","",time() - 100);
    }
