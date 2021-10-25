<?php
function register(){
    if($password == $password2) {
        if(($username && $email && $password && $password2)!=null) {
            $sql = "INSERT INTO proves (username,email,passwd) VALUES ($username,$email,$password)";
            //echo "Te has registrado correctamente";
        } else {
            header("index.php");
        }
    } else {
        //$password y $password2 no coinciden
        header("index.php");
    }
}

function timeout(){
    if($register !=null){
            $intentos++;
        if($intentos >= 4){
            //echo "Dirección de correo o contraseña erroneos te quedan " . $intentos . " intentos.";
            setcookie("timeout","",time() - 3600);
        /*if($intentos >= 4) {
            //echo "Se te ha puesto un time out por intentar iniciar repetidas veces";
            setcookie("timeout","",time() - 3600);
        }*/
        }
    } else {
        header("/index.php");
    }
}
