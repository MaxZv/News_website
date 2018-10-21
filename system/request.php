<?php
function getView($name, $data = ''){
    return require_once $_SERVER['DOCUMENT_ROOT'] . "/Project/views/" . $name . ".php";
}

function getViewAdmin($name, $data = ''){
    return require_once $_SERVER['DOCUMENT_ROOT'] . "/Project/Admin/views/" . $name . ".php";
}


function getHeader($data = ''){
    return require_once $_SERVER['DOCUMENT_ROOT'] . "/Project/controllers/header.php";
}

function getFooter($data = ''){
    return require_once $_SERVER['DOCUMENT_ROOT'] . "/Project/controllers/footer.php";

}

function myLink($name, $id){
    return '/Project/index.php?route='.$name.'&'.$name.'_id='.$id;
}
?>