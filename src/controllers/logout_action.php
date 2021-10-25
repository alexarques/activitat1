<?php

require APP."/config.php";
require APP."/lib/conn.php";

session_start();

unset($_SESSION["username"]);
header("Location:?url=login");