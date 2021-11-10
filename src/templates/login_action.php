<?php
//require APP."/src/db/database.php";
require APP."/config.php";
require APP."/lib/conn.php";
//require APP."/lib/lib.php";

$username = filter_input(INPUT_POST, "username");
$password = password_hash(filter_input(INPUT_POST, "password"));
$db = getConnection($dsn,$dbuser,$dbpasswd);
$stmt = $db->prepare("SELECT * from users WHERE username = '".$username."' AND passwd = '".$password."';");
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
$remember = filter_input(INPUT_POST, "remember");
$login = filter_input(INPUT_POST, "login");
var_dump($password);
    if(empty($results) == true){
        session_start();
        $_SESSION["error"]="*Usuario o contraseña erronéos";
        header("Location:?url=login");
    } else {
        //Te has registrado correctamente
        $_SESSION["username"] = $username; 
        $_SESSION["date"] = "";
        //header("Location:?url=home");
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
