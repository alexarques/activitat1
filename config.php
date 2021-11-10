<?php
    define('APP',__DIR__);
    $dbhost=$_ENV['DB_HOST'];
    $dbname=$_ENV['DB_NAME'];
    $dbuser=$_ENV['DB_USER'];
    $dbpasswd=$_ENV['DB_PASSWD'];
    $dsn='mysql:host=' . $dbhost . ';dbname=' . $dbname . ';charset=utf8mb4';
?>
