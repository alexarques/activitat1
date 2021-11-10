<?php
require APP."/config.php";
require APP."/lib/conn.php";
//require APP."/src/db/database.php";
session_start();
//header("Location:?url=to_do_list");

$username = $_SESSION["username"];
$password = filter_input(INPUT_POST, "password");
$db = getConnection($dsn,$dbuser,$dbpasswd);
//ID DE USUARIO
$stmt_id = $db->prepare("SELECT id from users WHERE username = '".$username."';"); //id de usr
$stmt_id->execute();
$idArray = $stmt_id->fetchAll(PDO::FETCH_ASSOC);
//$dbid = $idArray[0];
//$usrID = array_map('intval', explode('"', $dbid));
foreach($idArray as $id){
    $idusr = $id["id"];
}
$_SESSION["usrid"] = $idusr;


//CARGAR Y EJECUTAR SENTENCIAS DE LAS TABLAS LIST Y TASK
$stmt_list = $db->prepare("SELECT * from list WHERE username_id = '".intval($idusr)."';"); //listas creadas por usr
//$stmt_task = $db->prepare("SELECT * from task WHERE username_id = '".intval($idusr)."' and '".intval($idusr)."';"); //task creadas en listas
$stmt_list->execute();
//$stmt_task->execute();
$list = $stmt_list->fetchAll(PDO::FETCH_ASSOC);
$dblist = $list[0];
//$task = $stmt_task->fetchAll(PDO::FETCH_ASSOC);
$dbtask = $task[0];
$_SESSION["list"] = $list;
//var_dump($list);
// var_dump($usrID);
// var_dump($dblist);
// var_dump($dbtask);

//RECARGAR LISTAS
if (filter_input(INPUT_POST, "refresh") != null){
    header('Location:?url=to_do_list');
}

//INSERT EN TABLA LIST MEDIANTE INPUT
$stmt_newList = $db->prepare("INSERT INTO list (list,username_id) VALUES (?,?);");
$createList = filter_input(INPUT_POST, "createlist");
$_SESSION["submitList"] = $createList;
$namelist = filter_input(INPUT_POST, "list");
if ($namelist != null && $createList != null){
    //Se han introducido los datos en la bd
    $stmt_newList->execute([$namelist,$idusr]);
    $_SESSION["createList"] = "Se ha creado correctamente";
    header("Location:?url=to_do_list");
} 

//INSERT EN TABLA TASK MEDIANTE INPUT
$selectedList = filter_input(INPUT_POST, "lists");
$stmt_newTask = $db->prepare("INSERT INTO task (task,username_id,list_task,descript) VALUES (?,?,?,?);");
$nametask = filter_input(INPUT_POST, "task");
$taskDes = filter_input(INPUT_POST, "taskdes");
$createTask = filter_input(INPUT_POST, "createtask");
$_SESSION["submitList"] = $createList;
if ($nametask != null && $createTask != null){
    //Se han introducido los datos en la bd
    $stmt_newTask->execute([$nametask,$idusr,$selectedList,$taskDes]);
    $_SESSION["createList"] = "Se ha creado correctamente";
    header("Location:?url=to_do_list");
} 

//MOSTRAR TASK
$stmt_task = $db->prepare("SELECT * from task WHERE username_id = '".intval($idusr)."' and '".intval($idusr)."';"); //task creadas en listas

$selectList = filter_input(INPUT_POST, "selectlist");
if ($selectList != null) {
    $_SESSION["task"] = $task;
    header("Location:?url=to_do_list");
}

// $stmt_list = $db->prepare("SELECT list from list WHERE id = '".intval($id)."';");
// $stmt_taskPrint = $db->prepare("SELECT task,list_task,descript from task WHERE username_id = '".intval($id)."';");
// $stmt_taskPrint->execute();
// $taskPrint = $stmt_taskPrint->fetchAll(PDO::FETCH_ASSOC);
// $showTask = $taskPrint[0];
//if ($dbtask != null){
    // $_SESSION["task"] = $dblist["task"];
    // $_SESSION["list"] = $list;
    // $_SESSION["descript"] = $dblist["descript"];
    // foreach($showTask as $task){
    //     //var_dump($task);
    // }
//}
