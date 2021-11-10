<?php

    //establecer errores
    session_start();

    require 'vendor/autoload.php';

    $dotenv= Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();

    $_SESSION['nav']=['home'];

    require 'config.php';
    //require 'lib/conn.php';
    //require 'lib/render.php'
    require 'src/router.php';
    
    $controller=getRoute();
    /*var_dump($controller);
    die();*/

    require APP.'/src/controllers/'.$controller.'.php';
