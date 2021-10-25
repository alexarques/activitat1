<?php

    //establecer errores
    session_start();
    require 'config.php';
    //require 'lib/conn.php';
    //require 'lib/render.php'
    require 'src/router.php';

    $controller=getRoute();
    /*var_dump($controller);
    die();*/

    require APP.'/src/controllers/'.$controller.'.php';
