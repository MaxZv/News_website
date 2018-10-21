<?php
session_start();
if(!empty($_GET['route'])){
    if($_GET['route'] == 'admin'){
        $filename = $_SERVER['DOCUMENT_ROOT'] . "/Project/Admin/controllers/" . $_GET['route'] . ".php";
    }else{
        $filename = $_SERVER['DOCUMENT_ROOT'] . "/Project/controllers/" . $_GET['route'] . ".php";
    }

}

require_once $_SERVER['DOCUMENT_ROOT'] . "/Project/config.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/Project/system/con_db.php";
mysqli_query(getConnect(), "SET CHARSET UTF8");
require_once $_SERVER['DOCUMENT_ROOT'] . "/Project/system/request.php";



    if($_SERVER['REQUEST_URI'] == '/Project/'){
            require_once $_SERVER['DOCUMENT_ROOT'] . "/Project/controllers/home.php";
    }
    elseif(!empty($filename) && file_exists($filename)){
        require_once $filename;
    }
    else{
        require_once $_SERVER['DOCUMENT_ROOT'] . "/Project/controllers/404.php";
    }
?>

