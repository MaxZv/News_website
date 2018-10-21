<?php
function getConnect(){
   return $connect = mysqli_connect(HOST, USER, PASSWORD, DATABASE);
}
?>